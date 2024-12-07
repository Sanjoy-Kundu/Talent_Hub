<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display Showing registration Page
     */
    public function registration_page(){
        try{
            return view('pages.auth.registrationPage');
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" => $ex->getMessage()]);
        }
    }


    /**
     * Display Showing Login Page
     */
    public function login_page(){
        try{
            return view('pages.auth.loginPage');
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" => $ex->getMessage()]);
        }
    }






    /**
     * Show the form login a new odience
     */

     public function login(Request $request)
     {
         try {
             $validator = Validator::make($request->all(), [
                 'email_or_mobile' => 'required|max:225',
                 'password' => 'required|max:225',
             ], [
                 'email_or_phone.required' => 'Email or password is required',
                 'password.required' => 'Password field is required'
             ]);
     
             if ($validator->fails()) {
                 return response()->json([
                     "status" => "error",
                     "errors" => $validator->errors()
                 ]);
             }
     
             $email_or_mobile = Str::lower(trim($request->input('email_or_mobile')));
             $password = trim($request->input('password'));
     
             // Find user by email or mobile
             $user = User::where('email', $email_or_mobile)->orWhere('mobile', $email_or_mobile)->first();
     
             if (!$user) {
                 return response()->json([
                     "status" => "error",
                     "message" => "Your email or mobile does not exists."
                 ]);
             }
     
             // Check password
             if (!Hash::check($password, $user->password)) {
                 return response()->json([
                     "status" => "error",
                     "message" => "Password is incorrect."
                 ]); // Use HTTP status 401 for unauthorized
             }
     
             // Create token
             $token = $user->createToken('authToken')->plainTextToken;
     
             return response()->json([
                 "status" => "success",
                 "message" => "User Login Successfully.",
                 "token" => $token
             ], 200);
     
         } catch (\Exception $ex) {
            return response()->json(["status" => "fail", "message" => $ex->getMessage()]);
         }
     }
     




    /**
     * Show the form for registration a new odience.
     */
    public function registration(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'mobile' => 'required|unique:users|max:255',
                'password' => 'required|max:255',
            ],[
                'name.required' => 'Name field is required',
                'email.required' => 'Email fiend is requried',
                'email.unique' => 'Email alredy taken',
                'mobile.requried' => 'mobile field is required',
                'password.requried' => 'Password filed is requried',
            ]);



        if ($validator->fails()) {
            return response()->json(["status" => "error", "errors" => $validator->errors()]);
        }



            $name = Str::upper(trim($request->input('name')));
            $email = Str::lower(trim($request->input('email')));
            $mobile = trim($request->input('mobile'));
            $password = Hash::make(trim($request->input('password')));
           

            User::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $password
            ]);
          return response()->json(["status" => "success", "message" => "User Registration Successfully."]);
         }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" => $ex->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
