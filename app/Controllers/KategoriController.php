<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;

class KategoriController extends BaseController
{
    
    
    public function index()
    {
        $data['title'] = 'Data Kategori';
        $model = new Kategori();
        $data['kategori'] = $model->findAll();
        return view('pustaka-booking/kategori/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Kategori';
        return view('pustaka-booking/kategori/create', $data);
    }

    public function store() {

        
         //define validation
         $validation = $this->validate([
            'nama_kategori'    => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Kategori Harus diisi',
                    'min_length' => 'Nama Kategori terlalu pendek'
                ]
            ],
        ]);

        if (!$validation) {
            // Store validation errors in flash data
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
        
            // Redirect back to the edit form with the ID
            return redirect()->to("/kategori/create");
        }
        
        $model = new Kategori();
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        session()->setFlashdata('message', 'Record has been created successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/kategori');
        
    }

    public function edit($id) {
        $data['title'] = 'Edit Data Kategori';
        $model = new Kategori();
        $data['kategori'] = $model->where('id_kategori',$id)->first();
        return view('pustaka-booking/kategori/edit', $data);
    }

    public function update($id){
        $model = new Kategori();
        //define validation
        $validation = $this->validate([
            'nama_kategori'    => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Kategori Harus diisi',
                    'min_length' => 'Nama Kategori terlalu pendek'
                ]
            ],
        ]);

        if (!$validation) {
            // Store validation errors in flash data
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
        
            // Redirect back to the edit form with the ID
            return redirect()->to("/kategori/edit/{$id}");
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        session()->setFlashdata('message', 'Record has been edited successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/kategori');
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
