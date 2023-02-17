<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminClients()
    {
        $clients = Clients::latest('id')->paginate(10);
        return view('admin.clients.clients',compact('clients'));
    }



    public function AddClients(Request $request)
    {
        $validateData = $request->validate([
            
            'client_name' => 'required|max:30|min:2',
            'client_surname' => 'required|max:30|min:2',
            'client_city' => 'required',
            'client_phone' => 'required|unique:clients|regex:/^[0-9\.,]+$/|max:20|min:10',
        ],
        [
            'client_name.required' => 'Please input Client Name!',
            'client_name.max' => 'Please input Max 30 Chars!',
            'client_name.min' => 'Please input Min Chars 2',

            'client_surname.required' => 'Please input Client Surname!',
            'client_surname.max' => 'Please input Max 30 Chars!',
            'client_surname.min' => 'Please input Min Chars 2',

            'client_store.required' => 'Please input Store name!',
            'client_store.max' => 'Please input Max 30 Chars!',
            'client_store.min' => 'Please input Min Chars 2',

            'client_city.required' => 'Please input Client City!',

            'client_phone.required' => 'Please input Client Name!',
            'client_phone.unique' => 'Please input unique Client Name!',
            'client_phone.regax' => 'The seller phone format is invalid!',
            'client_phone.max' => 'Please input true phone number!',
            'client_phone.min' => 'Please input true phone number!',
        ]
    );
    
    Clients::insert([
                'client_name' => $request->client_name,
                'client_surname' => $request->client_surname,
                'client_store' => $request->client_store,
                'client_city' => $request->client_city,
                'client_phone' => $request->client_phone,
                'client_status' => 0,
                ]);

        return Redirect()->back()->with('success', 'Seller Add Successfully!');
    }


    public function DeleteClients($id)
    {
        DB::table('clients')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Seller Deleted Successfully!');
    }


    public function EditClients($id)
    {
        $clients = DB::table('clients')->where('id', $id)->first();
        return view('admin.clients.edit',compact('clients'));
    }



    public function UpdateClients(Request $request, $id)
    {
        $validateData = $request->validate([
            
            'client_name' => 'required|max:30|min:2',
            'client_surname' => 'required|max:30|min:2',
            'client_store' => 'required|max:30|min:2',
            'client_city' => 'required',
            'client_phone' => 'required|regex:/^[0-9\.,]+$/|max:20|min:10',
        ],
        [
            'client_name.required' => 'Please input Client Name!',
            'client_name.max' => 'Please input Max 30 Chars!',
            'client_name.min' => 'Please input Min Chars 2',

            'client_surname.required' => 'Please input Client Surname!',
            'client_surname.max' => 'Please input Max 30 Chars!',
            'client_surname.min' => 'Please input Min Chars 2',

            'client_store.required' => 'Please input Store name!',
            'client_store.max' => 'Please input Max 30 Chars!',
            'client_store.min' => 'Please input Min Chars 2',


            'client_city.required' => 'Please input Client City!',

            'client_phone.required' => 'Please input Client Name!',
            'client_phone.regax' => 'The seller phone format is invalid!',
            'client_phone.max' => 'Please input true phone number!',
            'client_phone.min' => 'Please input true phone number!',
        ]
    );
    
        $update = Clients::find($id)->update([
            'client_name' => $request->client_name,
            'client_surname' => $request->client_surname,
            'client_city' => $request->client_city,
            'client_phone' => $request->client_phone,
            'client_store' => $request->client_store,
            'user_id' => Auth::user()->id,
        ]);

        return Redirect()->route('admin.clients')->with('success', 'Clients Updated Successfull!');
    }



    public function ActiveClients($id)
    {
        DB::table('clients')->where('id',$id)->update(['client_status'=>1]);
        return Redirect()->route('admin.clients')->with('success', 'Status Active Successfully!');
    }


    public function DeactiveClients($id)
    {
        DB::table('clients')->where('id',$id)->update(['client_status'=>0]);
        return Redirect()->route('admin.clients')->with('success', 'Status Deactive Successfully!');
    }




}
