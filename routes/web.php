 <?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/bill', 'BillItemsController@bill');
//Route::post('/bills', 'BillItemsController@store');
//Route::post('/bills', 'BillItemsController@store');


Route::resource("bill", "BillsController");
Route::resource("customer", "CustomerController");
Route::resource("bill-items", "BillItemsController");
Route::resource("vendor", "VendorController");
Route::resource("items", "ItemsController");
Route::get('search-ajax','ItemsController@search_ajax');
Route::resource("stocks", "StocksController");


Route::get("bill/items/{bill}", "BillItemsController@create");
Route::get("bill/print/{bills}", "BillsController@print_output");
Route::get("bill/items-all/{bills}", "BillItemsController@bill_items");
Route::post('bill-items-all', 'BillItemsController@storeall');


 Route::get('csv/{table}', "CRUDController@csv");
 Route::get('form', function () {
     return view('form');
 });
