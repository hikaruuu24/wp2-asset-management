<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Type;

class TypeController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Type ';
        $model = new Type();
        $data['types'] = $model->findAll();
        return view('master-data/types/index', $data);
    }

    public function create()
    {
        session();
        $data['title'] = 'Create Type';
        $data['validation'] = \Config\Services::validation();
        return view('master-data/types/create', $data);
    }

    public function store() {

        
         //define validation
         $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', $validation->getErrors());

            return redirect()->to("/type/create")->withInput();
        }
        
        $model = new Type();
        $data = [
            'name' => $this->request->getPost('name'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        session()->setFlashdata('message', 'Record has been created successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/type');
        
    }

    public function edit($id) {
        $data['title'] = 'Edit Type';
        $model = new Type();
        $data['type'] = $model->where('id',$id)->first();
        return view('master-data/types/edit', $data);
    }

    public function update($id) {

        //define validation
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', $validation->getErrors());

            return redirect()->to("/type/edit/$id")->withInput();
        }

        $model = new Type();
        $data = [
            'name' => $this->request->getPost('name'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        session()->setFlashdata('message', 'Record has been updated successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/type');
    }

    public function delete($id) {

        $model = new Type();

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
