<?php

namespace App\Http\Controllers;

use App\Models\Transfers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransfersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function AdminTransfers()
    {
        $transfers = DB::table('transfers')
        ->join('sellers','transfers.seller_id','sellers.id')
        ->select('transfers.*', 'sellers.seller_name')
        ->latest('id')
        ->paginate(10);

        return view('admin.transfers.transfers',compact('transfers'));
    }


    public function AddTransfers(Request $request)
    {
        $validateData = $request->validate([
            
            'transfer_name' => 'required|unique:transfers|max:30',
        ],
        [
            'transfer_name.required' => 'Please input Transfer Name!',
            'transfer_name.unique' => 'Please input Unique Transfer Name!',
            'transfer_name.max' => 'Please input quantity Max 30 Chars!',


            // 'product_cost.required' => 'Please input Price!',
            // 'product_cost.max' => 'Please input price Max 30 Chars!',
        ]
    );
    
    Transfers::insert([
                'seller_id' => $request->seller_id,
                'transfer_name' => $request->transfer_name,
                'transfer_status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                ]);

        return Redirect()->back()->with('success', 'Transfer Added Successfully!');
    }


    
    public function DeleteTransfers($id)
    {
        DB::table('transfers')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Transfer Deleted Successfully!');
    }
 

    public function EditTransfers($id)
    {
        $transfers = DB::table('transfers')->where('id', $id)->first();
        return view('admin.transfers.edit',compact('transfers'));
    }


    public function UpdateTransfers(Request $request, $id)
    {
        $validateData = $request->validate([
            
            'transfer_name' => 'required|max:30',
        ],
        [
            'transfer_name.required' => 'Please input Transfer Name!',
            'transfer_name.max' => 'Please input Transfer Name Max 30 Chars!',
        ]
    );
    
        $update = Transfers::find($id)->update([
            'seller_id' => $request->seller_id,
            'transfer_name' => $request->transfer_name,
            'updated_at' => \Carbon\Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return Redirect()->route('admin.transfers')->with('success', 'Transfers Updated Successfull!');
    }



    public function ActiveTransfers($id)
    {
        DB::table('transfers')->where('id',$id)->update(['transfer_status'=>1]);
        return Redirect()->route('admin.transfers')->with('success', 'Status Active Successfully!');
    }

    public function DeactiveTransfers($id)
    {
        DB::table('transfers')->where('id',$id)->update(['transfer_status'=>0]);
        return Redirect()->route('admin.transfers')->with('success', 'Status Deactive Successfully!');
    }

}
