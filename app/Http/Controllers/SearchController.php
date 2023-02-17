<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Productions;
use App\Models\ProductionsPrices;
use App\Models\Stocks;
use App\Models\StocksViews;
use App\Models\TransfersProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // public function Search(Request $request){
    //     // Get the search value from the request
    //     $search = $request->input('search');
    
    //     // Search in the title and body columns from the posts table
    //     $clients = Clients::query()
    //         ->where('client_name', 'LIKE', "%{$search}%")
    //         ->orWhere('client_surname', 'LIKE', "%{$search}%")
    //         ->orWhere('client_surname', 'LIKE', "%{$search}%")
    //         ->orWhere('client_store', 'LIKE', "%{$search}%")
    //         ->orWhere('client_phone', 'LIKE', "%{$search}%")
    //         ->limit(50)
    //         ->latest('id')
    //         ->paginate(10);
           
    //         // ->get();
    
    //     // Return the search view with the resluts compacted
    //     return view('admin.body.search', compact('clients'));
    // }

    




//     public function Search()
// {
//     $date = \Carbon\Carbon::today()->subDays(7);
//     $clients = Clients::where('created_at','>=',$date)->get();
//     dd($clients);
// }



//         public function Search()
//         {
//         //     $date = \Carbon\Carbon::today()->subDays(10);
//         //     $num = 65;
//         //     $clients = Stocks::where('stock_quantity','>=',$num)->get();
//         // //    $clients =  $date->subMonth()->format('F'); // 11
            
//         //    // dd($clients);


//         // $data = DB::table("Stocks")->sum('stock_quantity');

//         // print_r($data);

//         $date = \Carbon\Carbon::today()->subDays(10);

//         //$clients = Stocks::where('stock_quantity','>=',$num)->get();

//         //$product = Productions::where('id', $product_id)->first();

//         // $data = DB::table("transfers_products")

//         //         ->select(DB::raw("SUM(product_price*product_quantity) as count"))

//         //     // ->orderBy("created_at")

//         //         ->where('created_at','>=',$date)

//         //         //->groupBy(DB::raw("year(transfer_id)"))

//         //         ->get();

//         //         dd($data);
//         //print_r($data);

//         $clients = Clients::select(DB::raw("COUNT(*) as count"))
//                     ->whereYear('created_at', date('Y'))
//                     ->groupBy(DB::raw("Month(created_at)"))
//                     ->pluck('count');
          
//         //return view('home', compact('userData'));

//            return view('admin.body.search', compact('clients'));

//         //$test = TransfersProducts::where('created_at','>=',$date)->get();




//         $test = DB::table('transfers_products')
//         ->join('transfers','transfers_products.transfer_id','transfers.id')
//         ->join('clients','transfers_products.client_id','clients.id')
//         ->join('productions','transfers_products.product_id','productions.id')
//         ->join('stocks_views','transfers_products.product_id','stocks_views.product_id')
//         //->join('productions_prices','transfers_products.id','productions_prices.product_id')
//         ->select('transfers_products.*','transfers.transfer_name','clients.client_store'
//                 ,'productions.product_name','productions.product_size')
//         //->groupBy('product_id')
//         //     ->get();
//         ->where('transfers_products.created_at','>=',$date)
//         ->where('transfers_products.product_id', 1)
//         ->latest('id')
//         ->get();

//         // ->join('refunds',
//         // 'transfers_products.product_id',
//         // 'refunds.product_id',
//         // )
//         //->where('created_at','>=',$date)
//         // ->where('transfers_products.product_id',
//         // 'refunds.product_id'
//         // )
//         //->select('transfers_products');
//         //->select(DB::raw("SUM(product_price*product_quantity) as count"));
//       //  $clients = Stocks::where('stock_quantity','>=',$num)->get();
//         //->select('transfers_products.product_cost',
//                 // 'refunds.product_cost',
//                 // 'refunds.product_price',
//                 // 'refunds.product_quantity',
//        // );
//       //  ->sum('product_price * product_quantity * product_size');

//         // dd($test);

//        // dd($test);

//         // $alltot = DB::table('transfers')
//         // ->join('transfers_products', 
//         //     'transfers.id', 
//         //     'transfers_products.transfer_id')

//         // ->join('productions',
//         //     'transfers_products.product_id',
//         //     'productions.id')

//         // ->join('clients', 
//         //     'transfers_products.client_id', 
//         //     'clients.id'
//         //     )

//         // ->where('transfers.id',$id)
//         // ->where('transfers_products.client_id',$client_id)

//         // ->select('transfers.*',
//         //         'transfers_products.product_cost',
//         //         'transfers_products.product_price',
//         //         'transfers_products.product_quantity',
//         //         'productions.product_size',)

//         // ->sum(DB::raw('product_price * product_quantity * product_size'));


//         }


// public function index()
// {
//     return view('autocomplete');
// }

// public function autocompleteSearch(Request $request)
// {
//       $query = $request->get('query');
//       $filterResult = Clients::where('client_store', 'LIKE', '%'. $query. '%')->get();
//       return response()->json($filterResult);
// } 



public function product()
    {
        // $data['productions'] = Productions::get(["product_name","id"]);
        // return view('admin.body.search',$data);

        $productions = DB::table('productions')
            ->get();
        
        return view('admin.body.search', compact('productions'));
    }
    public function productCost(Request $request)
    {
        // $data['productions_prices'] = ProductionsPrices::where("product_id",$request->product_id)
        //             ->get(["product_cost","id"]);
        // return response()->json($data);

        $costs = DB::table('productions_prices')
            ->where('product_id', $request->product_id)
            ->get();
        
        if (count($costs) > 0) {
            return response()->json($costs);
        }

    }
    public function productPrice(Request $request)
    {
        // $data['productions_prices'] = ProductionsPrices::where("product_id",$request->product_id)
        //             ->get(["product_price","id"]);
        // return response()->json($data);

        $prices = DB::table('productions_prices')
        ->where('product_id', $request->product_cost)
        ->get();
    
    if (count($prices) > 0) {
        return response()->json($prices);
    }
    }







}
