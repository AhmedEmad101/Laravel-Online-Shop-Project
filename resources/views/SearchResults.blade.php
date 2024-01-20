<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchResults</title>
</head>
<body>

@foreach ($ProductInfo as $Product)
{{$Product->ProductName}}
<img src="{{asset('/ProductsImages/'.$Product->ProductImage)}}" >
<br>
{{$Product->ProductPrice}}<p>Dollars</p>
<br>
{{$Product->ProductDescription}}
<form action="AddToChart/{{$Product->ProductId}}" method="POST">
    @csrf
    <button type="submit">Add to Chart</button>
</form>
@endforeach
</body>
</html>
