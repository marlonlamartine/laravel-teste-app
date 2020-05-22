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
    <a href="{{ route('products.index') }}" class="btn btn-primary">Voltar</a>
    <h1>Produto: {{$product->name}}</h1>

    <ul>
        <li><strong>Nome: </strong>{{$product->name}}</li>
        <li><strong>Preço: </strong>{{$product->price}}</li>
        <li><strong>Descrição: </strong>{{$product->description}}</li>
    </ul>
    <hr>
    
    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Deletando produto {{$product->name}}</button>
    </form>
    
</body>
</html>