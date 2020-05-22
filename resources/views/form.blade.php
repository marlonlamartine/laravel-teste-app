@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Informe um nome de produto" value="{{$product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" name="price" class="form-control" placeholder="Informe um valor" value="{{$product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="text" name="description" class="form-control" placeholder="Informe uma descrição do produto"  value="{{$product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="image"  value="{{$product->image ?? old('image') }}">
</div>
<div class="form-group"><button class="btn btn-success" type="submit">Enviar</button></div>