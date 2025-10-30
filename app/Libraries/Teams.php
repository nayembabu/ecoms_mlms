<?php

namespace App\Libraries;

use Config\Services;
use Config\Database;

class Teams
{
    protected $db;
    protected $session;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->session = Services::session();
    }

    public function full_team_view($userid)
    {
    }


}