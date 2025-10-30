<?php

namespace App\Controllers;
use Config\Services;
use App\Libraries\Template;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;


class User extends BaseController
{
    protected $session;
    protected $template;
    protected $regModel;
    protected $productModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->session = Services::session();
        $this->template = new Template();
        $this->regModel = new RegModel();
        $this->productModel = new ProductModel();
        $this->db = Database::connect();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return $this->template->front('user/dashboard');
    }
    public function profile()
    {
        $userId = $this->session->get('userInfoId');
        $userData = $this->regModel->find($userId);
         $data = [
            'title' => 'My Profile',
            'user'  => $userData
        ];
        return $this->template->front('user/profile',$data);
    }
    public function editProfile(){
        $user_id = $this->request->getPost('user_id');
        $user_full_name = $this->request->getPost('user_full_name');
        $user_address = $this->request->getPost('user_full_address');
        $updateData = [
            'user_full_name' => $user_full_name,
            'user_full_address' => $user_address
        ];
        $result = $this->regModel->update($user_id, $updateData);
        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Update failed.']);
        }
    }

    public function show_product_by_cats()
    {
        $data['cats'] = $this->db->table('category')->get()->getResult();
        $data['products'] = $this->db
                                 ->table('product_buying_info')
                                 ->join('product_information', 'product_buying_info.product_buy_product_idd = product_information.id', 'left')
                                 ->join('category', 'product_information.category_id = category.cat_id', 'left')
                                 ->join('sub_category', 'product_information.product_subcat_id = sub_category.sub_cat_idd', 'left')
                                 ->get()
                                 ->getResult();
        return $this->template->front('user/product_by_cats', $data);
    }

}
