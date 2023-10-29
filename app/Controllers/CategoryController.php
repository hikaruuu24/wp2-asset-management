<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Category';
        $model = new Category();
        $data['categories'] = $model->findAll();
        return view('master-data/categories/index', $data);
    }

    public function create()
    {
        session();
        $data['title'] = 'Create Category';
        $data['validation'] = \Config\Services::validation();
        return view('master-data/categories/create', $data);
    }

    public function store() {

        
         //define validation
         $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to("/category/create")->withInput();
        }
        
        $model = new Category();
        $data = [
            'name' => $this->request->getPost('name'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        session()->setFlashdata('message', 'Record has been created successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/category');
        
    }

    public function edit($id) {
        $data['title'] = 'Edit Category';
        $model = new Category();
        $data['category'] = $model->where('id',$id)->first();
        return view('master-data/categories/edit', $data);
    }

    public function update($id) {

        //define validation
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to("/category/edit/$id")->withInput();
        }

        $model = new Category();
        $data = [
            'name' => $this->request->getPost('name'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        session()->setFlashdata('message', 'Record has been updated successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/category');
    }

    public function delete($id) {

        $model = new Category();

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
