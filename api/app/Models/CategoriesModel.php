<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'tb_categories';
    protected $primaryKey = 'cod_category';
    protected $allowedFields = [
        'cod_category',
        'category_description'
    ];

    protected $validationRules = [
        'category_description'  => 'required',
        'order'                 => 'required'
    ];
}