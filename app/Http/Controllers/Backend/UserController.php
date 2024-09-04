<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
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
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ],
            'seo' => config('apps.user.create')
        ];
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact([
            'config',
            'template'
        ]));
    }
}
