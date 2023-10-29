<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\Asset;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $asset = new Asset();
        $data['title'] = 'Dashboard';
        $data['total_users'] = $user->countAll();
        $data['total_assets'] = $asset->countAll();

        return view('dashboard/index', $data);
    }
    
    public function login()
    {
        return view('Auth/login');
    }
}
