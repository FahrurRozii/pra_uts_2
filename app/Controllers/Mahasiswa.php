<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{   
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        $data=[
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa()
        ];


        return view('/Mahasiswa/index',$data);
    }

    public function detail($id){

        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($id)
        ];

        //404

        if(empty($data['mahasiswa'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan nim ' . $id . ' tidak ditemukan.');
        }

        return view('/Mahasiswa/detail',$data);

    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Mahasiswa',
            'validation' => \Config\Services::validation()
        ];

        return view('/Mahasiswa/create',$data);
    }


    public function save()
    {

        if(!$this->validate([
            'nim' => [
                'rules' => 'required|is_unique[mhs.nim]',
                'errors' => [
                    'required' => '{field} mahasiswa harus diisi',
                    'is_unique' => '{field} mahasiswa sudah digunakan'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/Mahasiswa/create')->withInput()->with('validation',$validation);
        }

        $this->mahasiswaModel->save([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('Pesan','Data berhasil ditambahkan');

        return redirect()->to('/Mahasiswa');
    }

    public function delete($id)

    {
        $this->mahasiswaModel->delete($id);
        session()->setFlashdata('Pesan','Data berhasil dihapus');
        return redirect()->to('/Mahasiswa');
    }

    public function edit($id){
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($id)
        ];

        return view('/Mahasiswa/edit',$data);
    }

    public function update($id){

        $this->mahasiswaModel->save([
            'id' => $id,
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('Pesan','Data berhasil diubah');

        return redirect()->to('/Mahasiswa');
    }

}
