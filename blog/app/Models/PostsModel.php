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

    public function find($cod_post = null)
    {
        if ($cod_post != null) {

            $endpoint = 'posts/find/'.$cod_post;

            $find_post = $this->apiModel->sendHttpGet($endpoint);

            $find_post = json_decode($find_post, true);

            return $find_post['data'];

        } else {

            return false;
        }
    }

    public function create($form = null)
    {
        $endpoint = 'posts/create';

        $return = [];

        if ($form != null) {

            // Assembling the data to be sent
            $data['title']          = $form['title'];
            $data['description']    = clearEndSpaces($form['description']);
            $data['text']           = clearEndSpaces($form['text']);
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

    public function edit($cod_post = null, $form = null)
    {
        if ($cod_post != null && $form != null) {

            $endpoint = 'posts/update/'.$cod_post;

            $return = [];

            // Assembling the data to be sent
            $data['cod_post']       = $cod_post;
            $data['title']          = $form['title'];
            $data['description']    = clearEndSpaces($form['description']);
            $data['text']           = clearEndSpaces($form['text']);
            $data['cod_category']   = $form['cod_category'];

            $return = $this->apiModel->sendHttpPut($endpoint, null, $data);

            $return = json_decode($return, true);

            if (!$return) {

                $return['response']    = 'error';
                $return['msg']         = 'Não foi possível alterar a pessoa';
            }
            
            return $return;

        } else {

            return false;
        }
    }
}