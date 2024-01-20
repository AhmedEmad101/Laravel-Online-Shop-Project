<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{background-color: chartreuse}
        h1{text-align: center}
    </style>
    <title>Vendor Profile</title>
</head>
<body>
    @foreach ($UserInfo as $item)
        <h1>{{$item->FirstName}} {{$item->LastName}}</h1>
    @endforeach
        </h1>
        <form action="ListProducts" method="get">
            @csrf
            <button type="submit">Show my products</button>
        </form>


<form action="AddProduct" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Product Name</label>
    <input type="text" name="ProductName" id="">
    <br>
    <label for="">Product Img</label>
    <input type="file" name="ProductImg" id="">
    <br>
    <label for="">Product Price</label>
    <input type="text" name="ProductPrice" id="">
    <br>
    <label for="">Product quantity</label>
    <input type="text" name="ProductQuantity" id="">
    <br>
    <label for="">Product Details</label>
    <textarea id="w3review" name="ProductDescription" rows="4" cols="50" placeholder="write Product details">

        </textarea>
    <button type="submit">Add Product</button>
</form>
<br>
<form action="ShowUserRequests" method="get">
@csrf
<button type="submit">Show Requested Items</button>
</form>

</body>
</html>
