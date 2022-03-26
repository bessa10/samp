<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table        = 'tb_posts';
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

    public function create($form = null)
    {
        $endpoint = 'posts/create';

        $return = [];

        if ($form != null) {

            // Montando os dados para serem enviados
            $data['title']          = $form['title'];
            $data['description']    = $form['description'];
            $data['text']           = $form['text'];
            $data['cod_category']   = $form['cod_category'];

            $return = $this->apiModel->sendHttpPost($endpoint, null, $data);

            $return = json_decode($return, true);

            if (!$return) {

                $return['response']    = 'error';
                $return['msg']         = 'Unable to register the person';
            }
            
            return $return;

        } else {

            return false;
        }




    }



}