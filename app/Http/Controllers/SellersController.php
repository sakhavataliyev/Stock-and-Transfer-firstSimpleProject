<?php

namespace App\Http\Controllers;

use App\Models\Sellers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminSellers()
    {
        $sellers = Sellers::latest('id')->paginate(10);
        return view('admin.sellers.sellers',compact('sellers'));
    }



    public function AddSellers(Request $request)
    {
        $validateData = $request->validate([
            
            'seller_name' => 'required|max:30|min:2',
            'seller_surname' => 'required|max:30|min:2',
            'seller_city' => 'required',
            'seller_phone' => 'required|unique:sellers|regex:/^[0-9\.,]+$/|max:20|min:10',
        ],
        [
            'seller_name.required' => 'Please input Seller Name!',
            'seller_name.max' => 'Please input Max 30 Chars!',
            'seller_name.min' => 'Please input Min Chars 2',

            'seller_surname.required' => 'Please input Seller Surname!',
            'seller_surname.max' => 'Please input Max 30 Chars!',
            'seller_surname.min' => 'Please input Min Chars 2',

            'seller_city.required' => 'Please input Seller City!',

            'seller_phone.required' => 'Please input Product Name!',
            'seller_phone.unique' => 'Please input unique Product Name!',
            'seller_phone.regax' => 'The seller phone format is invalid!',
            'seller_phone.max' => 'Please input true phone number!',
            'seller_phone.min' => 'Please input true phone number!',
        ]
    );
    
    Sellers::insert([
                'seller_name' => $request->seller_name,
                'seller_surname' => $request->seller_surname,
                'seller_city' => $request->seller_city,
                'seller_phone' => $request->seller_phone,
                'seller_status' => 0,
                ]);

        return Redirect()->back()->with('success', 'Seller Add Successfully!');
    }


    public function DeleteSellers($id)
    {
        DB::table('sellers')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Seller Deleted Successfully!');
    }


    public function EditSellers($id)
    {
        $sellers = DB::table('sellers')->where('id', $id)->first();
        return view('admin.sellers.edit',compact('sellers'));
    }



    public function UpdateSellers(Request $request, $id)
    {
        $validateData = $request->validate([
            
            'seller_name' => 'required|max:30|min:2',
            'seller_surname' => 'required|max:30|min:2',
            'seller_city' => 'required',
            'seller_phone' => 'required|regex:/^[0-9\.,]+$/|max:20|min:10',
        ],
        [
            'seller_name.required' => 'Please input Seller Name!',
            'seller_name.max' => 'Please input Max 30 Chars!',
            'seller_name.min' => 'Please input Min Chars 2',

            'seller_surname.required' => 'Please input Seller Surname!',
            'seller_surname.max' => 'Please input Max 30 Chars!',
            'seller_surname.min' => 'Please input Min Chars 2',

            'seller_city.required' => 'Please input Seller City!',

            'seller_phone.required' => 'Please input Product Name!',
            'seller_phone.regax' => 'The seller phone format is invalid!',
            'seller_phone.max' => 'Please input true phone number!',
            'seller_phone.min' => 'Please input true phone number!',
        ]
    );

        $update = Sellers::find($id)->update([
            'seller_name' => $request->seller_name,
            'seller_surname' => $request->seller_surname,
            'seller_city' => $request->seller_city,
            'seller_phone' => $request->seller_phone,
            'user_id' => Auth::user()->id,
        ]);

        return Redirect()->route('admin.sellers')->with('success', 'Sellers Updated Successfull!');
    }



    public function ActiveSellers($id)
    {
        DB::table('sellers')->where('id',$id)->update(['seller_status'=>1]);
        return Redirect()->route('admin.sellers')->with('success', 'Status Active Successfully!');
    }


    public function DeactiveSellers($id)
    {
        DB::table('sellers')->where('id',$id)->update(['seller_status'=>0]);
        return Redirect()->route('admin.sellers')->with('success', 'Status Deactive Successfully!');
    }







}
