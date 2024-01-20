<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Categories View</title>
</head>
<body>
    @if (session('AddedCat'))
        {{session('AddedCat')}}
    @endif
    @if (session('NotAddedCat'))
    {{session('NotAddedCat')}}
@endif
<br>
@foreach ($AvailableCategories as $Category)
{{$Category->CategoryName}}
<br>
@endforeach
<form action="AddCategory" method="GET">
    @csrf
    <label for="">Category Name</label>
    <input type="text" name="CategoryName" id="">
    <button>Add Category</button>
</form>
</body>
</html>
