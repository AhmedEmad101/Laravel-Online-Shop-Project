<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserChart</title>
</head>
<body>
    <h1>The Items Cost {{$ItemsCost}} $</h1>
    <h2>{{$ItemsCount}} Items</h2>
@foreach ($ChartItems as $item)
    {{$item->ProductName}}
    <img src="{{asset('/ProductsImages/'.$item->ProductImage)}}" width="200px">
    <br>
@endforeach
</body>
</html>
