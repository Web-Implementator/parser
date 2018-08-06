<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

// Модели
use App\Parse_Query;
use App\Parse_Result;

// Библиотека SimpleHTML
use Sunra\PhpSimple\HtmlDomParser;

class Controller extends BaseController
{
    public function index() {
		$title = 'Парсер';
		$h1 = 'Универсальный парсер сайтов на Framework Laravel 5.5';
		
		return view('index', compact('title', 'h1'));
	}
	
	public function parse() {
		
		$parse = new Parse_Query;
		$parse_result = new Parse_Result;
		$result_all = '';
		$result = array();
		
		// Создали запрос
        $parse->parse_url = Input::get('url');
        $parse->parse_identifier = Input::get('identifier');
        $parse->save();
		
		$check = Parse_Query::where('parse_status', 1)->get();
		
		foreach($check as $c)
		{
			$out = '';
			$urls = explode(',',$c->parse_url);
		
			// Получаем код страницы
			foreach($urls as $urlsItem){	//пропускаем каждую ссылку в цикле
				$output = curl_init();	//подключаем курл
				curl_setopt($output, CURLOPT_URL, $urlsItem);	//отправляем адрес страницы
				curl_setopt($output, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($output, CURLOPT_HEADER, 0);
				$out .= curl_exec($output);		//помещаем html-контент в строку
				
				curl_close($output);	//закрываем подключение
			}
			
			$result_all .= 'Идентификатор: '.$c->parse_identifier.'<br>';
			// Парсинг по идентификатору
			foreach(HTMLDomParser::str_get_html($out)->find($c->parse_identifier) as $div) {
				$result_all .= $div->innertext . '<br>';	
				array_push($result, $div->innertext);
			}
			
			// Сохранаяем результат
			foreach($result as $r)
			{
				 $insert[] = [
					'parse_id' => $c->parse_id,
					'parse_result_identifier' => $c->parse_identifier, 
					'parse_result_text' => $r
				];
			}
			Parse_Result::insert($insert);
			
			Parse_Query::where('parse_id', $c->parse_id)
			  ->update(['parse_status' => 2]);
		}
		
		echo $result_all;
		echo '<br><br>';
		echo '<a href="/">Вернуться на главную</a>';
	}
}
