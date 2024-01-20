<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected function ShowUsers()
    {
        $Users = array('AllUsers'=> DB::table('UserInfo')->leftjoin('UserPrivillage','UserId','=','Id')->where('Id',null)->get());
        return view('AdminProfile',$Users);
    }
    protected function AddPrivillage(Request $req)
    {
        $UserPrivillageNumber = $req->input('UsersPrivillage');
        $UserId = $req->input('UserId');
        $AddingUserPrivillage = DB::table('UserPrivillage')->insert(
            [
                'Id'=>$UserId,
                'UserPrivillageNumber'=> $UserPrivillageNumber
            ]

        );
        return back();

    }

    protected function ViewCategories()
    {
        $Categories  = array
        (
            'AvailableCategories'=>DB::table('Categories')->get()

        );
    return view('CategoriesViewAdmin',$Categories);
    }
protected function AddCategory(Request $req)
{
 $CategoryName = $req->input('CategoryName');
 $query = DB::table('Categories')->insert(
[
    'CategoryName'=>$CategoryName
]
 );
 if($query){
 return back()->with('AddedCat','You added the category '.$CategoryName.' Successfully');
 }
 else
 {
    return back()->with('NotAddedCat','failed to add the category'.$CategoryName);
 }
}

}
