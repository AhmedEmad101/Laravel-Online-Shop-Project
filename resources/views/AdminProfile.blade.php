<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Controll Page</title>
</head>
<body>
    @foreach ($AllUsers as $user)
    {{$user->FirstName}}
    {{$user->LastName}}

<form action="AddPrivillage" method="POST">
@csrf
<input type="hidden" name="UserId" value="{{$user->UserId}}">
<label for="">UserPrivillage</label>
<select name="UsersPrivillage" id="UPrivillage">
    <option value="1">Normal User</option>
    <option value="2">Vendor</optio>
  </select>
  <button type="submit">Save</button>
</form>
<form action="" method="post">
    @csrf
    <input type="text" name="ProductCategory">
    <button type="submit">Add Category</button>
</form>
<br>
@endforeach
<form action="ViewCategories" method="GET">
    @csrf
<button type="submit">View Categories</button>
</form>
</body>
</html>
