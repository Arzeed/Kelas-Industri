<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\UserRepository;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    use ResponseApi;
    public function index()
    {
        $users = User::latest()->get();
        return $this->requestSuccessData('Success!', $users);
    }
    public function show(User $user)
    {
        return $this->requestSuccessData('Success!', $user);
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        if ($validation->fails()) {
            return $this->badRequest('Failed!', $validation->errors());
        }
        $input = $request->only('name', 'password', 'email');
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return $this->requestSuccessData('Success create user!', $user, 201);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return $this->requestSuccess('Success delete data');
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'min:8',
            'email' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->badRequest('Failed!', $validation->errors());
        }
        $input = $request->only('name', 'password', 'email');
        if ($input['password']) {
            $input['password'] = bcrypt($input['password']);
        }
        $user = User::find($id);
        if (!$user) {
            return $this->requestNotFound("Not Found!");
        }
        try {
            $user->update($input);
            return $this->requestSuccessData('Success updated user!', $user);
        } catch (\Throwable $th) {
            return $this->badRequest('Failed!', $th);
        }
    }
}
