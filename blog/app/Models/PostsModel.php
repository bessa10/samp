<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table        = 'posts';
    protected $primaryKey   = 'cod_post';

    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new \App\Models\ApiModel();
    }

    public function list()
    {
        $endpoint = 'posts/list';

        $list_posts = $this->apiModel->sendHttpGet($endpoint);

        $list_posts = json_decode($list_posts, true);

        return $list_posts['data'];
    }




}