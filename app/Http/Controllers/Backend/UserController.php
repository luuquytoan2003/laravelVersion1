<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\ProvinceRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;
    protected $provinceRepository;
    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
        ProvinceRepository $provinceRepository
    ) {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->provinceRepository = $provinceRepository;
    }
    public function index(Request $request)
    {
        $users = $this->userService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ],
            'seo' => config('apps.user.index')
        ];
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact([
            'users',
            'config',
            'template',
        ]));
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/libary/location.js'
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'seo' => config('apps.user.create'),
            'method' => 'create'
        ];
        $template = 'backend.user.store';
        return view('backend.dashboard.layout', compact([
            'provinces',
            'config',
            'template'
        ]));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            toastr()->success('Thêm mới bản ghi thành công');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Thêm mới bản ghi thất bại');
            return redirect()->route('user.create');
        }
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $provinces = $this->provinceRepository->all();
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/libary/location.js'
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'seo' => config('apps.user.create'),
            'method' => 'edit'
        ];
        $template = 'backend.user.store';
        return view('backend.dashboard.layout', compact([
            'provinces',
            'config',
            'template',
            'user'
        ]));
    }
    public function update(UpdateUserRequest $request, $id)
    {
        if ($this->userService->update($request, $id)) {
            toastr()->success('Cập nhật bản ghi thành công');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Cập nhật bản ghi thất bại');
            return redirect()->route('user.edit');
        }
    }

    public function destroy($id)
    {
        if ($this->userService->delete($id)) {
            toastr()->success('Xóa bản ghi thành công');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Xóa bản ghi thất bại');
            return redirect()->route('user.edit');
        }
    }
}
