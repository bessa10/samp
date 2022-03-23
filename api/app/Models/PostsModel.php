<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = 'tb_posts';
    protected $primaryKey = 'cod_post';
    protected $allowedFields = [
        'title',
        'image',
        'description',
        'text',
        'cod_category',
        'excluded',
        'dth_excluded'
    ];

    protected $validationRules = [
        'title'             => 'required',
        'description'       => 'required',
        'text'              => 'required',
    ];
}