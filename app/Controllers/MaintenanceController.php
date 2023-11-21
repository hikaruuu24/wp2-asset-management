<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Maintenance;
use App\Models\Asset;
use Myth\Auth\Models\UserModel;

class MaintenanceController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Maintenance List';
        $maintenance = new Maintenance();
        $data['maintenances'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name')
        ->join('asset', 'asset.id = maintenance.asset_id')
        ->join('users', 'users.id = maintenance.user_id')
        ->orderBy('timestamp', 'DESC')
        ->findAll();
        return view('maintenances/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Maintenance';
        $data['validation'] = \Config\Services::validation();
        $asset = new Asset();
        $data['assets'] = $asset->findAll();
        $user = new UserModel();
        $data['users'] = $user->where('role_id', 4)->findAll();
        return view('maintenances/create', $data);
    }

    public function store() {
        
        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
            'status'    =>'required',
            'priority'    =>'required',
            'completion_date'    =>'required',
            'task'    =>'required',
            'asset'    =>'required',
            'user'    =>'required',
        ]);
        
        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to('/maintenance/create')->withInput();
        }
        
        $model = new Maintenance();
        $data = [
            'name' => $this->request->getPost('name'),
            'status' => $this->request->getPost('status'),
            'priority' => $this->request->getPost('priority'),
            'completion_date' => $this->request->getPost('completion_date'),
            'task' => $this->request->getPost('task'),
            'asset_id' => $this->request->getPost('asset'),
            'user_id' => $this->request->getPost('user'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        session()->setFlashdata('message', 'Record has been created successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/maintenance');
        
    }

    public function show($id)
    {
        $data['title'] = 'Detail Maintenance';
        $maintenance = new Maintenance();
        $data['maintenance'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name')
        ->join('asset', 'asset.id = maintenance.asset_id')
        ->join('users', 'users.id = maintenance.user_id')
        ->where('maintenance.id', $id)
        ->first();
        return view('maintenances/show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Maintenance';
        $data['validation'] = \Config\Services::validation();
        $maintenance = new Maintenance();
        $data['maintenance'] = $maintenance->select('maintenance.*, asset.name as asset_name, users.username as user_name')
        ->join('asset', 'asset.id = maintenance.asset_id')
        ->join('users', 'users.id = maintenance.user_id')
        ->where('maintenance.id', $id)
        ->first();
        $asset = new Asset();
        $data['assets'] = $asset->findAll();
        $user = new UserModel();
        $data['users'] = $user->where('role_id', 4)->findAll();
        return view('maintenances/edit', $data);
    }

    public function update($id)
    {
        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
            'status'    =>'required',
            'priority'    =>'required',
            'completion_date'    =>'required',
            'task'    =>'required',
            'asset'    =>'required',
            'user'    =>'required',
        ]);
        
        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to('/maintenance/edit/'.$id)->withInput();
        }
        
        $model = new Maintenance();
        $data = [
            'name' => $this->request->getPost('name'),
            'status' => $this->request->getPost('status'),
            'priority' => $this->request->getPost('priority'),
            'completion_date' => $this->request->getPost('completion_date'),
            'task' => $this->request->getPost('task'),
            'asset_id' => $this->request->getPost('asset'),
            'user_id' => $this->request->getPost('user'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        session()->setFlashdata('message', 'Record has been updated successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/maintenance');
    }

    public function delete($id) {

        $model = new Maintenance();

        if ($model->delete($id)) {
            $response = [
                'success' => true,
                'message' => 'Record has been deleted successfully.',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to delete the record.',
            ];
        }

        // Set the flash message for the session
        session()->setFlashdata('message', $response['message']);

        // Return a JSON response
        return $this->response->setJSON($response);
    }
    
}
