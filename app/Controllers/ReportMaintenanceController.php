<?php

namespace App\Controllers;
use App\Models\Maintenance;
use App\Controllers\BaseController;

class ReportMaintenanceController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Report Maintenance';
        return view('report-maintenance/index', $data);
    }
}
