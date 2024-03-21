<?php


namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $repository;
    /**
     * Class constructor.
     */
    public function __construct(UserRepository $userRepository){
        $this->repository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->repository->getAllUsers();
    }
    public function getOneUser($id)
    {
        return $this->repository->getOneUser($id);
    }
    public function createUser($data)
    {
        return $this->repository->createUser($data);
    }
    public function updateUser($data, $id)
    {
        return $this->repository->updateUser($data, $id);
    }
    public function deleteUser($id)
    {
        return $this->repository->deleteUser($id);
    }
}