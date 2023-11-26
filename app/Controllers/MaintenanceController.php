<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Maintenance;
use App\Models\MaintenanceTask;
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
        $data['users'] = $user->where('role_id', 2)->findAll();
        return view('maintenances/create', $data);
    }

    public function store() {
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
            'status'    =>'required',
            'priority'    =>'required',
            'completion_date'    =>'required',
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
            'asset_id' => $this->request->getPost('asset'),
            'user_id' => $this->request->getPost('user'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        $maintenanceTask = new MaintenanceTask();
        foreach ($this->request->getPost('tasks') as $task) {
            $data_task = [
                'maintenance_id' => $model->getInsertID(),
                'task' => $task,
                'timestamp' => date('Y-m-d H:i:s')
            ];
            $maintenanceTask->insert($data_task);
        }

        session()->setFlashdata('message', 'Record has been created successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/maintenance');
        
    }

    public function show($id)
    {
        $data['title'] = 'Detail Maintenance';
        $maintenance = new Maintenance();
        // get maintenance data with join asset and user get all column asset and user
        $data['maintenance'] = $maintenance->select('maintenance.*, asset.name as asset_name, asset.image as asset_image, users.username as user_name, role.name as role_name')
        ->join('asset', 'asset.id = maintenance.asset_id')
        ->join('users', 'users.id = maintenance.user_id')
        ->join('role', 'role.id = users.role_id')
        ->find($id);
        $maintenanceTask = new MaintenanceTask();
        $data['maintenance']['maintenance_tasks'] = $maintenanceTask->where('maintenance_id', $id)->findAll();

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
        $maintenanceTask = new MaintenanceTask();
        $data['maintenance']['maintenance_tasks'] = $maintenanceTask->where('maintenance_id', $id)->findAll();
        $asset = new Asset();
        $data['assets'] = $asset->findAll();
        $user = new UserModel();
        $data['users'] = $user->where('role_id', 2)->findAll();
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
            'asset_id' => $this->request->getPost('asset'),
            'user_id' => $this->request->getPost('user'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        $maintenanceTask = new MaintenanceTask();
        if ($this->request->getPost('tasks')) {
            $maintenanceTask->where('maintenance_id', $id)->delete();
            foreach ($this->request->getPost('tasks') as $task) {
                $data_task = [
                    'maintenance_id' => $id,
                    'task' => $task,
                    'timestamp' => date('Y-m-d H:i:s')
                ];
                $maintenanceTask->insert($data_task);
            }
        }

        session()->setFlashdata('message', 'Record has been updated successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/maintenance');
    }

    public function uploadDocument($id) {
        
        $model = new Maintenance();

        if ($this->request->getFile('document')->isValid()) {
            $fileDocument = $this->request->getFile('document');
            $documentName = $fileDocument->getName();
            $fileDocument->move('assets/docs', $documentName);
    
            // Use the model instance to perform the update
            $model->update($id, [
                'document' => $documentName,
                'status' => 'complete', // change status to 'complete when document uploaded'
                'timestamp' => date('Y-m-d H:i:s')
            ]);
    
            session()->setFlashdata('message', 'Document has been uploaded successfully.');
        } else {
            session()->setFlashdata('message', 'Failed to upload document.');
        }
    
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
