<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postRegister(Request $request){
        //Retrieve the name input field
        $name = $request->input('name');
        echo 'Name: '.$name;
        echo '<br>';

        //Retrieve the username input field
        $username = $request->username;
        echo 'Username: '.$username;
        echo '<br>';

        //Retrieve the password input field
        $password = $request->password;
        echo 'Password: '.$password;

        //return view('registerData')->with(['name'=>$name,'username'=>$username, 'password'=>$password]);


    }

    public function editWarehousesData(Request $request){
        //Retrieve the warehouse name input field
        $warehouse_name = $request->warehouse_name;
        echo 'Warehouse Name: '.$warehouse_name;
        echo '<br>';

        //Retrieve the manager name input field
        $manager_name = $request->manager_name;
        echo 'Manager Name: '.$manager_name;
        echo '<br>';

        //Retrieve the mobile input field
        $mobile = $request->input('mobile');
        echo 'Mobile: '.$mobile;
        echo '<br>';

        //Retrieve the email input field
        $email = $request->input('email');
        echo 'Email: '.$email;
        echo '<br>';

        //Retrieve the code input field
        $code = $request->input('code');
        echo 'Code: '.$code;
        echo '<br>';

        //return redirect('/warehouses/{id}');

        //return view('registerData')->with(['name'=>$name,'username'=>$username, 'password'=>$password]);
    }
}
