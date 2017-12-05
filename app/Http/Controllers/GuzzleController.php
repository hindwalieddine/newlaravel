<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use App\User;
//use GuzzleHttp\Psr7\Request;
//use OAuth;
//use Request;

class GuzzleController extends Controller
{
    #1. Get Seller Information:
    public function getSellersData(){
    $stack = HandlerStack::create();

    $middleware = new Oauth1([
        'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
        'consumer_secret' => '7763de12b0d601e1297300298d68258c',
        'token'           => '9264797bb29fc621757239546e754bb8',
        'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
    ]);
    $stack->push($middleware);

    $client = new Client([
        'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
        //'base_uri' => 'http://pixel38.hicart.com/',
        'base_uri' => 'http://pixel38.hicart.com/api/rest/',
        'handler' => $stack,
        'auth' => 'oauth'
    ]);
    //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
    $res = $client->get('sellers/', ['auth' => 'oauth']);

    $data =  $res->getBody();
    //$data = json_decode($data);
    return view('sellers')->with('data',$data);
    //dd($data);
}

    #2.  Get Categories
    public function getCategoriesData(){
        $client = new Client([
            'headers' => ['content-type' =>'application/json' , 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET','http://pixel38.hicart.com/api/rest/categories/');
        $data =  $response->getBody();

        //$data = json_decode($data);
        return view('categories')->with('data',$data);
        //dd($data);
    }

    #3. Get Attribute Sets
    public function getAttributesetsData(){
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
        $res = $client->get('attributesets/', ['auth' => 'oauth']);

        $data =  $res->getBody();
        //$data = json_decode($data);
        $url=$_SERVER['REQUEST_URI'];
        $id = substr($url, strrpos($url, '/') + 1);
        if($id=="attributesets"){ #If we click on Get Attribute Set we will get the view with all the attribute sets
            return view('attributesets')->with('data',$data);
        }
        else if($id=="getattributesets"){ #Else if we click on the Get attribute details we will be redirected to a view that must contains an input select box with all the Attribute set to select one from
            return view('attributesetsdetails')->with('data',$data);
        }

        //dd($data);
    }

    #4. Get Attribute set details
    # example /attributesets/96
    public function getAttributesetsDetailsData($id){// dd($id);
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
        $res = $client->get('attributesets/'.$id, ['auth' => 'oauth']);

        $data =  $res->getBody();

        //$data = json_decode($data);
        return view('attributesetsdetails1')->with('data',$data);
        //dd($data);
    }

    #5. Get Warehouses
    public function getWarehousesData(){
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
        $res = $client->get('warehouses/', ['auth' => 'oauth']);

        $data =  $res->getBody();
        //$data = json_decode($data);
        //return view("allwarehouses")->with('data',$data);
        $url=$_SERVER['REQUEST_URI'];
        $id = substr($url, strrpos($url, '/') + 1);
        if($id=="warehouses"){ #If we click on Get Attribute Set we will get the view with all the attribute sets
            return view("allwarehouses")->with('data',$data);
        }
        else if($id=="getlistofwarehouses"){ #Else if we click on the Get attribute details we will be redirected to a view that must contains an input select box with all the Attribute set to select one from
            return view('getlistofwarehouses')->with('data',$data);
        }
        //dd($data);
    }

    #6. Create Products
    public function createProductsData(Request $request){ //dd($request);
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);

        $body = $client->post('products/', [
            'json' => [
                "warehouse_name" => $request->input('warehouse_name'),
                "manager_name" => $request->input('manager_name'),
                "mobile" => $request->input('mobile'),
                "email" => $request->input('email'),
                "code"=>  $request->input('code')
            ],
            ['auth' => 'oauth']
        ]);
        //dd($body);
        //dd($request);
        //$res = $request->json();

        $data =  $body->getBody();
        $data = json_decode($data);
        if ($body->getBody()) {dd( 'data has been updated successfuly');}
        //dd($data);
    }
    #7. Update Product Quantity and Price
    public function editProductsData(Request $request){ dd($request);
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);

        $body = $client->put('products/', [
            'json' => [
                "warehouse_id" => $request->input('warehouse_id'),
                "sku" => $request->input('sku'),
                "price" => $request->input('price'),
                "qty" => $request->input('qty'),
                "price_after_discount"=>  $request->input('price_after_discount')
            ],
            ['auth' => 'oauth']
        ]);
        //dd($body);
        //dd($request);
        //$res = $request->json();

        $data =  $body->getBody();
        $data = json_decode($data);
        if ($body->getBody()) {dd( 'data has been updated successfuly');}
        //dd($data);
    }

    #8. Get Orders History
    public function getOrdersData(){
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
        $res = $client->get('orders/', ['auth' => 'oauth']);

        $data =  $res->getBody();
        //$data = json_decode($data);
        return view('allorders')->with('data',$data);
        //dd($data);
    }



    #9. Update Warehouses
    public function editWarehousesData(Request $request){ //dd($request);
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);

        $body = $client->put('warehouses/'.$request->input('warehouse_id'), [
            'json' => [
                "warehouse_name" => $request->input('warehouse_name'),
                "manager_name" => $request->input('manager_name'),
                "mobile" => $request->input('mobile'),
                "email" => $request->input('email'),
                "code"=>  $request->input('code')
            ],
            ['auth' => 'oauth']
        ]);
        //dd($body);
        //dd($request);
        //$res = $request->json();

        $data =  $body->getBody();
        $data = json_decode($data);
        $responseOK="data has been updated successfuly";
        if ($body->getBody()) {

            return view("warehouses")->with('response',$responseOK);
            //dd( 'data has been updated successfuly');
        }
        //dd($data);
    }
    #10. Get products of the seller
public function getProductsData($warehouseId){ //dd($warehouseId);
    $stack = HandlerStack::create();

    $middleware = new Oauth1([
        'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
        'consumer_secret' => '7763de12b0d601e1297300298d68258c',
        'token'           => '9264797bb29fc621757239546e754bb8',
        'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
    ]);
    $stack->push($middleware);

    $client = new Client([
        'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
        //'base_uri' => 'http://pixel38.hicart.com/',
        'base_uri' => 'http://pixel38.hicart.com/api/rest/',
        'handler' => $stack,
        'auth' => 'oauth'
    ]);
    //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
    $res = $client->get('products/?warehouse_id='.$warehouseId, ['auth' => 'oauth']);

    $data =  $res->getBody();
    $data = json_decode($data);
    dd($data);
}

    #11. Get a specific order
    public function getSpecificOrderData($orderId){ //dd($orderId);
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => '51c9894f766b68c5a93963ec486f0515',
            'consumer_secret' => '7763de12b0d601e1297300298d68258c',
            'token'           => '9264797bb29fc621757239546e754bb8',
            'token_secret'    => '247d819aa00631b0d0a6cffa3a18c0f5'
        ]);
        $stack->push($middleware);

        $client = new Client([
            'headers' => ['Content-Type' =>'application/json' , 'Accept' => 'application/json'],
            //'base_uri' => 'http://pixel38.hicart.com/',
            'base_uri' => 'http://pixel38.hicart.com/api/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
        //dd($middleware);
// Set the "auth" request option to "oauth" to sign using oauth
        $res = $client->get('orders/'.$orderId, ['auth' => 'oauth']);

        $data =  $res->getBody();
        $data = json_decode($data);
        dd($data);
    }
    #12. Save Customer Third-party ID
    #13. Get countries
    public function getCountriesData(){
        $client = new Client([
            'headers' => ['content-type' =>'application/json' , 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET','http://pixel38.hicart.com/api/rest/countries/');
        $data =  $response->getBody();

        //$data = json_decode($data);
        return view("countries")->with("data",$data);
        //dd($data);
    }
    #14. Get Regions
    public function getRegionsData($countryID){ //dd($countryID);
        $client = new Client([
            'headers' => ['content-type' =>'application/json' , 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET','http://localhost/hicart/api/rest/countries/'.$countryID.'/regions');
        $data =  $response->getBody();

        $data = json_decode($data);
        dd($data);

    }
    #15. Get Cities
    public function getCitiesData($countryID,$regionID){ //echo $countryID;dd($regionID);
        $client = new Client([
            'headers' => ['content-type' =>'application/json' , 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET','http://localhost/hicart/api/rest/countries/'.$countryID.'/regions/'.$regionID.'/cities');
        $data =  $response->getBody();

        $data = json_decode($data);
        dd($data);

    }

public function jquery(){
        return view('jquery.jquery');
}
public function  postJquery(Request $r){ return $r;
    $data = json_decode($r->getContent(),true);
    //return $data;
    /*Update warehouse*/
   // $res= expload("&", $data); //split the data
    //return $res;



    //$this->editWarehousesData($data);
    //return $data['warehouse_id'];
    return json_encode($data);

    if($r->ajax()){
        //dump($r->all());
        return response($r->all());
    }
}
//end of class

}
