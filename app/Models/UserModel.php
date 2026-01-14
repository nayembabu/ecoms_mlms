<?php

    namespace App\Models;
    use CodeIgniter\Model;


    class UserModel extends Model
    {
        protected $table      = 'user_login_details';
        protected $primaryKey = 'login_idd';

        // adjust allowed fields to match your schema
        protected $allowedFields = [
            'login_idd',
            'login_user_idd',
            'username',
            'password',
            'email',
            'user_phone_numbers',
            'status',
        ];

    }