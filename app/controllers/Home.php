<?php

class Home extends Controller {
    // method index akan dijalankan secara default ketika controller home dipanggil
    public function index($nama = 'User') {
        $data['nama'] = $nama;
        $this->view('home/index', $data);
    }
}
