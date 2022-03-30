<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('is_admin')) {
            $users = User::with('loan')->where('id', '!=', Auth::id() )->paginate(10);

            return view('users.index', compact('users'));
        }else{
            return redirect()->route('users.show',Auth::id());
        }
    }

    public function toggle_user_status(Request $request){
        $request->validate([
            'user_id' => 'required',
            'user_status' => 'required'
        ]);
        if (Gate::allows('is_admin')) {
            $user = User::findOrFail($request->input('user_id'));
            $user->user_status = $request->input('user_status');
            $user->save();
        }else{
            abort(403);
        }
        return redirect()->route('users.show', $user->id)->with('success', 'User status updated');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //check if requested user is same as auth user
        if ($user->id != Auth::id()){
            //if requested user is not auth:user than check if they are admin
            if (Gate::denies('is_admin')) {
                //if they are not admin change requested user to auth user
                $user = Auth::user();
            }
        }

        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
