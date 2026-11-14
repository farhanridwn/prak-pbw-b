<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();

        $data['mahasiswa'] = $model->findAll();

        return view('mahasiswa/index', $data);
    }

    public function tambah()
    {
        return view('mahasiswa/tambah');
    }
    
public function simpan()
{
    $rules = [
        'nim'      => 'required',
        'nama'     => 'required|min_length[3]',
        'email'    => 'required|valid_email',
        'prodi'    => 'required',
        'angkatan' => 'required|integer',
        'ipk'      => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
    ];

    if (!$this->validate($rules)) {
        return view('mahasiswa/tambah', [
            'validation' => $this->validator
        ]);
    }

    $model = new MahasiswaModel();

    $data = [
        'nim'      => $this->request->getPost('nim'),
        'nama'     => $this->request->getPost('nama'),
        'email'    => $this->request->getPost('email'),
        'prodi'    => $this->request->getPost('prodi'),
        'angkatan' => $this->request->getPost('angkatan'),
        'ipk'      => $this->request->getPost('ipk')
    ];

    $model->insert($data);

    return redirect()->to('/mahasiswa');
}

public function edit($id)
{
    $model = new MahasiswaModel();

    $data['mahasiswa'] = $model->find($id);

    return view('mahasiswa/edit', $data);

    }

public function update($id)
{
    $rules = [
        'nim'      => 'required',
        'nama'     => 'required|min_length[3]',
        'email'    => 'required|valid_email',
        'prodi'    => 'required',
        'angkatan' => 'required|integer',
        'ipk'      => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
    ];

    if (!$this->validate($rules)) {
        $model = new MahasiswaModel();

        return view('mahasiswa/edit', [
            'mahasiswa' => array_merge(
                $model->find($id),
                $this->request->getPost()
            ),
            'validation' => $this->validator
        ]);
    }

    $model = new MahasiswaModel();

    $data = [
        'nim'      => $this->request->getPost('nim'),
        'nama'     => $this->request->getPost('nama'),
        'email'    => $this->request->getPost('email'),
        'prodi'    => $this->request->getPost('prodi'),
        'angkatan' => $this->request->getPost('angkatan'),
        'ipk'      => $this->request->getPost('ipk')
    ];

    $model->update($id, $data);

    return redirect()->to('/mahasiswa');
}

public function hapus($id)
{
    $model = new MahasiswaModel();

    $model->delete($id);

    return redirect()->to('/mahasiswa');

    }
}