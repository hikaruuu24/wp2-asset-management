<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;



class UserController extends BaseController
{

    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth   = service('authentication');
    }

    public function index()
    {
        $data['title'] = 'User List';
        // get user join role table
        $model = new UserModel();
        $data['users'] = $model->select('users.*, role.name as role_name')
                                ->join('role', 'role.id = users.role_id')
                                ->findAll();
        return view('users/user_list.php', $data);
    }

    public function create()
    {
        $data['title'] = 'Create User';
        $model = new \App\Models\Role();
        $data['roles'] = $model->findAll();
        return view('users/create.php', $data);
    }

    public function store() {

        
        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'email'    =>'required|valid_email|is_unique[users.email]',
            'username'    =>'required|min_length[3]|is_unique[users.username]',
            'password'    =>'required|min_length[3]',
            'confirm_password'    =>'required|min_length[3]|matches[password]',
            'role'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to('/user/create')->withInput();
        }

        $users = model(UserModel::class);
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user              = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Set role ID
        $user->role_id = $this->request->getPost('role');

        if (! $users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        session()->setFlashdata('message', 'Record has been created successfully.');

        return redirect()->to('/user');
        
    }

    public function delete($id) {

        $model = new UserModel();
        
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

    public function userProfile($id)
    {
        $data['title'] = 'User Profile';
        // get user by id with join role table
        $model = new UserModel();
        $data['user'] = $model->select('users.*, role.name as role_name')
                                ->join('role', 'role.id = users.role_id')
                                ->find($id);

        return view('users/user_profile.php', $data);
    }

    
}
