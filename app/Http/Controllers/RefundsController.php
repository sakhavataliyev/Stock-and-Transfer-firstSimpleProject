<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Productions;
use App\Models\Refunds;
use App\Models\StocksViews;
use App\Models\TransfersProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefundsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function AdminRefunds()
    {
       // $refunds = Refunds::latest('id')->paginate(10);

        $refunds = DB::table('refunds')
        ->join('transfers','refunds.transfer_id','transfers.id')
        ->join('clients','refunds.client_id','clients.id')
        ->join('productions','refunds.product_id','productions.id')
        ->select('refunds.*','transfers.transfer_name','clients.client_store'
                ,'productions.product_name','productions.product_size')

        ->latest('id')
        ->paginate(10);

        return view('admin.refunds.refunds',compact('refunds'));
    }




    public function AddRefunds(Request $request)
    {
        $validateData = $request->validate([
            
            'transfer_id' => 'required',
            //'seller_id' => 'required',
            'client_id' => 'required',
            'product_id' => 'required',
            'product_cost' => 'required|max:10',
            'product_price' => 'required|max:10',
            'product_quantity' => 'required|max:10',
        ],
        [
            'transfer_id.required' => 'Please input Transfer Name!',
            //'seller_id.required' => 'Please input Seller Name!',
            'client_id.required' => 'Please input Client Name!',
            'product_id.required' => 'Please input Product Name!',

            'product_cost.required' => 'Please input Product Cost!',
            'product_cost.max' => 'Please input true Product Cost!',
            'product_price.required' => 'Please input Product Price!',
            'product_price.max' => 'Please input true Product Price!',
            'product_quantity.required' => 'Please input true Product quantity!',
            'product_quantity.max' => 'Please input true Product quantity!',
        ]
    );
    

    Refunds::insert([
                'transfer_id' => $request->transfer_id,
               // 'seller_id' => $request->seller_id,
                'client_id' => $request->client_id,
                'product_id' => $request->product_id,
                'product_cost' => $request->product_cost,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'created_at' => \Carbon\Carbon::now(),
                ]);

                $productid = $request->product_id;
                $product = Productions::find($productid);
                $productsize = $product->product_size;
                $qnt = $request->product_quantity;
                $cstotal = $qnt * $productsize * $request->product_cost;
                $prctotal = $qnt * $productsize * $request->product_price;
                $stock = StocksViews::where('product_id', $product->id);
                $stock->increment('stock_quantity', $qnt);
                $stock->increment('total_cost', $cstotal);
                $stock->increment('total_price', $prctotal);

        return Redirect()->back()->with('success', 'Stock Product Add Successfully!');
    }



    public function EditRefunds($id)
    {
        //$refundsedit = Refunds::find($id);
        $refundsedit = DB::table('refunds')
        ->join('transfers',
        'refunds.transfer_id',
        'transfers.id'
        )
        ->join('productions', 
        'refunds.product_id', 
        'productions.id'
        )
        ->join('clients', 
            'refunds.client_id', 
            'clients.id'
            )
        ->where('refunds.id',$id)
        ->select('refunds.*',
        'transfers.transfer_name',
        'productions.product_name',
        'productions.product_size',
        'clients.client_store'
         )
        ->first();

        return view('admin.refunds.edit', compact('refundsedit'));
    }


    public function UpdateRefunds(Request $request, $id)
    {
        $validateData = $request->validate([
            'transfer_id' => 'required',
            'client_id' => 'required',
            'product_id' => 'required',
            'product_cost' => 'required|max:30',
            'product_price' => 'required|max:30',
            'product_quantity' => 'required|max:10',
        ],
        [
            'transfer_id.required' => 'Please input Transfer id!',
            'client_id.required' => 'Please input Client Name!',
            'product_id.required' => 'Please input Product Name!',
            'product_cost.required' => 'Please input Product Cost!',
            'product_cost.max' => 'Please input true Product Cost!',
            'product_price.required' => 'Please input Product Price!',
            'product_price.max' => 'Please input true Product Price!',
            'product_quantity.required' => 'Please input true Product quantity!',
            'product_quantity.max' => 'Please input true Product quantity!',
        ]);
    
        $product_id = $request->product_id;
       
        $qntold = DB::table('stocks_views')
        ->where('stocks_views.product_id',$product_id)
        ->first('stock_quantity');

         $trfqty = $request->product_quantity;
        
        if($qntold >= $trfqty) {
            $update = Refunds::find($id)->update([
                'transfer_id' => $request->transfer_id,
                'client_id' => $request->client_id,
                'product_id' => $request->product_id,
                'product_cost' => $request->product_cost,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'updated_at' => \Carbon\Carbon::now(),
                ]);
        
                $prdid = $request->product_id;
                $product = Productions::find($prdid);
                $productsize = $product->product_size;
                $qnt = $request->old_product_quantity - $request->product_quantity;
                $cstotal = $qnt * $productsize * $request->product_cost;
                $prctotal = $qnt * $productsize * $request->product_price;
                $stock = StocksViews::where('product_id', $product->id);
                $stock->decrement('stock_quantity', $qnt);
                $stock->decrement('total_cost', $cstotal);
                $stock->decrement('total_price', $prctotal);
      

            return Redirect()->route('admin.refunds')->with('success', 'Transfers Products Updated Successfull!');
        } 
        
        else {
            
            return Redirect()->back()->with('error', 'The Requested quantity for this product is not available!');
            
        }
    }




    public function DeleteRefunds($id)
    {
        $refundsid = Refunds::find($id);
        $product = Productions::find($refundsid->product_id);
        $productsize = $product->product_size;
        $qnt = $refundsid->product_quantity;
        $prdcost = $refundsid->product_cost;
        $prdprice = $refundsid->product_price;
        $cstotal = $qnt * $productsize * $prdcost;
        $prctotal = $qnt * $productsize * $prdprice;
        $stock = StocksViews::where('product_id', $product->id);
        $stock->decrement('stock_quantity', $qnt);
        $stock->decrement('total_cost', $cstotal);
        $stock->decrement('total_price', $prctotal);

        DB::table('refunds')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Refund Deleted Successfully!');
    }



}
