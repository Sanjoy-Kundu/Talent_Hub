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
