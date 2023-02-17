<?php

namespace App\Http\Controllers;

use App\Models\Productions;
use App\Models\ProductionsPrices;
use App\Models\StocksViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminProductions()
    {
        // $productions = DB::table('productions')
        // ->join('productions_prices','productions.id','productions_prices.id')
        // ->select('productions.*','productions_prices.product_cost','productions_prices.product_price')
        // ->latest('id')
        // ->paginate(10);

        $productions = Productions::latest('id')->paginate(10);
        return view('admin.productions.productions',compact('productions'));
    }


    public function AddProductions(Request $request)
    {
        $validateData = $request->validate([
            
            'product_name' => 'required|unique:productions|max:50|min:1',
            'product_code' => 'required|unique:productions|max:20|min:1',
            'product_size' => 'required',
        ],
        [
            'product_name.required' => 'Please input Product Name!',
            'product_name.unique' => 'Please input unique Product Name!',
            'product_name.max' => 'Please input Max 50 Chars!',
            'product_name.min' => 'Please input Min Chars 1',

            'product_code.required' => 'Please input Product Code!',
            'product_code.unique' => 'Please input unique Product Code!',
            'product_code.max' => 'Please input Max 20 Chars!',
            'product_code.min' => 'Please input Min Chars 1',

            'product_size.required' => 'Please input Product Size!',

            
        ]
    );
    
        Productions::insert([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_size' => $request->product_size,
            'product_status' => $request->product_status,
            'created_at' => \Carbon\Carbon::now(),
                ]);

        
        // ProductionsPrices::insert([
        //     'product_id' => $request->product_id,
        //     'product_cost' => $request->product_cost,
        //     'product_price' => $request->product_price,
        //     'product_price_status' => $request->product_price_status,
        //     'created_at' => \Carbon\Carbon::now(),
        //     ]);

        StocksViews::insert([
            'product_id' => $request->product_id,
            'stock_quantity' => 0,
            'total_cost' => 0,
            'total_price' => 0,
            'created_at' => \Carbon\Carbon::now(),
            ]);

        return Redirect()->back()->with('success', 'Productions Add Successfully!');
    }


    public function DeleteProductions($id)
    {
        DB::table('productions')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Productions Deleted Successfully!');
    }


    public function EditProductions($id)
    {
        $productions = DB::table('productions')->where('id', $id)->first();
        return view('admin.productions.edit',compact('productions'));
    }

    public function UpdateProductions(Request $request, $id)
    {
        $validateData = $request->validate([
            
            'product_name' => 'required|max:50|min:1',
            'product_code' => 'required|max:20|min:1',
            'product_size' => 'required',
        ],
        [
            'product_name.required' => 'Please input Product Name!',
            'product_name.max' => 'Please input Max 50 Chars!',
            'product_name.min' => 'Please input Min Chars 1',

            'product_code.required' => 'Please input Product Code!',
            'product_code.max' => 'Please input Max 20 Chars!',
            'product_code.min' => 'Please input Min Chars 1',

            'product_size.required' => 'Please input Product Size!',

            
        ]
    );
    
        $update = Productions::find($id)->update([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_size' => $request->product_size,
            'user_id' => Auth::user()->id,
        ]);

        return Redirect()->route('admin.productions')->with('success', 'Productions Updated Successfull!');
    }



    public function ActiveProductions($id)
    {
        DB::table('productions')->where('id',$id)->update(['product_status'=>1]);
        return Redirect()->route('admin.productions')->with('success', 'Status Active Successfully!');
    }


    public function DeactiveProductions($id)
    {
        DB::table('productions')->where('id',$id)->update(['product_status'=>0]);
        return Redirect()->route('admin.productions')->with('success', 'Status Deactive Successfully!');
    }





//

    public function AdminProductionsPrices()
    {
        $productionsprices = DB::table('productions_prices')
        ->join('productions','productions_prices.product_id','productions.id')
        ->select('productions_prices.*','productions.product_name')
        ->latest('product_id')
        ->paginate(10);

        //$productionsprices = ProductionsPrices::latest('product_id')->paginate(10);
        return view('admin.productions.productionsprices',compact('productionsprices'));
    }







    public function AddProductionsPrices(Request $request)
    {
        $validateData = $request->validate([
            
            'product_id' => 'required|',
            'product_cost' => 'required|max:20|min:1',
            'product_price' => 'required|max:20|min:1',
        ],
        [
            'product_id.required' => 'Please input Product Name!',

            'product_cost.required' => 'Please input Product Cost!',
            'product_cost.max' => 'Please input Max 20 Chars!',
            'product_cost.min' => 'Please input Min Chars 1',

            'product_price.required' => 'Please input Product Price!',
            'product_price.max' => 'Please input Max 20 Chars!',
            'product_price.min' => 'Please input Min Chars 1',
            
        ]
    );
    
        ProductionsPrices::insert([
            'product_id' => $request->product_id,
            'product_cost' => $request->product_cost,
            'product_price' => $request->product_price,
            'created_at' => \Carbon\Carbon::now(),
            ]);


        return Redirect()->back()->with('success', 'New Productions Prices Add Successfully!');
    }


    public function DeleteProductionsPrices($id)
    {
        DB::table('productions_prices')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Productions Prices Deleted Successfully!');
    }









    public function ActiveProductionsPrices($id)
    {
        DB::table('productions_prices')->where('id',$id)->update(['product_price_status'=>1]);
        return Redirect()->route('admin.productions.prices')->with('success', 'Status Active Successfully!');
    }


    public function DeactiveProductionsPrices($id)
    {
        DB::table('productions_prices')->where('id',$id)->update(['product_price_status'=>0]);
        return Redirect()->route('admin.productions.prices')->with('success', 'Status Deactive Successfully!');
    }



}
