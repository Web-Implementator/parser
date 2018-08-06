<?php
Route::get('/', ['as' => 'index', 'uses' => 'Controller@index']);	
Route::post('/parse', ['uses' => 'Controller@parse']);	
