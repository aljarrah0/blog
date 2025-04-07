<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'index';
        $users = User::all()->sortDesc();

        return view('user::index', ['users' => $users, 'title' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'create user';
        return view('user::create', ['title' => $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // get the data
        // $data = $_user;

        // validation the data
        request()->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'min:4', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'max:255'],
        ]);

        // store data in database
        // case 1
//        $user = new user();
//        $user->title = request()->title;
//        $user->description = request()->description;
//        $user->save();
        // case 2
        user::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => request()->password
        ]);

        // redirection to users index
        return to_route('users.index')->withSuccess('User created successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show(user $user)
    {
        $pageTitle = 'show';

//        $user= user::find($userId);
//        $user= user::findOrFail($userId);
//        if(is_null($user)){
//            abort(404);
//        }

        return view('user::show', ['user' => $user, 'title' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        $pageTitle = 'create user';
        $users = User::all();

        return view('user::edit', ['title' => $pageTitle, 'users' => $users, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(user $user)
    {
        // get the data
        // $data = $_user;
        $data = request()->all();

        // validation the data
        request()->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id, 'min:4', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'max:255'],
        ]);
        // update data in database
        // case 1
//        $user->title = request()->title;
//        $user->description = request()->description;
//        $user->save();

        // case 2
        $user->update([
            'name' => request()->name,
            'email' => request()->email,
            'password' => request()->password
        ]);

        // redirection to user show
        return to_route('users.show', $user)->withSuccess('User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(user $user)
    {
        // Remove the user from the database
        try {
            $user->delete();
        } catch (\Exception  $e) {
            Log::error('User not deleted: ' . $e->getMessage());
            return to_route('users.index')->withError('User not deleted');
        }
//        $user->delete();
        // Redirect to the users index
        return to_route('users.index')->withSuccess('User deleted successfully');
    }
}
