<?php

namespace App\Http\Controllers;

use App\Models\TransfersProducts;
use App\Models\Transfers;
use App\Models\Productions;
use App\Models\Clients;
use App\Models\Stocks;
use App\Models\StocksViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransfersProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function AdminTransfersProducts()
    {
        // $transfersproducts = TransfersProducts::latest()->paginate(5);
        // return view('admin.transfers.transfersproducts', compact('transfersproducts'));
        $transfersproducts = DB::table('transfers_products')
        ->join('transfers','transfers_products.transfer_id','transfers.id')
        ->join('clients','transfers_products.client_id','clients.id')
        ->join('productions','transfers_products.product_id','productions.id')
        //->join('productions_prices','transfers_products.id','productions_prices.product_id')
        ->select('transfers_products.*','transfers.transfer_name','clients.client_store'
                ,'productions.product_name','productions.product_size')
        // ->groupBy('product_id')
        //     ->get();
        ->latest('id')
        ->paginate(10);

        return view('admin.transfers.transfersproducts',compact('transfersproducts'));
    }


    public function AddTransfersProducts(Request $request)
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
            'transfer_id.required' => 'Please input Transfer Name!',
            'client_id.required' => 'Please input Client Name!',
            'product_id.required' => 'Please input Product Name!',
            'product_cost.required' => 'Please input Product Cost!',
            'product_cost.max' => 'Please input true Product Cost!',
            'product_price.required' => 'Please input Product Price!',
            'product_price.max' => 'Please input true Product Price!',
            'product_quantity.required' => 'Please input true Product quantity!',
            'product_quantity.max' => 'Please input true Product quantity!',
        ]);
    
        // $prdid = $request->product_id;
        // $product = Productions::find($prdid);
        // $qnt = $request->product_quantity;
        // $stock = StocksViews::where('product_id', $product->id);
        // $stock->if(('stock_quantity', $qnt);

        $product_id = $request->product_id;
       

        // $qntold = StocksViews::with('stocks_views.product_id')
        //         ->where('product_id',$product_id)
        //         ->where('stock_quantity',$product_id)
        //         ->first();


        // $qntold = DB::table('transfers_products')
        //     ->join('stocks_views','transfers_products.product_id','stocks_views.product_id')
        //     ->select('transfers_products.*','stocks_views.stock_quantity')
        //     ->where('stocks_views.product_id',$product_id)
        //     ->first();
        
            
        $qntold = DB::table('stocks_views')
        ->where('stocks_views.product_id',$product_id)
        ->first('stock_quantity');


         $stockqty = $qntold->stock_quantity;
         $trfqty = $request->product_quantity;
 //dd($trfqty);

        if($stockqty >= $trfqty) {
            TransfersProducts::insert([
                'transfer_id' => $request->transfer_id,
                'client_id' => $request->client_id,
                'product_id' => $request->product_id,
                'product_cost' => $request->product_cost,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'created_at' => \Carbon\Carbon::now(),
                ]);
        
            
                // $prdid = $request->product_id;
                // $product = Productions::find($prdid);
                // $qnt = $request->product_quantity;
                // $cstotal = $request->product_cost;
                // $prctotal = $request->product_price;
                // $stock = StocksViews::where('product_id', $product->id);
                // $stock->decrement('stock_quantity', $qnt);
                // $stock->decrement('total_cost', $cstotal);
                // $stock->decrement('total_price', $prctotal);
    
                $prdid = $request->product_id;
                $product = Productions::find($prdid);
                $productsize = $product->product_size;
                $qnt = $request->old_product_quantity - $request->product_quantity;
                $cstotal = $qnt * $productsize * $request->product_cost;
                $prctotal = $qnt * $productsize * $request->product_price;
                $stock = StocksViews::where('product_id', $product->id);
                $stock->increment('stock_quantity', $qnt);
                $stock->increment('total_cost', $cstotal);
                $stock->increment('total_price', $prctotal);

    
            return Redirect()->back()->with('success', 'TransferProducts Added Successfully!');

        } 
        
        else {
            
            return Redirect()->back()->with('error', 'The Requested quantity for this product is not available!');

        }
        

        
    }


    
    public function DeleteTransfersProducts($id)
    {
        $productn = TransfersProducts::find($id);
        $product = Productions::find($productn->product_id);
        $productsize = $product->product_size;
        $qnt = $productn->product_quantity;
        $cstotal = $qnt * $productsize * $productn->product_cost;
        $prctotal = $qnt * $productsize * $productn->product_price;
        $stock = StocksViews::where('product_id', $product->id);
        $stock->increment('stock_quantity', $qnt);
        $stock->increment('total_cost', $cstotal);
        $stock->increment('total_price', $prctotal);

        DB::table('transfers_products')->where('id',$id)->delete();
        return Redirect()->back()->with('success', 'TransferProducts Deleted Successfully!');
    }


    public function EditTransfersProducts($id)
    {
        $transfersproducts = TransfersProducts::find($id);
        return view('admin.transfers.editproducts', compact('transfersproducts'));


        // $transfersproducts = DB::table('transfers_products')->where('id', $id)->first();
        // return view('admin.transfers.editproducts',compact('transfersproducts'));
    }



    public function UpdateTransfersProducts(Request $request, $id)
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
            'transfer_id.required' => 'Please input Transfer Name!',
            'client_id.required' => 'Please input Client Name!',
            'product_id.required' => 'Please input Product Name!',
            'product_cost.required' => 'Please input Product Cost!',
            'product_cost.max' => 'Please input true Product Cost!',
            'product_price.required' => 'Please input Product Price!',
            'product_price.max' => 'Please input true Product Price!',
            'product_quantity.required' => 'Please input true Product quantity!',
            'product_quantity.max' => 'Please input true Product quantity!',
        ]);
    
        // $prdid = $request->product_id;
        // $product = Productions::find($prdid);
        // $qnt = $request->product_quantity;
        // $stock = StocksViews::where('product_id', $product->id);
        // $stock->if(('stock_quantity', $qnt);

        $product_id = $request->product_id;
       

        // $qntold = StocksViews::with('stocks_views.product_id')
        //         ->where('product_id',$product_id)
        //         ->where('stock_quantity',$product_id)
        //         ->first();


        // $qntold = DB::table('transfers_products')
        //     ->join('stocks_views','transfers_products.product_id','stocks_views.product_id')
        //     ->select('transfers_products.*','stocks_views.stock_quantity')
        //     ->where('stocks_views.product_id',$product_id)
        //     ->first();
        
            
        $qntold = DB::table('stocks_views')
        ->where('stocks_views.product_id',$product_id)
        ->first('stock_quantity');
//dd($qntold);

       //  $stockqty = $qntold->stock_quantity;

         $trfqty = $request->product_quantity;
        
 //dd($trfqty);

 $update = TransfersProducts::find($id)->update([
    'transfer_id' => $request->transfer_id,
    'client_id' => $request->client_id,
    'product_id' => $request->product_id,
    'product_cost' => $request->product_cost,
    'product_price' => $request->product_price,
    'product_quantity' => $request->product_quantity,
    'updated_at' => \Carbon\Carbon::now(),
    ]);

    $oldqnt = $request->old_product_quantity;
    $prdid = $request->product_id;
    $product = Productions::find($prdid);
    $productsize = $product->product_size;
    $qnt = $oldqnt - $request->product_quantity;
    $cstotal = $qnt * $productsize * $request->product_cost;
    $prctotal = $qnt * $productsize * $request->product_price;
    $stock = StocksViews::where('product_id', $product->id);

        if($qntold >= $trfqty) {
            $stock->increment('stock_quantity', $qnt);
            $stock->increment('total_cost', $cstotal);
            $stock->increment('total_price', $prctotal);

            return Redirect()->route('admin.transfersproducts')->with('success', 'Transfers Products Updated Successfull!');
        } 
        
        elseif($oldqnt <= $trfqty) {
                $stock->increment('stock_quantity', $qnt);
                $stock->increment('total_cost', $cstotal);
                $stock->increment('total_price', $prctotal);
            
            return Redirect()->route('admin.transfersproducts')->with('success', 'Transfers Products Updated Successfull!');               
        }
        else {
            return Redirect()->back()->with('error', 'The Requested quantity for this product is not available!');
        }



    //     $validateData = $request->validate([
            
    //         'transfer_id' => 'required|max:10',
    //         'client_id' => 'required|max:10',
    //         'product_id' => 'required|max:10',
    //         'product_price' => 'required|max:10',
    //         'product_quantity' => 'required|max:10',

    //     ],
    //     [
    //         'transfer_id.required' => 'Please input True Transfer Name!',
    //         'transfer_id.max' => 'Please input Transfer Name Max 10 Chars!',

    //         'client_id.required' => 'Please input True Client Name!',
    //         'client_id.max' => 'Please input Client Name Max 10 Chars!',

    //         'product_id.required' => 'Please input True Product Name!',
    //         'product_id.max' => 'Please input Product Name Max 10 Chars!',

    //         'product_price.required' => 'Please input True Transfer Name!',
    //         'product_price.max' => 'Please input Transfer Name Max 10 Chars!',

    //         'product_quantity.required' => 'Please input True Transfer Name!',
    //         'product_quantity.max' => 'Please input Transfer Name Max 10 Chars!',
    //     ]
    // );
    
    //     $update = TransfersProducts::find($id)->update([
    //         'transfer_id' => $request->transfer_id,
    //         'client_id' => $request->client_id,
    //         'product_id' => $request->product_id,
    //         'product_price' => $request->product_price,
    //         'product_quantity' => $request->product_quantity,
    //         'user_id' => Auth::user()->id,
    //     ]);

    //     $product = Productions::find($request->product_id);
    //     $qnt = $request->product_quantity-$request->old_product_quantity;
    //     $stock = StocksViews::where('product_id', $product->id);
    //     $stock->increment('stock_quantity', $qnt);
 
    //     return Redirect()->route('admin.transfersproducts')->with('success', 'Transfers Products Updated Successfull!');
    }








    public function TransfersProductPrice($id)
    {
        $transfersproductsprice = DB::table('productions_prices')
            ->where('product_id',$id)
            ->where('product_price_status', 1)
            ->get();

        return json_encode($transfersproductsprice);
    }




    public function ViewTransfers($id){

        DB::statement("SET SQL_MODE=''");

        $backtransfers = Transfers::where('id', $id)->first();

        $transfer = DB::table('transfers')
            ->join('sellers', 
            'transfers.seller_id', 
            'sellers.id')

            ->select('transfers.*',
            'sellers.seller_name',
            'sellers.seller_surname',
            'sellers.seller_city',
            'sellers.seller_phone',
            )

            ->where('transfers.id',$id)
            ->first();

        


        $transferpros = DB::table('transfers')
            ->join('transfers_products', 
                   'transfers.id', 
                   'transfers_products.transfer_id')

            ->join('productions',
                   'transfers_products.product_id',
                   'productions.id')

            ->join('clients', 
                   'transfers_products.client_id', 
                   'clients.id')

            ->where('transfers.id',$id)
            ->groupBy('clients.id',
                      'productions.id',
                      'productions.product_name',
                      'clients.client_store')
            ->select('transfers.*',
                    // 'transfers_products.client_id',
                    // 'transfers_products.product_id',
                    'transfers_products.product_cost',
                    'transfers_products.product_price',
                    'transfers_products.client_id',
                    DB::raw("SUM(transfers_products.product_quantity) as product_quantity"),
                    //'transfers_products.product_quantity',
                    'productions.product_name',
                    'productions.product_size',
                    'clients.client_store',
                    'clients.client_name',
                    'clients.client_surname'
                    )
            //->distinct()        
            //->latest('id')
            ->paginate(50);

            

        // $totalall = DB::table('transfers_products')
        // ->where('product_id',$id)
        // ->sum(DB::raw('product_cost*stock_quantity*stock_size'));

            // $users = \DB::table('payments')
            // ->join('devices', 'devices.id', '=', 'payments.device_id')
            // ->join('users', 'users.id', '=', 'devices.user_id')
            // ->select('payments.*', 'users.name')
            // ->get();


            $clients = DB::table('transfers_products')
            ->join('clients', 
            'transfers_products.client_id', 
            'clients.id')

            ->select('transfers_products.*',
                     'clients.client_store',
                     'clients.client_name',
                     'clients.client_surname',
            )
            ->where('transfers_products.transfer_id',$id)
            ->groupBy('clients.id','clients.client_store')
            ->get();


            $alltot = DB::table('transfers')
            ->join('transfers_products', 
                   'transfers.id', 
                   'transfers_products.transfer_id')

            ->join('productions',
                   'transfers_products.product_id',
                   'productions.id')

            ->where('transfers.id',$id)

            ->select('transfers.*',
                    'transfers_products.product_cost',
                    'transfers_products.product_price',
                    'transfers_products.product_quantity',
                    'productions.product_size',)
            
            ->sum(DB::raw('product_price * product_quantity * product_size'));
            
            //->latest('id')
            // ->paginate(50);

        
            $refunds = DB::table('refunds')
            ->join('transfers',
            'refunds.transfer_id',
            'transfers.id')

            ->join('clients',
            'refunds.client_id',
            'clients.id')

            ->join('productions',
            'refunds.product_id',
            'productions.id')

            ->where('transfer_id', $id)

            ->groupBy('clients.id',
            'clients.client_store',
            'productions.id',
            'productions.product_name'
            )
            
            ->select('refunds.id',
            'refunds.product_cost',
            'refunds.product_price',
            DB::raw("SUM(refunds.product_quantity) as product_quantity"),
            'transfers.transfer_name',
            'clients.client_store',
            'productions.product_name',
            'productions.product_size')
            //->latest('id')
            ->paginate(50);



            
        // $transferpros = DB::table('transfers')
        // ->join('transfers_products', 
        //        'transfers.id', 
        //        'transfers_products.transfer_id')

        // ->join('productions',
        //        'transfers_products.product_id',
        //        'productions.id')

        // ->join('clients', 
        //        'transfers_products.client_id', 
        //        'clients.id')

        // ->where('transfers.id',$id)
        // ->groupBy('clients.id',
        //           'productions.id',
        //           'productions.product_name',
        //           'clients.client_store')
        // ->select('transfers.*',
        //         // 'transfers_products.client_id',
        //         // 'transfers_products.product_id',
        //         'transfers_products.product_cost',
        //         'transfers_products.product_price',
        //         'transfers_products.client_id',
        //         DB::raw("SUM(transfers_products.product_quantity) as product_quantity"),
        //         //'transfers_products.product_quantity',
        //         'productions.product_name',
        //         'productions.product_size',
        //         'clients.client_store',
        //         'clients.client_name',
        //         'clients.client_surname'
        //         )
        // //->distinct()        
        // //->latest('id')
        // ->paginate(50);




            $alltotalrefunds = DB::table('refunds')
            ->join('productions',
                   'refunds.product_id',
                   'productions.id')
            ->where('refunds.transfer_id',$id)
            ->select('transfers.*',
                    'refunds.product_cost',
                    'refunds.product_price',
                    'refunds.product_quantity',
                    'productions.product_size',)
            ->sum(DB::raw('product_price * product_quantity * product_size'));

            $alltotalselling = $alltot-$alltotalrefunds;

        return view('admin.transfers.show', compact('transferpros','transfer','clients','alltot','backtransfers','refunds','alltotalrefunds','alltotalselling'));
                      // return response()->json($product);
           
    }



    public function ClientsTransfers($id, $client_id)
    {
        $clientstransfers = DB::table('transfers_products')
        ->join('productions', 
            'transfers_products.product_id', 
            'productions.id'
            )
        ->join('clients', 
            'transfers_products.client_id', 
            'clients.id'
            )
        ->where('transfers_products.transfer_id',$id)
        ->where('transfers_products.client_id',$client_id)
            
        ->select('transfers_products.*',
        'productions.product_size',
        'productions.product_name',
        'clients.client_store'
            )

        ->get();

        // $clientstore = DB::table('clients')
        // ->where('id',$client_id)
        // ->get('client_store');
        //$clientstore = json_decode( json_encode($clientstore), true);
        
        // return json_encode($clientstore)
        //$clientstore = Clients::first('id')->(10);

       $clientstore = Clients::where('id', $client_id)->first();
       // $clientstore =Clients::findOrFail($client_id); 

       $alltot = DB::table('transfers')
       ->join('transfers_products', 
              'transfers.id', 
              'transfers_products.transfer_id')

       ->join('productions',
              'transfers_products.product_id',
              'productions.id')

       ->join('clients', 
              'transfers_products.client_id', 
              'clients.id'
              )

       ->where('transfers.id',$id)
       ->where('transfers_products.client_id',$client_id)
     
       ->select('transfers.*',
               'transfers_products.product_cost',
               'transfers_products.product_price',
               'transfers_products.product_quantity',
               'productions.product_size',)
       
       ->sum(DB::raw('product_price * product_quantity * product_size'));

    return view('admin.transfers.clientstransfers',compact('clientstransfers','clientstore','alltot'));

    }

    // public function ClientsTransfers($id, $client_id)
    // {
    //     $clientstransfers = DB::table('transfers_products')
    //     ->join('productions', 
    //         'transfers_products.product_id', 
    //         'productions.id'
    //         )

    //     ->where('transfers_products.transfer_id',$id)
    //     ->where('transfers_products.client_id',$client_id)
    //     ->groupBy('clients.id',
    //                   'productions.id',
    //                   'productions.product_name',
    //                   'clients.client_store')
    //     ->select('transfers_products.*',
    //             'productions.product_size',
    //             'productions.product_name',
    //             DB::raw("SUM(transfers_products.product_quantity) as product_quantity"),
    //             )
    //     ->paginate(50);

    // return view('admin.transfers.clientstransfers',compact('clientstransfers'));

    // }






 
    public function BackIdTransfers($id)
    {
        DB::statement("SET SQL_MODE=''");

        //$backtransfers = DB::table('transfers')->where('id', $id)->first();
        $backtransfers = Transfers::where('id', $id)->first();
        
        $transferproos = DB::table('transfers')
            ->join('transfers_products', 
                   'transfers.id', 
                   'transfers_products.transfer_id')

            ->join('productions',
                   'transfers_products.product_id',
                   'productions.id')

            ->join('clients', 
                   'transfers_products.client_id', 
                   'clients.id')


            ->where('transfers.id',$id)
            ->groupBy('clients.id',
                      'productions.id',
                      'productions.product_name',
                      'clients.client_store')
            ->select('transfers.*',
                    // 'transfers_products.client_id',
                    // 'transfers_products.product_id',
                    'transfers_products.product_cost',
                    'transfers_products.product_price',
                    'transfers_products.client_id',
                    DB::raw("SUM(transfers_products.product_quantity) as product_quantity"),
                    //'transfers_products.product_quantity',
                    'productions.product_name',
                    'productions.product_size',
                    'clients.client_store',
                    )
            //->distinct()        
            //->latest('id')
            ->paginate(50);


            $alltot = DB::table('transfers')
            ->join('transfers_products', 
                   'transfers.id', 
                   'transfers_products.transfer_id')

            ->join('productions',
                   'transfers_products.product_id',
                   'productions.id')

            ->where('transfers.id',$id)

            ->select('transfers.*',
                    'transfers_products.product_cost',
                    'transfers_products.product_price',
                    'transfers_products.product_quantity',
                    'productions.product_size',)
            
            ->sum(DB::raw('product_price * product_quantity * product_size'));

        return view('admin.transfers.backtransfers',compact('backtransfers','transferproos','alltot'));

    }


    public function BackUpdateTransfers($id)
    {




    }





}
