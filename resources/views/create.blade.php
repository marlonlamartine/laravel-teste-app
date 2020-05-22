<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produtos</h1>
        @include('alerts')
        
        <a href="{{route('products.index')}}">Voltar</a>
        <hr>
        <form class="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @include('form')            
        </form>
    </div>
</body>
</html>