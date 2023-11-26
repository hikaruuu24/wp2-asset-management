<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\Asset;
use App\Models\Maintenance;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $asset = new Asset();
        $maintenance = new Maintenance();
        $data['title'] = 'Dashboard';
        $data['total_users'] = $user->countAll();
        $data['total_assets'] = $asset->countAll();
        $data['total_maintenances'] = $maintenance->countAll();

        $data['maintenances'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name, role.name as role_name')
        ->join('asset', 'asset.id = maintenance.asset_id')
        ->join('users', 'users.id = maintenance.user_id')
        ->join('role', 'role.id = users.role_id')
        ->where('maintenance.status', 'open')
        ->findAll();
        return view('dashboard/index', $data);
    }
    
    public function login()
    {
        return view('Auth/login');
    }
}
