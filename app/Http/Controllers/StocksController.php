<?php

namespace App\Http\Controllers;

use App\Models\Productions;
use App\Models\Stocks;
use App\Models\StocksViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminStocks()
    {
        $productions = DB::table('productions')
        ->where('product_status', 1)
        ->get();

        $stocks = DB::table('stocks')
        ->join('productions','stocks.product_id','productions.id')
        ->select('stocks.*','productions.product_name')
        ->latest('id')
        ->paginate(10);


        // $stocks = DB::table('stocks')
        // ->join('productions','stocks.product_id','productions.id')
        // ->join('productions_prices','stocks.product_id','productions_prices.product_id')
        // ->select('stocks.*','productions.product_name','productions_prices.product_cost','productions_prices.product_price')
        // ->latest('id')
        // ->paginate(10);

        // $totalRetailInventory = DB::table('stocks') 
        //     ->join('products',"stocks.product_id",'=',"products.id") 
        //     ->sum(DB::raw('stocks.current_quantity * products.unit_price')) 
        //     ->get();

         $totalstocksvalue = DB::table('stocks')
            ->sum(DB::raw('product_cost*stock_quantity*stock_size'));
         $totalstocksvaluep = DB::table('stocks')
            ->sum(DB::raw('product_price*stock_quantity*stock_size'));
         $income = $totalstocksvaluep - $totalstocksvalue;
        
        // $totaln = DB::table('stocks')
        // ->where('product_id',$product_id)
        // ->first(DB::raw('product_cost*stock_quantity*stock_size'));

       // $totaln = $row->stock_quantity * $row->stock_size * $row->product_cost;

        // $total  = Stocks::where('product_id', 1)->sum(DB::raw('product_cost*stock_quantity*stock_size'));
        return view('admin.stocks.stocks',compact('productions','stocks','totalstocksvalue','totalstocksvaluep','income'));
    }



    public function AddStocks(Request $request)
    {
        $validateData = $request->validate([
            
            'stock_quantity' => 'required|max:30',
            'stock_size' => 'required|max:30',
            // 'product_cost' => 'required|max:30',
        ],
        [
            'stock_quantity.required' => 'Please input Stock Quantity!',
            'stock_quantity.max' => 'Please input quantity Max 30 Chars!',

            'stock_size.required' => 'Please input Stock Size!',
            'stock_size.max' => 'Please input size Max 30 Chars!',

            // 'product_cost.required' => 'Please input Price!',
            // 'product_cost.max' => 'Please input price Max 30 Chars!',
        ]
    );
    



    Stocks::insert([
                'product_id' => $request->product_id,
                'stock_quantity' => $request->stock_quantity,
                'stock_size' => $request->stock_size,
                'product_cost' => $request->product_cost,
                'product_price' => $request->product_price,
                //'total_cost' => $request->product_cost*$request->stock_size*$request->stock_quantity,
                'created_at' => \Carbon\Carbon::now(),
                ]);


                $prdid = $request->product_id;
                $product = Productions::find($prdid);
                $qnt = $request->stock_quantity;
                $cstotal = $qnt * $request->stock_size * $request->product_cost;
                $prctotal = $qnt * $request->stock_size * $request->product_price;
                $stock = StocksViews::where('product_id', $product->id);
                $stock->increment('stock_quantity', $qnt);
                $stock->increment('total_cost', $cstotal);
                $stock->increment('total_price', $prctotal);


        return Redirect()->back()->with('success', 'Stock Product Add Successfully!');
    }


    public function DeleteStocks($id)
    {
        // $productn = Stocks::find($id);
        // $prdid = $productn->product_id;
        // $product = Productions::find($prdid);
        // $qnt = $productn->stock_quantity;
        // $stock = StocksViews::where('product_id', $product->id);
        // $stock->decrement('stock_quantity', $qnt);

        $productn = Stocks::find($id);
        $product = Productions::find($productn->product_id);
        $qnt = $productn->stock_quantity;
        $cstotal = $qnt * $productn->stock_size * $productn->product_cost;
        $prctotal = $qnt * $productn->stock_size * $productn->product_price;
        $stock = StocksViews::where('product_id', $product->id);
        $stock->decrement('stock_quantity', $qnt);
        $stock->decrement('total_cost', $cstotal);
        $stock->decrement('total_price', $prctotal);


        DB::table('stocks')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'Stocks Deleted Successfully!');
    }


    public function EditStocks($id)
    {
        $stocks = DB::table('stocks')->where('id', $id)->first();
        return view('admin.stocks.edit',compact('stocks'));
    }



    public function UpdateStocks(Request $request, $id)
    {
        
        $validateData = $request->validate([
            
            'stock_quantity' => 'required|max:30',
        ],
        [
            'stock_quantity.required' => 'Please input Stock Name!',
            'stock_quantity.max' => 'Please input quantity Max 30 Chars!',
        ]
    );
    //$totalk = $request->product_cost*$request->stock_size*$request->stock_quantity;

        Stocks::find($id)->update([
            'product_id' => $request->product_id,
            'stock_quantity' => $request->stock_quantity,
            'stock_size' => $request->stock_size,
            'product_cost' => $request->product_cost,
            'product_price' => $request->product_price,
            //'total_cost' => $request->product_cost*$request->stock_size*$request->stock_quantity, 
            'user_id' => Auth::user()->id,
        ]);


        $product = Productions::find($request->product_id);
        $qnt = $request->stock_quantity-$request->old_stock_quantity;
        $cstotal = $qnt * $request->stock_size * $request->product_cost;
        $prctotal = $qnt * $request->stock_size * $request->product_price;
        $stock = StocksViews::where('product_id', $product->id);
        $stock->increment('stock_quantity', $qnt);
        $stock->increment('total_cost', $cstotal);
        $stock->increment('total_price', $prctotal);

        return Redirect()->route('admin.stocks')->with('success', 'Stocks Updated Successfull!');
    }



    public function ProductPrice($id)
    {
        $stockproductprice = DB::table('productions')
            ->where('id',$id)
            ->get();
        return json_encode($stockproductprice);
    }


    // public function ProductPrice(Request $request, $stock_id)
    //     {

    //     $stock = Stocks::where('stock_id', $stock_id)->first();
    //     if ($stock == null) {
    //         return null;
    //     }

    //     return response()->json($stock->unit_selling_price);
    //     }


    // public function AdminStocksViews()
    // {
    //     //$productions = DB::table('productions')->get();
    //     // $stocksviews = DB::table('stocks_views')
    //     // ->join('productions','stocks_views.product_id','productions.id')
    //     // ->join('stocks','stocks_views.product_id','stocks.product_id')
    //     // ->select('stocks_views.*','productions.product_name','stocks.stock_size')
    //     // ->latest('product_id')
    //     // ->paginate(10);

    //    // $productss = DB::table('productions')->where('id',$id)->get();


    // //    $stocksviews = DB::table('stocks_views')
    // //                 ->join('productions','stocks_views.product_id','productions.id')
    // //                 ->select('stocks_views.*','productions.product_name')
    // //                 ->latest('product_id') 
    // //                 ->paginate(10);

    //     //$productcost = DB::table('stocks')->get(DB::raw('product_cost*stock_quantity*stock_size'));
        

    //     // $productstock = DB::table('productions')->get();
    //     // $stockprod = DB::table('stocks')->get();



    //     // $stocksviews = DB::table('stocks')
    //     //     ->join('productions','stocks.product_id','productions.id')
    //     //     ->join('stocks_views','stocks.product_id','stocks_views.product_id')
    //     //     ->select('stocks.*','productions.product_name','productions.product_size','stocks_views.product_id','stocks_views.stock_quantity')
    //     //     //->groupBy('stocks.product_id')
    //     //     ->get();

    //     $stocksviews = DB::table('stocks_views')
    //     ->join('productions','stocks_views.product_id', 'productions.id')
    //     ->join('stocks','stocks_views.product_id','stocks.id')
    //     ->select('stocks_views.*','productions.product_name','productions.product_size','stocks.product_id','stocks.stock_quantity')
    //     ->latest('product_id')
    //     ->paginate(50);

    //     $totalstocksviewvalue = DB::table('stocks_views')
    //     ->sum(DB::raw('total_price'));
    //     // $total  = Stocks::where('product_id', 1)->sum(DB::raw('product_cost*stock_quantity*stock_size'));




    //     // $totalRetailInventory = DB::table('stocks') 
    //     //     ->join('products',"stocks.product_id",'=',"products.id") 
    //     //     ->sum(DB::raw('stocks.current_quantity * products.unit_price')) 
    //     //     ->get();


  
    //     // $totaln = DB::table('stocks')
    //     // ->where('product_id',$product_id)
    //     // ->first(DB::raw('product_cost*stock_quantity*stock_size'));

    //    // $totaln = $row->stock_quantity * $row->stock_size * $row->product_cost;

    //     // $total  = Stocks::where('product_id', 1)->sum(DB::raw('product_cost*stock_quantity*stock_size'));
    //     return view('admin.stocks.stocks_views',compact('stocksviews','totalstocksviewvalue'));
    // }



    
    // public function StockProductPrice($id)
    // {
    //     $transfersproductsprice = DB::table('productions')
    //         ->join('productions_prices','productions.id','productions_prices.product_id')
    //         ->select('productions.*','productions_prices.product_id','productions_prices.product_cost','productions_prices.product_price')
    //         ->where('product_id',$id)
    //         ->where('product_status', 1)
    //         ->where('product_price_status', 1)
    //         ->get();

    //     return json_encode($transfersproductsprice);

    // }







    public function AdminStocksViews()
    {
        //$productions = DB::table('productions')->get();
        // $stocksviews = DB::table('stocks_views')
        // ->join('productions','stocks_views.product_id','productions.id')
        // ->join('stocks','stocks_views.product_id','stocks.product_id')
        // ->select('stocks_views.*','productions.product_name','stocks.stock_size')
        // ->latest('product_id')
        // ->paginate(10);

        // work
        // $stocksviews = DB::table('stocks_views')
        // ->join('productions','stocks_views.product_id','productions.id')
        // ->join('productions_prices','stocks_views.product_id','productions_prices.product_id')
        // //->join('stocks','stocks_views.product_id','stocks.product_id')
        // ->select('stocks_views.*','productions.product_name','productions.product_size',
        //         'productions_prices.product_cost','productions_prices.product_price')
        // ->latest('product_id')
        // ->paginate(10);


        $stocksviews = DB::table('stocks_views')
        ->join('productions','stocks_views.product_id','productions.id')
        //->join('productions_prices','stocks_views.product_id','productions_prices.product_id')
        //->join('stocks','stocks_views.product_id','stocks.product_id')
        ->select('stocks_views.*','productions.product_name','productions.product_size')
        ->latest('product_id')
        ->paginate(10);

        
        $totalstocksviewvalue = DB::table('stocks_views')
            ->sum(DB::raw('total_cost'));

        // $totalRetailInventory = DB::table('stocks') 
        //     ->join('products',"stocks.product_id",'=',"products.id") 
        //     ->sum(DB::raw('stocks.current_quantity * products.unit_price')) 
        //     ->get();


  
        // $totaln = DB::table('stocks')
        // ->where('product_id',$product_id)
        // ->first(DB::raw('product_cost*stock_quantity*stock_size'));

       // $totaln = $row->stock_quantity * $row->stock_size * $row->product_cost;

        // $total  = Stocks::where('product_id', 1)->sum(DB::raw('product_cost*stock_quantity*stock_size'));
        return view('admin.stocks.stocks_views',compact('stocksviews','totalstocksviewvalue'));
    }



    
    public function StockProductPrice($id)
    {
        $transfersproductsprice = DB::table('productions')
            ->join('productions_prices','productions.id','productions_prices.product_id')
            ->select('productions.*','productions_prices.product_id','productions_prices.product_cost','productions_prices.product_price')
            ->where('product_id',$id)
            ->where('product_status', 1)
            ->where('product_price_status', 1)
            ->get();

        return json_encode($transfersproductsprice);

    }


    public function StockProductPriceCost($id)
    {
        $transfersproductsprices = DB::table('productions_prices')
            ->where('product_id',$id)
            ->where('product_price_status', 1)
            ->get();

        return json_encode($transfersproductsprices);

    }


    public function StocksProductsLists($id)
    {
       // $transfersproducts = Productions::find($id);

        //$date = \Carbon\Carbon::now();

        $stocksproductslist = DB::table('transfers_products')
        ->join('transfers','transfers_products.transfer_id','transfers.id')
        ->join('clients','transfers_products.client_id','clients.id')
        ->join('productions','transfers_products.product_id','productions.id')
        ->Join('refunds','transfers_products.product_id','refunds.product_id')
       // ->join('productions_prices','transfers_products.id','productions_prices.product_id')
        ->where('productions.id', $id)
        ->orWhere('refunds.product_id', $id)
        ->select('transfers_products.*','transfers.transfer_name','clients.client_store',
                 'productions.product_name','productions.product_size')
        ->orderByDesc('created_at')
        ->get();
        //->lists(transfers_products,refunds);

        return view('admin.stocks.stocksproductslist',compact('stocksproductslist'));
    }




}
