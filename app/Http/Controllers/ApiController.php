<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    //
    public function test()
    {
        //
        echo "test";
        /*
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://localhost/hicart/api/rest/warehouses/', ['auth' =>  ['user', 'pass']]);
        echo $res->getStatusCode(); // 200
        echo $res->getBody(); // { //"type": "User", ....
        */

        //

        //$response = Request::create('http://localhost/hicart/api/rest/categories/');

        $client = new Client(); dd($client);
        $res = $client->request('GET', 'http://localhost/hicart/api/rest/categories/');
        echo $res->getStatusCode();
// 200
        echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
        echo $res->getBody();
// '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();

        /*
        $client = new Client();
        //dd($client);
        echo csrf_token();
        $res = $client->request('GET', 'http://localhost/hicart/api/rest/categories/', [
            'auth' => ['51c9894f766b68c5a93963ec486f0515', '7763de12b0d601e1297300298d68258c']
        ]);//echo "Ttttt";

        echo $res->getStatusCode();
// "200"
        echo $res->getHeader('content-type');
// 'application/json; charset=utf8'
        echo $res->getBody();
// {"type":"User"...'

// Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://localhost/hicart/api/rest/warehouses/');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
        */
    }
}
