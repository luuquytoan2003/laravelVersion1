<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    public function paginate()
    {
        $users = $this->userRepository->paginate(15);
        return $users;
    }
    public function create($request)
    {

        try {
            DB::transaction(function () use ($request) {
                $payload = $request->except(['_token', 're_password']);
                $dateFormat = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
                $payload['birthday'] = $dateFormat->format('Y-m-d H:i:s');
                $payload['password'] = Hash::make($payload['password']);
                $user = $this->userRepository->create($payload);
            }, 3);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            die();
            return false;
        }
    }
}
