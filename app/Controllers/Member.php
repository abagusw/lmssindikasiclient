<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function index()
    {
        return view('register/bg_form'); // file view kamu
    }

    public function save()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'fullname' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telp' => 'required|numeric|min_length[9]',
            'gender' => 'required',
            'kota_kelahiran' => 'required',
            'kota_domisili' => 'required',
            'pendidikan_terakhir' => 'required',
            'nama_instansi_pendidikan' => 'required',
            'subsektor' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required',
            'status_ketenagakerjaan' => 'required',
            'bpjstk' => 'required',
            'bpjsks' => 'required',
            'status_anggota_bpjstk' => 'required',
            'status_anggota_bpjsks' => 'required',
            'alasan_bergabung_sindikasi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new MemberModel();
        $masalahKetenagakerjaan = $this->request->getPost('masalah_ketenagakerjaan');
        $masalahKetenagakerjaanStr = is_array($masalahKetenagakerjaan) ? implode(',', $masalahKetenagakerjaan) : null;
        $pakta = $this->request->getPost('pakta_integritas'); // array
        $pakta_integritas = implode(', ', $pakta); // simpan jadi string

        $pernyataanKeanggotaan = $this->request->getPost('pernyataan_keanggotaan');
        $pernyataanKeanggotaanStr = is_array($pernyataanKeanggotaan) ? implode(',', $pernyataanKeanggotaan) : null;


        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'telp' => $this->request->getPost('telp'),
            'gender' => $this->request->getPost('gender'),
            'kota_kelahiran' => $this->request->getPost('kota_kelahiran'),
            'kota_domisili' => $this->request->getPost('kota_domisili'),
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'nama_instansi_pendidikan' => $this->request->getPost('nama_instansi_pendidikan'),
            'pengalaman_organisasi' => $this->request->getPost('pengalaman_organisasi'),
            'referensi' => $this->request->getPost('referensi'),
            'subsektor' => $this->request->getPost('subsektor'),
            'instansi' => $this->request->getPost('instansi'),
            'jabatan' => $this->request->getPost('jabatan'),
            'status_ketenagakerjaan' => $this->request->getPost('status_ketenagakerjaan'),
            'deskripsi_pekerjaan' => $this->request->getPost('deskripsi_pekerjaan'),
            'jenis_masalah_lainnya' => $this->request->getPost('jenis_masalah_lainnya'),
            'alasan_bergabung_sindikasi' => $this->request->getPost('alasan_bergabung_sindikasi'),
            'disabilitas' => implode(',', $this->request->getPost('disabilitas')),
            'disabilitas_lainnya' => $this->request->getPost('disabilitas_lainnya')),
            'bpjstk' => $this->request->getPost('bpjstk'),
            'bpjsks' => $this->request->getPost('bpjsks'),
            'status_anggota_bpjstk' => $this->request->getPost('status_anggota_bpjstk'),
            'status_anggota_bpjsks' => $this->request->getPost('status_anggota_bpjsks'),
            'link_instagram' => $this->request->getPost('link_instagram'),
            'link_twitter' => $this->request->getPost('link_twitter'),
            'link_facebook' => $this->request->getPost('link_facebook'),
            'link_linkedin' => $this->request->getPost('link_linkedin'),
            'created_at' => date('Y-m-d H:i:s'),
            'masalah_ketenagakerjaan_lain' => $this->request->getPost('jenis_masalah_lainnya'),
            'masalah_ketenagakerjaan' => $masalahKetenagakerjaanStr,
            'pakta_integritas' => $pakta_integritas,
            'pernyataan_keanggotaan' => $pernyataanKeanggotaanStr



        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'success']);

    }
}