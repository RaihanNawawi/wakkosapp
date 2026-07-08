<?php
class Controller {
     // method view digunakan untuk memanggil file view yang berada di folder app/views
    public function view($view, $data = []) {
        // memanggil file view yang berada di folder app/views
        require_once '../app/views/' . $view . '.php';
    }

     /* Render halaman lengkap (Header + Content + Footer) */
    public function render(string $view, array $data = []): void
    {
        $this->view('templates/header', $data);
        $this->view($view, $data);
        $this->view('templates/footer', $data);
    }
}
