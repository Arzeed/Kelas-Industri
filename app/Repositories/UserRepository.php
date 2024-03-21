<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::orderBy('id', 'DESC')->get();
    }
    public function getOneUser($id)
    {
        return User::where('id', $id)->first();
    }
    public function createUser($data)
    {
        return User::create($data);
    }
    public function updateUser($data, $id)
    {
        return User::where('id', $id)->update($data);
    }
    public function deleteUser($id)
    {
        User::destroy($id);
    }
}