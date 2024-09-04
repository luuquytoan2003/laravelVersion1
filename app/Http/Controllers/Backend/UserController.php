<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ProvinceRepository;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository
    ) {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
    }
    public function index()
    {
        $users = $this->userService->paginate();
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
            'seo' => config('apps.user.create')
        ];
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact([
            'provinces',
            'config',
            'template'
        ]));
    }
}
