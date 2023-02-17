<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductionsController;
use App\Http\Controllers\RefundsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\TransfersController;
use App\Http\Controllers\TransfersProductsController;
use App\Http\Controllers\UserController;
use App\Models\Productions;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminsController::class, 'AdminProfile'])
    ->name('admin.profile');
Route::get('/admin/profile/edit',[AdminsController::class, 'AdminProfileEdit'])
    ->name('admin.profile.edit');
Route::post('/admin/profile/save',[AdminsController::class, 'AdminProfileSave'])
    ->name('admin.profile.save');
Route::get('/admin/pass/view',[AdminsController::class, 'AdminPassView'])
    ->name('admin.pass.view');
Route::post('/admin/pass/update',[AdminsController::class, 'AdminPassUpdate'])
    ->name('admin.pass.update');




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('user.index');
Route::get('/user/logout',[UserController::class, 'UserLogout'])
    ->name('user.logout');
Route::get('/user/profile',[UserController::class, 'UserProfile'])
    ->name('user.profile');
Route::get('/user/profile/edit',[UserController::class, 'UserProfileEdit'])
    ->name('user.profile.edit');
Route::post('/user/profile/save',[UserController::class, 'UserProfileSave'])
    ->name('user.profile.save');
Route::get('/user/pass/view',[UserController::class, 'UserPassView'])
    ->name('user.pass.view');
Route::post('/user/pass/update',[UserController::class, 'UserPassUpdate'])
    ->name('user.pass.update');

// Productions
Route::get('/admin/productions',[ProductionsController::class, 'AdminProductions'])
    ->name('admin.productions');
Route::post('/admin/add/productions',[ProductionsController::class, 'AddProductions'])
    ->name('add.productions');
Route::get('/admin/delete/productions/{id}',[ProductionsController::class, 'DeleteProductions'])
    ->name('delete.productions');
Route::get('/admin/edit/productions/{id}',[ProductionsController::class, 'EditProductions'])
    ->name('edit.productions');
Route::post('/admin/update/productions/{id}',[ProductionsController::class, 'UpdateProductions'])
    ->name('update.productions');
Route::get('/active/productions/{id}',[ProductionsController::class, 'ActiveProductions'])
    ->name('active.productions');
Route::get('/deactive/productions/{id}',[ProductionsController::class, 'DeactiveProductions'])
    ->name('deactive.productions');

// Productions Price
Route::get('/admin/productions/prices',[ProductionsController::class, 'AdminProductionsPrices'])
    ->name('admin.productions.prices');
Route::post('/admin/add/productions/prices',[ProductionsController::class, 'AddProductionsPrices'])
    ->name('add.productions.prices');
Route::get('/admin/delete/productions/prices/{id}',[ProductionsController::class, 'DeleteProductionsPrices'])
    ->name('delete.productions.prices');
Route::get('/active/productions/prices/{id}',[ProductionsController::class, 'ActiveProductionsPrices'])
    ->name('active.productions.prices');
Route::get('/deactive/productions/prices/{id}',[ProductionsController::class, 'DeactiveProductionsPrices'])
    ->name('deactive.productions.prices');


    // Sellers
Route::get('/admin/sellers',[SellersController::class, 'AdminSellers'])
        ->name('admin.sellers');
Route::post('/admin/add/sellers',[SellersController::class, 'AddSellers'])
        ->name('add.sellers');
Route::get('/admin/delete/sellers/{id}',[SellersController::class, 'DeleteSellers'])
        ->name('delete.sellers');
Route::get('/admin/edit/sellers/{id}',[SellersController::class, 'EditSellers'])
        ->name('edit.sellers');
Route::post('/admin/update/sellers/{id}',[SellersController::class, 'UpdateSellers'])
        ->name('update.sellers');
Route::get('/active/sellers/{id}',[SellersController::class, 'ActiveSellers'])
        ->name('active.sellers');
Route::get('/deactive/sellers/{id}',[SellersController::class, 'DeactiveSellers'])
        ->name('deactive.sellers');


    // Clients
Route::get('/admin/clients',[ClientsController::class, 'AdminClients'])
        ->name('admin.clients');
Route::post('/admin/add/clients',[ClientsController::class, 'AddClients'])
        ->name('add.clients');
Route::get('/admin/delete/clients/{id}',[ClientsController::class, 'DeleteClients'])
        ->name('delete.clients');
Route::get('/admin/edit/clients/{id}',[ClientsController::class, 'EditClients'])
        ->name('edit.clients');
Route::post('/admin/update/clients/{id}',[ClientsController::class, 'UpdateClients'])
        ->name('update.clients');
Route::get('/active/clients/{id}',[ClientsController::class, 'ActiveClients'])
        ->name('active.clients');
Route::get('/deactive/clients/{id}',[ClientsController::class, 'DeactiveClients'])
        ->name('deactive.clients');


    // Stocks
Route::get('/admin/stocks',[StocksController::class, 'AdminStocks'])
        ->name('admin.stocks');
Route::post('/admin/add/stocks',[StocksController::class, 'AddStocks'])
        ->name('add.stocks');
Route::get('/admin/delete/stocks/{id}',[StocksController::class, 'DeleteStocks'])
        ->name('delete.stocks');
Route::get('/admin/edit/stocks/{id}',[StocksController::class, 'EditStocks'])
        ->name('edit.stocks');
Route::post('/admin/update/stocks/{id}',[StocksController::class, 'UpdateStocks'])
        ->name('update.stocks');
Route::get('/get/productprice/{product_id}',[StocksController::class, 'StockProductPrice'])
        ->name('get.productprice');
Route::get('/get/productpricecost/{product_cost}',[StocksController::class, 'StockProductPriceCost'])
    ->name('get.productprice.cost');
    

        // Stocksviews
Route::get('/admin/stocksviews',[StocksController::class, 'AdminStocksViews'])
->name('admin.stocksviews');
Route::get('/admin/show/stocksproductslists/{id}',[StocksController::class, 'StocksProductsLists'])
        ->name('show.stocksproductslists');


// Route::get('/admin/stocksviews',[StocksController::class, 'AdminStocksViews'])
// ->name('admin.stocksviews');


    // Transfers
Route::get('/admin/transfers',[TransfersController::class, 'AdminTransfers'])
        ->name('admin.transfers');
Route::post('/admin/add/transfers',[TransfersController::class, 'AddTransfers'])
        ->name('add.transfers');
Route::get('/admin/delete/transfers/{id}',[TransfersController::class, 'DeleteTransfers'])
        ->name('delete.transfers');
Route::get('/admin/edit/transfers/{id}',[TransfersController::class, 'EditTransfers'])
        ->name('edit.transfers');
Route::post('/admin/update/transfers/{id}',[TransfersController::class, 'UpdateTransfers'])
        ->name('update.transfers');
Route::get('/admin/view/transfers/{id}',[TransfersProductsController::class, 'ViewTransfers'])
        ->name('view.transfers');


Route::get('/admin/backid/transfers/{id}',[TransfersProductsController::class, 'BackIdTransfers'])
        ->name('backid.transfers');
Route::get('/admin/backview/transfers/{id}',[TransfersProductsController::class, 'BackViewTransfers'])
        ->name('backview.transfers');
Route::get('/admin/backupdate/transfers/{id}',[TransfersProductsController::class, 'BackUpdateTransfers'])
        ->name('backupdate.transfers');


Route::get('/active/transfers/{id}',[TransfersController::class, 'ActiveTransfers'])
        ->name('active.transfers');
Route::get('/deactive/transfers/{id}',[TransfersController::class, 'DeactiveTransfers'])
        ->name('deactive.transfers');


// Transfers Products
Route::get('/admin/transfersproducts',[TransfersProductsController::class, 'AdminTransfersProducts'])
    ->name('admin.transfersproducts');
Route::post('/admin/add/transfersproducts',[TransfersProductsController::class, 'AddTransfersProducts'])
    ->name('add.transfersproducts');
Route::get('/admin/delete/transfersproducts/{id}',[TransfersProductsController::class, 'DeleteTransfersProducts'])
    ->name('delete.transfersproducts');
Route::get('/admin/edit/transfersproducts/{id}',[TransfersProductsController::class, 'EditTransfersProducts'])
    ->name('edit.transfersproducts');
Route::post('/admin/update/transfersproducts/{id}',[TransfersProductsController::class, 'UpdateTransfersProducts'])
    ->name('update.transfersproducts');

Route::get('/get/transfersproductsprice/{product_id}',[TransfersProductsController::class, 'TransfersProductPrice'])
    ->name('get.productprice');

Route::get('/admin/view/transfers/{id}/{client_id}',[TransfersProductsController::class, 'ClientsTransfers'])
    ->name('clients.transfers');



// Refund
Route::get('/admin/refunds',[RefundsController::class, 'AdminRefunds'])
    ->name('admin.refunds');
Route::post('/admin/add/refunds',[RefundsController::class, 'AddRefunds'])
    ->name('add.refunds');
Route::get('/admin/delete/refunds/{id}',[RefundsController::class, 'DeleteRefunds'])
    ->name('delete.refunds');
Route::get('/admin/edit/refunds/{id}',[RefundsController::class, 'EditRefunds'])
    ->name('edit.refunds');
Route::post('/admin/update/refunds/{id}',[RefundsController::class, 'UpdateRefunds'])
    ->name('update.refunds');

// Route::get('/search',[SearchController::class, 'Search'])
//     ->name('search');

    //work
// Route::get('autocomplete', [SearchController::class, 'index']);

// Route::get('autocomplete-search', [SearchController::class, 'autocompleteSearch'])
//     ->name('autocomplete');

Route::get('search', [SearchController::class, 'product'])->name('dropdownView');
Route::get('product-cost', [SearchController::class, 'productCost'])->name('getStates');
Route::get('product-price', [SearchController::class, 'productPrice'])->name('getCities');

// Route::get('dropdown', [DropdownController::class, 'view'])->name('dropdownView');
// Route::get('get-states', [DropdownController::class, 'getStates'])->name('getStates');
// Route::get('get-cities', [DropdownController::class, 'getCities'])->name('getCities');

// Route::get('/autocomplete', [SearchController::class, 'autocomplete']);
// Route::get('/admin/refundsviews',[RefundsController::class, 'AdminRefundsViews'])
// ->name('admin.refundsviews');

// Route::get('/get/productprice/{product_id}',[StocksController::class, 'StockProductPrice'])
// ->name('get.productprice');
// Route::get('/get/productpricecost/{product_cost}',[StocksController::class, 'StockProductPriceCost'])
// ->name('get.productprice.cost');