<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\IJinModel;
use App\Models\ScanQrModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class UserController extends BaseController
{
    public function index()
    {
        $session = session();

        if(!$session->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('user/home', ['title' => 'Home']);
    }

    public function ijin()
    {
        return view('user/ijin', ['title' => 'Ijin']);
    }

    public function aksi_ijin()
    {
        $ijin_model = new IJinModel();
        $guru = new GuruModel();

        if (!session()->get('logged_in')) {
            return redirect()->to('/')->with('auth_err','er');
        }
        $id_guru = session()->get('id_guru');
        $tanggal = date('Y-m-d');
        $keterangan = $this->request->getPost('keterangan');

        $existing_ijin = $ijin_model->where('id_guru', $id_guru)
                                    ->where('tanggal', $tanggal)
                                    ->first();
        
        if ($existing_ijin) {
            return redirect()->to('/ijin')->with('error','Anda sudah melakukan ijin hari ini');
        }

        $data = [
            'id_guru' => $id_guru,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan,
            'poin' => 1,
        ];
        $ijin_model->insert($data);
        $guru->update($id_guru, ['status' => 'ijin']);

        return redirect()->to('/home')->with('scs_ijin','scs');
    }

    public function presensi()
    {
        $scan = new ScanQrModel();
        $today = Time::now('Asia/Jakarta')->toDateString();
        $scan->where('tanggal', $today)->first();
        $data = [
            'title' => 'Presensi Guru',
            'scan' => $scan->findAll()
        ];
        return view('user/presensi', $data);
    }

    public function tes ()
    {
        return view('user/scan');
    }
}
