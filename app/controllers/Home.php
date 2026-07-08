<?php

class Home extends Controller {
    // method index akan dijalankan secara default ketika controller home dipanggil
    public function index($name = 'User') {
        $data = [
        'title' => 'Home',
        'name' => $name
        ];
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
