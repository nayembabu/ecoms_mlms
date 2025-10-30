<?php

namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table      = 'user_login_details';
    protected $primaryKey = 'login_user_idd';

    // adjust allowed fields to match your schema
    protected $allowedFields = [
        'login_user_idd',
        'username',
        'password',
        'email',
        'status',
    ];

} 