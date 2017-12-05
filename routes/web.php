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

Route::get('/home', function () {
    return view('home');
});

Route::get('/attributesetsdetails', function () {
    return view('attributesetsdetails');
});

Route::get('/allorders', function () {
    return view('allorders');
});

Route::get('/specificorder', function () {
    return view('specificorder');
});

Route::get('/testajax', function (){
    return view('test');
});
Route::get('ID/{id}',function($id){
    echo 'ID: '.$id;
});

Route::get('/user/{name?}',function($name = 'Virat'){
    echo "Name: ".$name;
});

Route::get('role',[
    'middleware' => 'Role:editor',
    'uses' => 'TestController@index',
]);

Route::get('terminate',[
    'middleware' => 'terminate',
    'uses' => 'ABCController@index',
]);

Route::get('profile',[
    'middleware'=> 'auth',
    'uses'=>'UserController@showProfile'
]);

Route::get('/usercontroller/path',[
    'middleware' => 'First',
    'uses' => 'UserController@showPath'
]);

Route::resource('my','MyController');

Route::get('/register',function(){
    return view('register');
});
Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));
/*
Route::get('/editwarehouse/{id}',function(){
    return view('updatewarehouse');
});
*/
//Route::post('/user/updatewarehouse/',array('uses'=>'UserRegistration@postRegister'));

#edit function editWarehousesData
//Route::put('/user/warehouses/{id}', array('uses'=>'UserRegistration@editWarehousesData'));
Route::get('/test','ApiController@test');


Route::get('/sellers','GuzzleController@getSellersData'); #1. Get Seller Information:
Route::get('/categories','GuzzleController@getCategoriesData'); #2.  Get Categories
Route::get('/attributesets','GuzzleController@getAttributesetsData'); #3. Get Attribute Sets
Route::get('/getattributesets','GuzzleController@getAttributesetsData'); #4. Get Attribute set details
Route::post('/attributesets/{id}','GuzzleController@getAttributesetsDetailsData'); #4. Get Attribute set details
Route::get('/warehouses','GuzzleController@getWarehousesData');#5. Get Warehouses
#6. Create Products

#view warehouse to fill the form to edit
Route::get('/view/product/', function (){
    return view('product');
});
Route::put('/products','GuzzleController@editProductsData'); #7. Update Product Quantity and Price

Route::get('/orders','GuzzleController@getOrdersData'); #8. Get Orders History

#view warehouse to fill the form to edit
#was working
Route::get('/view/oldwarehouses/', function (){
    $id=$_GET['id'];
    return view('warehouse')->with('id', $id);
});

// Edit Warehouses
Route::get('/view/warehouses/',function (){
    return view('warehouses');
});

Route::put('/warehouses/','GuzzleController@editWarehousesData'); #9. Update Warehouses
//Route::put('/warehouses/{id}','GuzzleController@editWarehousesData3'); #9. Update Warehouses

//getlistofwarehouses
//Route::get('/getlistofwarehouses/',function (){
//    return view('getlistofwarehouses');
//});
Route::get('/getlistofwarehouses','GuzzleController@getWarehousesData'); #10. Get products of the seller


Route::get('/products/{warehouseId}','GuzzleController@getProductsData'); #10. Get products of the seller
Route::get('/orders/{orderId}','GuzzleController@getSpecificOrderData'); #11. Get a specific order
#12. Save Customer Third-party ID
Route::get('/countries','GuzzleController@getCountriesData'); #13. Get countries
Route::get('/countries/{countryID}/regions','GuzzleController@getRegionsData'); #14. Get Regions
Route::get('/countries/{countryID}/regions/{regionID}/cities','GuzzleController@getCitiesData'); #15. Get Cities


Route::post('{submit}/getAttributesetsDetailsData/{id}', [
    'as'   => 'getAttributesetsDetailsData',
    'uses' => 'GuzzleController@getAttributesetsDetailsData',
]);

Route::get('/getlistofattributesid','GuzzleController@getAttributesetsDetailsData');


Route::post('{submit}/getProductsData/{id}', [
    'as'   => 'getProductsData',
    'uses' => 'GuzzleController@getProductsData',
]);

//---------------Jquery-----------------------
Route::get('/jquery','GuzzleController@jquery');
Route::post('/postJquery','GuzzleController@postJquery');
Route::post('/postJquery1','GuzzleController@editWarehousesData1');





