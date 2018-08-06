<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">

    <title>{{$title}}</title>
	
  </head>
  <body>
	<div class="row" style="text-align:center;padding:30px;">
		 <div class="col-12"> 
			<h1>{{$h1}}</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<form method="post" action="/parse">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="InputUrl">Ссылка(и) на сайт(ы)</label>
						<input type="text" class="form-control" id="InputUrl" aria-describedby="url" name="url" placeholder="www.ya.ru, google.com">
						<small class="form-text text-muted">Сайты должны быть заполнены через запятую!</small>
					</div>
					<div class="form-group">
						<label for="InputUrl">Идентификаторы поиска</label>
						<input type="text" class="form-control" id="InputUrl" aria-describedby="identifier" name="identifier" placeholder=".class_name, #id_name, h1, h2, div">
						<small class="form-text text-muted">Все идентификаторы через запятую!</small>
					</div>
					<button type="submit" class="btn btn-primary">Спарсить</button>
				</form>
			</div>
		</div>
	</div>
	
    <!-- Подключение JavaScript -->
    <script src="/template/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/template/js/popper.min.js" ></script>
    <script src="/template/js/bootstrap.min.js"></script>
  </body>
</html>