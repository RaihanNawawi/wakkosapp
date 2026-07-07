<?php

class Home extends Controller {
    // method index akan dijalankan secara default ketika controller home dipanggil
    public function index($nama = 'User') {
        $data['nama'] = $nama;
        $this->view('templates/header', ['judul' => 'Home']);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
