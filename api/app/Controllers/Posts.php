<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Posts extends ResourceController
{
    private $postsModel;
    private $authModel;

    public function __construct()
    {
        $this->postsModel = new \App\Models\PostsModel();
        $this->authModel = new \App\Models\AuthModel();

        if (!$this->authModel->validaToken()) {

            $response = [
                'response'  => 'error',
                'msg'       => 'Invalid token'
            ];

            echo json_encode($response);
            exit;
        }
    }

    public function list()
    {
        $response = [];

        try {

            $data = $this->postsModel->orderBy('dth_insert DESC')->where('excluded', 0)->findAll();

            $response = [
                'response'  => 'success',
                'data'      => $data
            ];

        } catch(Exception $e) {

            $response = [
                'response'          => 'error',
                'msg'               => 'Unable to list posts',
                'validation_error'  => [
                    'exception' => $e->getMessage()
                ]
            ];
        }
        
        return $this->response->setJSON($response);
    }
}