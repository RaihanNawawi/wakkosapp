<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function parseURL()
    {
        // cek apakah ada data yang dikirimkan melalui url dengan key "url"
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // menghapus karakter "/" di akhir string
            $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitate URL untuk menghapus karakter yang tidak diinginkan
            $url = explode('/', $url); // memecah string menjadi array berdasarkan karakter "/"
            return $url;
        }
        return [];
    }
    public function __construct()
    {
        $url = $this->parseURL();
        // Controller Logic
        if (isset($url[0]) && file_exists(APP_ROOT . '/controllers/' . $url[0] . '.php')) {
            $this->controller = ucfirst(strtolower($url[0])); // Standarisasi nama controller agar sesuai dengan nama file controller yang dipanggil
            unset($url[0]);
        } else {
            Response::notFound();
        }
        require_once APP_ROOT . '/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method Logic
        if (isset($url[1])) {

            // Method harus ada
            if (!method_exists($this->controller, $url[1])) {
                Response::notFound();
            }

            // Tidak boleh mengakses magic method (__construct, __destruct, dll)
            if (str_starts_with($url[1], '__')) {
                Response::notFound();
            }

            // Method harus bersifat public
            $reflection = new ReflectionMethod($this->controller, $url[1]);

            if (!$reflection->isPublic()) {
                Response::notFound();
            }

            $this->method = $url[1];
            unset($url[1]);
        }

        // Params Logic
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller dan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }


}
