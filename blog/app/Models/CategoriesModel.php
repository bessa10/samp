<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table        = 'tb_categories';
    protected $primaryKey   = 'cod_category';

    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new \App\Models\ApiModel();
    }

    public function list()
    {
        $endpoint = 'categories/list';

        $list_categories = $this->apiModel->sendHttpGet($endpoint);

        $list_categories = json_decode($list_categories, true);

        return $list_categories['data'];
    }
}