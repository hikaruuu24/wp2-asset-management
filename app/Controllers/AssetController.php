<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Asset;
use App\Models\Type;
use App\Models\Category;

class AssetController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Asset List';
        $asset = new Asset();
        // join type, category table order by timestamp
        $data['assets'] = $asset->select('asset.*, type.name as type_name, category.name as category_name')
        ->join('type', 'type.id = asset.type_id')
        ->join('category', 'category.id = asset.category_id')
        ->orderBy('timestamp', 'DESC')
        ->findAll();
        return view('assets/index', $data);
    }

    // show
    public function show($id) {
        $data['title'] = 'Asset Detail';
        $asset = new Asset();
        $data['asset'] = $asset->select('asset.*, type.name as type_name, category.name as category_name')
        ->join('type', 'type.id = asset.type_id')
        ->join('category', 'category.id = asset.category_id')
        ->find($id);
        return view('assets/show', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Asset';
        $data['validation'] = \Config\Services::validation();
        $type = new Type();
        $data['types'] = $type->findAll();
        $category = new Category();
        $data['categories'] = $category->findAll();
        return view('assets/create', $data);
    }

    public function store() {

        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
            'type'    =>'required',
            'category'    =>'required',
            'image'    =>'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);
        
        if (!$validationRules) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', $validation->getErrors());

            return redirect()->to('/asset/create')->withInput();
        } 

            if ($this->request->getFile('image')->isValid()) {
                $fileImage = $this->request->getFile('image');
                $imageName = $fileImage->getRandomName();
                $fileImage->move('assets/images/pictures', $imageName);
            } else {
                $imageName = 'default.png';
            }
            
            $asset = new Asset();
            $asset->insert([
                'name' => $this->request->getPost('name'),
                'type_id' => $this->request->getPost('type'),
                'category_id' => $this->request->getPost('category'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'purchase_date' => $this->request->getPost('purchase_date'),
                'image' => $imageName,
                'timestamp' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('message', 'Asset has been created successfully.');
            return redirect()->to('/asset');
        
    }

    public function edit($id) {
        $data['title'] = 'Edit Asset';
        $data['validation'] = \Config\Services::validation();
        $type = new Type();
        $data['types'] = $type->findAll();
        $category = new Category();
        $data['categories'] = $category->findAll();
        $asset = new Asset();
        $data['asset'] = $asset->select('asset.*, type.name as type_name, category.name as category_name')
        ->join('type', 'type.id = asset.type_id')
        ->join('category', 'category.id = asset.category_id')
        ->find($id);
        return view('assets/edit', $data);
    }

    public function update($id) {

        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'name'    =>'required|min_length[3]',
            'type'    =>'required',
            'category'    =>'required',
            'image'    =>'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);
        
        if (!$validationRules) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', $validation->getErrors());

            return redirect()->to('/asset/edit/' . $id)->withInput();
        } 

        $imgAsset = new Asset();
        $imgAsset = $imgAsset->find($id);
        $oldImage = $imgAsset['image'];
        
            if ($this->request->getFile('image')->isValid()) {
                $fileImage = $this->request->getFile('image');
                $imageName = $fileImage->getRandomName();
                $fileImage->move('assets/images/pictures', $imageName);
            } else {
                $imageName = $oldImage;
            }

            $asset = new Asset();
            $asset->update($id, [
                'name' => $this->request->getPost('name'),
                'type_id' => $this->request->getPost('type'),
                'category_id' => $this->request->getPost('category'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'purchase_date' => $this->request->getPost('purchase_date'),
                'image' => $imageName,
                'timestamp' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('message', 'Asset has been updated successfully.');
            return redirect()->to('/asset');
        
    }

    public function delete($id) {

        $model = new Asset();

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
