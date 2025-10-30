<?php

namespace App\Controllers;
use Config\Services;
use App\Library\Template;

class Admin extends BaseController
{
    protected $session;
    protected $template;
    public function __construct()
    {
        $this->session = Services::session();
        $this->template = new Template();

        $role = $this->session->get('userRole');
        if ($role == 'cust') {
            $this->session->destroy();
            helper('url');
            header('Location: ' . site_url('logout'));
            exit;
        }
    }

    public function index()
    {
        return $this->template->front('admin/dashboard');
    }

}
