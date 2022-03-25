<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Categories extends ResourceController
{
    private $categoriesModel;
    private $authModel;

    public function __construct()
    {
        $this->categoriesModel = new \App\Models\CategoriesModel();
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

            $data = $this->categoriesModel->orderBy('order')->where('excluded', 0)->findAll();

            $response = [
                'response'  => 'success',
                'data'      => $data
            ];

        } catch(Exception $e) {

            $response = [
                'response'          => 'error',
                'msg'               => 'Unable to list categories',
                'validation_error'  => [
                    'exception' => $e->getMessage()
                ]
            ];
        }
        
        return $this->response->setJSON($response);
    }
}