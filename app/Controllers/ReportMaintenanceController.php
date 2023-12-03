<?php

namespace App\Controllers;
use App\Models\Maintenance;
use App\Models\MaintenanceTask;
use App\Models\Asset;
use Myth\Auth\Models\UserModel;
// use dompdf
use Dompdf\Dompdf;
use App\Controllers\BaseController;

class ReportMaintenanceController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Report Maintenance';
        // ex: 2021-08
        if ($this->request->getGet('month')) {
            $month = $this->request->getGet('month');
        } else {
            $month = date('Y-m');
        }
        $startOfMonth = date('Y-m-01 00:00:00', strtotime($month));
        $endOfMonth = date('Y-m-t 23:59:59', strtotime($month));
        $maintenance = new Maintenance();
        if ($month) {
            $data['maintenances'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name')
            ->join('asset', 'asset.id = maintenance.asset_id')
            ->join('users', 'users.id = maintenance.user_id')
            ->where('maintenance.status', 'complete')
            ->where('completion_date >=', $startOfMonth)
            ->where('completion_date <=', $endOfMonth)
            ->orderBy('maintenance.timestamp', 'DESC')  // Specify the table alias for "timestamp"
            ->findAll();
        } else {
            $data['maintenances'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name')
            ->join('asset', 'asset.id = maintenance.asset_id')
            ->join('users', 'users.id = maintenance.user_id')
            ->where('maintenance.status', 'complete')
            ->orderBy('maintenance.timestamp', 'DESC')  // Specify the table alias for "timestamp"
            ->findAll();
        }
        
        $data['month'] = $month;

        if ($this->request->getGet('export')) {
            $dompdf = new Dompdf();
            $html = view('report-maintenance/pdf', $data);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('report-maintenance.pdf', ['Attachment' => false]);
        }
        return view('report-maintenance/index', $data);
    }

    public function pdf()
    {
        $maintenance = new Maintenance();
        $data['maintenances'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name')
        ->join('asset', 'asset.id = maintenance.asset_id')
        ->join('users', 'users.id = maintenance.user_id')
        ->where('maintenance.status', 'complete')
        ->orderBy('maintenance.timestamp', 'DESC')  // Specify the table alias for "timestamp"
        ->findAll();
        $dompdf = new Dompdf();
        $html = view('report-maintenance/pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('report-maintenance.pdf', ['Attachment' => false]);
    }



}
