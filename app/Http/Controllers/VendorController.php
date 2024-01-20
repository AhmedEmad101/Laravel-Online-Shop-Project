<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class VendorController extends Controller
{
    protected function AddProduct(Request $req)
    {
        $ProductName = $_POST['ProductName'];
        $ProductQuantity = $_POST['ProductQuantity'];
        $ProductPrice = $_POST['ProductPrice'];
        $productDescription = $_POST['ProductDescription'];
        $VendorId = session()->get('UserId');
        if($req->hasFile('ProductImg'))
        {
            $file = $req->file('ProductImg');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('ProductsImages/',$fileName);
            $Query = DB::table('ProductInfo')->insert
                (
                ['VendorId'=>$VendorId,
                'ProductName'=>$ProductName,
                'ProductImage'=>$fileName,
                'ProductPrice'=>$ProductPrice,
                'ProductQuantity'=>$ProductQuantity,
                'ProductDescription'=>$productDescription

                ]

                );
                $FindUserQuery = DB::table('UserInfo')->where('UserId',$VendorId)->get();
                $ProductInfo = DB::table('ProductInfo')->where('VendorId',$VendorId)->get();
                $userInfo = array(
                    'User'=>$FindUserQuery,
                    'Product'=>$ProductInfo
            );
                return view('VendorProfile',$userInfo );
    }

}

protected function ListProducts(Request $req)
{
    $VendorId = session()->get('UserId');
    $FindUserQuery = DB::table('UserInfo')->where('UserId',$VendorId)->get();
    $ProductInfo = DB::table('ProductInfo')->where('VendorId',$VendorId)->get();
    $userInfo = array(
        'User'=>$FindUserQuery,
        'Product'=>$ProductInfo
);
Session::put('VendorUrl',request()->fullUrl());
return view('VendorProducts',$userInfo);
}
protected function DeleteProduct($ProductId)
{   $VendorId = session()->get('UserId');
    $Query = DB::table('ProductInfo')->where('ProductId',$ProductId)->delete();
    $FindUserQuery = DB::table('UserInfo')->where('UserId',$VendorId)->get();
    $ProductInfo = DB::table('ProductInfo')->where('VendorId',$VendorId)->get();
    $userInfo = array(
        'User'=>$FindUserQuery,
        'Product'=>$ProductInfo
);
if(session('VendorUrl'))
{
    return redirect(session('VendorUrl'));
}
}
protected function ShowUserRequests()
{
    $VendorId = session()->get('UserId');
    $UserRequestedItems = array
    (
    'RequesterInfo'=>DB::table('UserChart')->join('UserInfo','IdOfUser','=','UserId')->where('IdOfVendor',$VendorId)->join('ProductInfo' ,'IdOfProduct','=','ProductId')->get(),
    'OrderedItemsNumber'=>DB::table('UserChart')->join('UserInfo','IdOfUser','=','UserId')->where('IdOfVendor',$VendorId)->join('ProductInfo' ,'IdOfProduct','=','ProductId')->count()
    );
return view('VendorRequestedItems',$UserRequestedItems);
}
protected function ProductApprovement($ProductId)
{

    if(isset($_GET['Approve']))
    {
        $Query = DB::table('ProductAprovement')->insert
        (
            [
                'OrderedProductId'=>$ProductId,
                'IsAproved'=> 1

            ]
        );
        return back()->with('Approved','You approved the user product request with id number'.$ProductId);
    }
    else if (isset($_GET['Reject']))
    {
        $Query = DB::table('ProductAprovement')->insert
        (
            [
                'OrderedProductId'=>$ProductId,
                'IsAproved'=> 0

            ]
        );
        return back()->with('Rejected','You Rejected the user product request with id number'.$ProductId);
    }

}
}
