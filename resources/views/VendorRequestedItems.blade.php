<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{background-color: rgb(217, 220, 20)}
        #Ap{background-color: green}
        #Rj{background-color: red}
    </style>
    <title>Vendor Requested Items</title>
</head>
<body>
   <h1> {{$OrderedItemsNumber}} </h1>
   @if(session('Approved'))
    {{session('Approved')}}
    @endif

   @if (session('Rejected'))
    {{session('Rejected')}}
   @endif
    <table>
@foreach ($RequesterInfo as $Info)
{{$Info->FirstName }}{{$Info->LastName}}
{{$Info->IdOfProduct}}
<img src="{{asset('/ProductsImages/'.$Info->ProductImage)}}" width="200px" >
<form action="ProductApprovement/{{$Info->IdOfProduct}}" method="get" id="{{$Info->IdOfProduct}}">
    <button name="Approve" id="Ap">Approve</button>
    <button name="Reject" id="Rj">Reject</button>
</form>

<br>
@endforeach
</table>
</body>
</html>
