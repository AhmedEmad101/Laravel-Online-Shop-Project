<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Products</title>
</head>
<body>
<div>
    @foreach ($Product as $item)
    {{$item->ProductName}}
    <br>
    <img src="{{asset('/ProductsImages/'.$item->ProductImage)}}" height="150px">
    <br>
    <form action="DeleteProduct/{{$item->ProductId}}" method="post">
        @csrf

        <button type="submit">Delete</button>
    </form>
    <br>
    @endforeach
</div>
</body>
</html>
