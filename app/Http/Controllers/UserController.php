<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return User list.
     *
     * @return Illuminate\Http\Response
     */
    public function index(){
        
        $Users = User::All();

        return $this->validResponse($Users);
    }

    /**
     * Create an instance of user.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::Create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED); 
    }

    /**
     * Return a specific user.
     *
     * @return Illuminate\Http\Response
     */
    public function show($user){

        $user = User::findOrFail($user);

        return $this->validResponse($user);
    }

    /**
     * Update the information of an user.
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $user){

        $rules = [
            'name' => 'max:255',
            'email' => 'email|unique:users,email,'.$user,
            'password' => 'min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($user);

        $user->fill($request->all());

        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }

        if($user->isClean()){
            return $this->errorResponse('Debe realizar al menos un cambio', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    /** 
     * Remove an existing user.
     *
     * @return Illuminate\Http\Response
     */
    public function destroy( $user){

        $user = User::findOrFail($user);

        $user->delete();

        return $this->validResponse($user);
    }

    /** 
     * Identifies the current user.
     *
     * @return Illuminate\Http\Response
     */
    public function me(Request $request){
        return $this->validResponse($request->user());
    }
}
