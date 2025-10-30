<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_information';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id', 'product_subcat_id', 'product_name', 'product_details', 'price', 'supplier_price', 'unit', 'product_model', 'image_thumb', 'description', 'tag', 'specification'];




}