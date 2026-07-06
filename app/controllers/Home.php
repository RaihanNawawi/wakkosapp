<?php

class Home {
    // method index akan dijalankan secara default ketika controller home dipanggil
    public function index() {
        echo "Home/index";
    }
    // method test akan dijalankan ketika controller home dipanggil dengan method test, contoh: ?url=home/test
    public function test() {
        echo "Home/test";
    }
}
