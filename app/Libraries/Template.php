<?php

namespace App\Libraries;

class Template
{
    public function front($view, $data = [])
    {
        echo view('partials/header', $data);
        echo view('partials/topmenu', $data);
        echo view($view, $data);
        echo view('partials/footer', $data);
    }

}