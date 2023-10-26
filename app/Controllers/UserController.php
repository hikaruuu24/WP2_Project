<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;


class UserController extends BaseController
{

    public function index()
    {
        $data['title'] = 'User List';
        // get user join role table
        $model = new UserModel();
        $data['users'] = $model->select('users.*, role.name as role_name')
                                ->join('role', 'role.id = users.role_id')
                                ->findAll();
        dd($data['users']);
        return view('users/user_list.php', $data);
    }

    public function create()
    {
        $data['title'] = 'Create User';
        return view('users/create.php', $data);
    }

    public function store() {

        
        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'email'    =>'required|valid_email|is_unique[users.email]',
            'username'    =>'required|min_length[3]|is_unique[users.username]',
            'password'    =>'required|min_length[3]',
            'password_hash'    =>'required|min_length[3]|matches[password]',
            'role'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to('/user/create')->withInput();
        }

        //encrypt password
        $password = $this->request->getPost('password');
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $model = new UserModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $hashPassword,
            'role_id' => $this->request->getPost('role'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        session()->setFlashdata('message', 'Record has been created successfully.');

        return redirect()->to('/user');
        
    }

    public function edit($id) {
        $data['title'] = 'Edit User';
        $model = new UserModel();
        $data['user'] = $model->select('users.*, role.name as role')
                                ->join('role', 'role.id = users.role_id')
                                ->find($id);
        return view('users/edit', $data);
    }

    public function update($id) {

        // validation email,username,password,repeat password, role
        $validationRules = $this->validate([
            'email'    =>'required|valid_email',
            'username'    =>'required|min_length[3]',
            'password'    =>'required|min_length[3]',
            'password_hash'    =>'required|min_length[3]|matches[password]',
            'role'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            // Redirect back to the edit form with the ID
            return redirect()->to('/user/edit/'.$id)->withInput();
        }

        //encrypt password
        $password = $this->request->getPost('password');
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $model = new UserModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $hashPassword,
            'role_id' => $this->request->getPost('role'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $model->update($id, $data);

        session()->setFlashdata('message', 'Record has been updated successfully.');

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
        $user = new UserModel();
        $data['title'] = 'User Profile';
        $data['user'] = $user->find($id);

        return view('users/user_profile.php', $data);
    }

    
}
