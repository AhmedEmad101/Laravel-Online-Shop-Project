<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   protected function SaveUserData(Request $req)
   {
    $FirstName = $req->input('FirstName');
    $LastName = $req->input('LastName');
    $PhoneNumber = $req->input('PhoneNumber');
    $Email = $req->input('Email');
    $password = $req->input('Password');
    $query = DB::table('UserInfo')->insert(
        [
            'FirstName'=>$FirstName,
            'LastName'=>$LastName,
            'Email'=>$Email,
            'PhoneNumber'=>$PhoneNumber,
            'UserPassword'=>$password

        ]
    );
    if($query)
    {
        return back()->with('Success','your account created successfully');

    }
    else
    {
        return back()->with('Fail','Something went wrong');
    }
   }
   public function CheckValidUser(Request $req)
   {
    $Email= $req->input('Email');
    $Password = $req->input('Password');
    $query = DB::table('UserInfo')->where('Email',$Email)->get();
    if($query ->count()>0)
    {
        if($query[0]->UserPassword == $Password)
        {
            $UserInformation = array('UserInfo'=>$query );
            $req->session()->put('UserId',$query[0]->UserId);
            $UserType = DB::table('UserPrivillage')->where('Id',$query[0]->UserId)->get();
            if($UserType->count()>0){
            if($UserType[0]->UserPrivillageNumber ==1)
            {Session::put('UserUrl',request()->fullUrl());
            return view('Profile',$UserInformation);
            }
            else if($UserType[0]->UserPrivillageNumber ==2)
            {
                return view('VendorProfile',$UserInformation);
            }
        }
            else
            {
                return back()->with('NotLogin','Your account did not verified yet');
            }

        }
    }
    else
    {
        return back()->with('AccountNotFound','Your Account does not exist in the system');
    }
   }
   protected function UpdatePassword(Request $req)
   {
        $UserId = session()->get('UserId');
        $UserInformation = DB::table('UserInfo')->where('UserId',$UserId)->get();
        if($UserInformation[0]->UserPassword == $req->input('OldPassword')&&$req->input('NewPassword') == $req->input('ReNewPassword') ){
        $Update = DB::table('UserInfo')->where('UserId',$UserId)->update(
            [
                'UserPassword'=>$req->input('NewPassword')
            ]
            );

        return back()->with('Updated','Your Password has been Updated Successfully');
    }
    else
    {
        return back()->with('FailedUpdate','Failed to Update your Password please try again');
    }

   }
   protected function Search(Request $req)
   {$ProductName = $req->input('SearchKey');
    $Result = array('ProductInfo'=>DB::table('ProductInfo')->where('ProductName','LIKE','%'.$ProductName.'%')->get());
    Session::put('SearchUrl',request()->fullUrl());
    return view('SearchResults' , $Result);

   }
   protected function AddToChart($ProductId, Request $req)
   {
    $UserId = session()->get('UserId');
    $query = DB::table('ProductInfo')->where('ProductId',$ProductId)->get();
    $VendorId = $query[0]->VendorId;
    $InsertionQuery = DB::table('UserChart')->insert(
        [
            'IdOfUser'=>$UserId,
            'IdOfProduct'=>$ProductId,
            'IdOfVendor'=>$VendorId
        ]
    );
    return back();
   }
   public function ShowChartItems(Request $req)
   { $UserId = session()->get('UserId');
    $UserItems = array(
        'ChartItems'=>DB::table('UserChart')->join('ProductInfo','IdOfProduct','=','ProductId')->where('IdOfUser',$UserId)->get(),
        'ItemsCount'=>DB::table('UserChart')->join('ProductInfo','IdOfProduct','=','ProductId')->where('IdOfUser',$UserId)->count(),
        'ItemsCost'=>DB::table('UserChart')->join('ProductInfo','IdOfProduct','=','ProductId')->where('IdOfUser',$UserId)->sum('ProductPrice')
    );
    return view('UserChart',$UserItems);
   }
}
