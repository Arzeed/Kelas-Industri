<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class UserControllerQueryBuilder extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'DESC')->get();
        return view('admin.query-builder.users', [
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.query-builder.create-users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->only('name', 'email', 'password');
        $input['password'] = bcrypt($input['password']);
        DB::table('users')->insert($input);
        return redirect()->route('query-builder.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.query-builder.edit-users', [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->only('name', 'email');
        DB::table('users')->where('id', $id)->update($input);
        return redirect()->route('query-builder.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->delete($id);
        return redirect()->route('query-builder.index');
    }
}
