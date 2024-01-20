<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color: aqua
        }
        #pwd,#email , #submit{
            height:30px;
        }
        #submit{
            background-color: crimson
        }
        h1{
            text-align: center;
        }
        h1{
            font-size: 45px
        }
        h1{border: 3px solid}
        h1{font-family: 'Times New Roman', Times, serif}
        #E,#P,#B{text-align: center}
        #B{padding: 20px}
        label{font-size: 35px}
        #B{margin-left: 220px}
        #DoesNotExist,#NotVerified{text-align: center}
        #DoesNotExist{background-color: red}
        #NotVerified{background-color: yellow}
    </style>
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <div id="DoesNotExist">
        @if (session('AccountNotFound'))
            {{session('AccountNotFound')}}
        @endif
    </div>
    <div id="NotVerified">
    @if (session('NotLogin'))
        {{session('NotLogin')}}
    @endif
    </div>
    <form action="Login" method="post">
        @csrf
        <div id="E">
        <label for="">Email</label>
        <input type="email" name="Email" id="email" placeholder="type your email">
    </div>
        <br>
        <br>
        <div id="P">
        <label for="">Password</label>
        <input type="password" name="Password" id="pwd" placeholder="type your password">
    </div>
    <div id="B">
        <button type="submit" id="submit">Login</button>
    </div>
    </form>
</body>
</html>
