<?php
class Controller {
     // method view digunakan untuk memanggil file view yang berada di folder app/views
    public function view($view, $data = []) {
        // memanggil file view yang berada di folder app/views
        $file = APP_ROOT . '/views/' . $view . '.php';
        if (!file_exists($file)) {
            Response::notFound();
        }
        require_once $file;
    }

     /* Render halaman lengkap (Header + Content + Footer) */
    public function render(string $view, array $data = []): void
    {
        $this->view('templates/header', $data);
        $this->view($view, $data);
        $this->view('templates/footer', $data);
    }
}
