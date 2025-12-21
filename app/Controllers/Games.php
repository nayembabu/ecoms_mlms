<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Games extends BaseController
{
    public function game_bi_cycle_view()
    {
        return view('games/bi-cycle');
    }
}
