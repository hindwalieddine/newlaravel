<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Validator;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

    /**

     * Display a listing of the myform.

     *

     * @return \Illuminate\Http\Response

     */

    public function myform()

    {

        return view('myform');

    }


    /**

     * Display a listing of the myformPost.

     *

     * @return \Illuminate\Http\Response

     */

    public function myformPost(Request $request)

    {


        $validator = Validator::make($request->all(), [

            'first_name' => 'required',

            'last_name' => 'required',

            'email' => 'required|email',

            'address' => 'required',

        ]);


        if ($validator->passes()) {


            return response()->json(['success'=>'Added new records.']);

        }


        return response()->json(['error'=>$validator->errors()->all()]);

    }

}
