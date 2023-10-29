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
        $data['assets'] = $asset->findAll();
        return view('assets/index', $data);
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
            'name'    =>'required|min_length[3]|is_unique[assets.name]',
            'type'    =>'required',
            'category'    =>'required',
            'description'    =>'nullable',
            'price'    =>'nullable',
            'purchase_date'    =>'nullable',
            'image'    =>'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to('/asset/create')->withInput();
        } else {
            $fileImage = $this->request->getFile('image');
            if ($fileImage->getError() == 4) {
                $imageName = 'default.png';
            } else {
                $imageName = $fileImage->getRandomName();
                $fileImage->move('assets/images/pictures', $imageName);
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
            ]);
            session()->setFlashdata('message', 'Asset has been created successfully.');
            return redirect()->to('/asset');
        }
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
