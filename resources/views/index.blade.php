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

        <div>
            <h1>Exibindo os produtos</h1>
            
        </div>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>
            <hr>
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Filtrar: " value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-info">Pesquisar</button>
            </form>
            
        </div>        
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Ações</th>            
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->name}}" style="max-width: 100px">
                                @endif
                            </td>                            
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td width=100>
                                <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                                <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                            </td>              
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        @if (isset($filters))
            {{$products->appends($filters)->links()}}
        @else
        {{$products->links()}}
        @endif
    </div>
</body>
</html>