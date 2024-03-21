<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserControllerEloquent extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct(private UserService $userService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.eloquent.users', [
            "users" => $this->userService->getAllUsers()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.eloquent.create-users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->only('name', 'email', 'password');
        $input['password'] = bcrypt($input['password']);
        $this->userService->createUser($input);
        return redirect()->route('eloquent.index');
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
        return view('admin.eloquent.edit-users', [
            "user" => $this->userService->getOneUser($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->only('name', 'email');
        $this->userService->updateUser($input, $id);
        return redirect()->route('eloquent.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('eloquent.index');
    }
}
