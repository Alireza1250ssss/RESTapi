<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'required'
        ]);
        if($validator->fails())
            abort(400,'not validated');


        $user = User::create($request->all());

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $user = User::withTrashed()->findOrFail($user);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->update($request->all());

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // $user->forceDelete();
        // $user->restore();
        return response()->json(" id $user->id deleted successfully");
    }

    /**
     * @param User $user
     */
    public function forceDelete( $user)
    {
        $user = User::withTrashed()->find($user);
        $user->forceDelete();
        return response()->json("force deleted successfully  id {$user->id}");
    }

    public function restore(User $user)
    {
        $user->restore();
        return response()->json("user {$user->id} restored successfully");
    }
}
