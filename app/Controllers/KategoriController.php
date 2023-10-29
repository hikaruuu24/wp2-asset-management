<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;

class KategoriController extends BaseController
{
    
    public function index()
    {
        $data['title'] = 'Kategori';
        $model = new Kategori();
        $data['kategoris'] = $model->findAll();
        return view('master-data/kategori/index', $data);
    }

    public function create()
    {
        session();
        $data['title'] = 'Create Kategori';
        $data['validation'] = \Config\Services::validation();
        return view('master-data/kategori/create', $data);
    }

    public function delete($id) {

        $model = new Kategori();

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
