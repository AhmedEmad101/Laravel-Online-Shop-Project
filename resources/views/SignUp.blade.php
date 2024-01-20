<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    body{background-color:yellow}
    </style>
    <title>Document</title>
</head>
<body>
    @if (session()->get('Success'))
        {{session()->get('Success')}}
    @endif
    @if(session()->get('Fail'))
    {{session()->get('Fail')}}
    @endif
<form action="SaveData" method="post">
    @csrf
    <label for="">FirstName</label>
    <input type="text" name="FirstName" id="">
    <br>
    <label for="">LastName</label>
    <input type="text" name="LastName" id="">
    <br>
    <label for="">PhoneNumber</label>
    <input type="text" name="PhoneNumber" id="">
    <br>
    <label for="">Email</label>
    <input type="email" name="Email" id="">
    <br>
    <label for="">Password</label>
    <input type="password" name="Password" id="">
    <br>
    <button type="submit">Submit</button>
</form>
<a href="Login">Login Page</a>
</body>
</html>
