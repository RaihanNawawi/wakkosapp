<?php

class Home extends Controller {
    // method index akan dijalankan secara default ketika controller home dipanggil
    public function index() {
        $this->view('home/index');
    }
}
