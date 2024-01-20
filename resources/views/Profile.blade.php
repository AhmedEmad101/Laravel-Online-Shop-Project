<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        h1{text-align: center}
        #SearchForm{text-align: center}
    </style>
    <title>Profile</title>
</head>
<body>

@foreach ($UserInfo as $user)
   <h1> {{$user->FirstName}}
    {{$user->LastName}}
   </h1>
<form action="PwdUpdate" method="GET">
  @csrf
  <button type="submit">Update Password</button>
</form>
@endforeach

<div id="SearchForm">
    <form action="ShowResults" method="post">
        @csrf
        <input type="text" name="SearchKey" id="search" placeholder="Write what you want search for">
        <button type="submit" id="submit">Search</button>
    </form>
</div>

<form action="ShowChartItems" method="POST">
    @csrf
    <button type="submit">Your Chart</button>

</form>
</body>
</html>
