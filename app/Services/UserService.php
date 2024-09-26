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
    public function paginate($request)
    {
        $condition = [
            'keyword' => $request->keyword,
            'perpage' => $request->perpage
        ];
        $query = $this->userRepository->where(function ($query) use ($condition) {
            $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%');
        });

        return $query->paginate($condition['perpage'], ['name', 'email', 'phone', 'address', 'publish', 'id'])
            ->withQueryString()
            ->withPath(env('APP_URL' . 'user/index'));
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

    public function update($request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $payload = $request->except(['_token']);
                $dateFormat = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
                $payload['birthday'] = $dateFormat->format('Y-m-d H:i:s');
                $user = $this->userRepository->update($payload, $id);
            }, 3);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            die();
            return false;
        }
    }
    public function delete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $user = $this->userRepository->delete($id);
            }, 3);
            return true;
        } catch (\Exception $th) {
            echo $th->getMessage();
            die();
            return false;
        }
    }
}
