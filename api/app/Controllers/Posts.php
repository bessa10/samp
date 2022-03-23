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

    public function find($cod_post) 
    {
        $response = [];
        
        try {

            $data = $this->postsModel->where('excluded', 0)->find($cod_post);

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

    public function create()
    {
        $response = [];

        if($this->request->getJson()) {

            $dados = (array) $this->request->getJson();

            $newPost['title']             = (isset($dados['title'])) ? $dados['title'] : null;
            $newPost['image']             = (isset($dados['image'])) ? $dados['image'] : null;
            $newPost['description']       = (isset($dados['description'])) ? $dados['description'] : null;
            $newPost['text']              = (isset($dados['text'])) ? $dados['text'] : null;
            $newPost['cod_category']      = (isset($dados['cod_category'])) ? $dados['cod_category'] : null;

        } else {

            $newPost['title']         = ($this->request->getPost('title')) ? $this->request->getPost('title') : null;
            $newPost['image']         = ($this->request->getPost('image')) ? $this->request->getPost('image') : null;
            $newPost['description']   = ($this->request->getPost('description')) ? $this->request->getPost('description') : null;
            $newPost['text']          = ($this->request->getPost('text')) ? $this->request->getPost('text') : null;
            $newPost['cod_category']  = ($this->request->getPost('cod_category')) ? $this->request->getPost('cod_category') : null;
        }

        try {

            if ($this->postsModel->insert($newPost)) {

                $response = [
                    'response'  => 'success',
                    'msg'       => 'Post registered successfully'
                ];

            } else {

                $response = [
                    'response'          => 'error',
                    'msg'               => 'Unable to register the post',
                    'validation_error'  => $this->postsModel->errors()
                ];
            }

        } catch(Exception $e) {

            $response = [
                'response'          => 'error',
                'msg'               => 'Unable to register the post',
                'validation_error'  => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function update($cod_post = null)
    {
        $response = [];

        $data = $this->postsModel->where('excluded',0)->find($cod_post);

        if (!$data) {

            $response = [
                'response'  => 'error',
                'msg'       => 'Post not found'
            ];

        } else {

            if($this->request->getJson()) {

                $dados = (array) $this->request->getJson();

                $newPost['title']             = (isset($dados['title'])) ? $dados['title'] : $data->title;
                $newPost['image']             = (isset($dados['image'])) ? $dados['image'] : $data->image;
                $newPost['description']       = (isset($dados['description'])) ? $dados['description'] : $data->description;
                $newPost['text']              = (isset($dados['text'])) ? $dados['text'] : $data->text;
                $newPost['cod_category']      = (isset($dados['cod_category'])) ? $dados['cod_category'] : $data->cod_category;

            } else {

                $newPost['title']         = ($this->request->getPost('title')) ? $this->request->getPost('title') : $data->title;
                $newPost['image']         = ($this->request->getPost('image')) ? $this->request->getPost('image') : $data->image;
                $newPost['description']   = ($this->request->getPost('description')) ? $this->request->getPost('description') : $data->description;
                $newPost['text']          = ($this->request->getPost('text')) ? $this->request->getPost('text') : $data->text;
                $newPost['cod_category']  = ($this->request->getPost('cod_category')) ? $this->request->getPost('cod_category') : $data->cod_category;
            }   

            try {

                if ($this->postsModel->update($cod_post, $newPost)) {

                    $response = [
                        'response'  => 'success',
                        'msg'       => 'Post successfully changed'
                    ];

                } else {

                    $response = [
                        'response'          => 'error',
                        'msg'               => 'Unable to change post',
                        'validation_error'  => $this->postsModel->errors()
                    ];
                }

            } catch(Exception $e) {

                $response = [
                    'response'          => 'error',
                    'msg'               => 'Unable to change post',
                    'validation_error'  => [
                        'exception' => $e->getMessage()
                    ]
                ];
            }
        }

        return $this->response->setJSON($response);
    }

    public function cancel($cod_post = null)
    {
        $response = [];

        // primeiro passo é verificar se a pessoa realmente existe
        $data = $this->postsModel->where('excluded', 0)->find($cod_post);

        if (!$data) {

            $response = [
                'response'  => 'error',
                'msg'       => 'Post not found'
            ];

        } else {

            $data['excluded']       = 1;
            $data['dth_excluded']   = date('Y-m-d H:i:s');

            try {

                if ($this->postsModel->update($cod_post, $data)) {

                    $response = [
                        'response'  => 'success',
                        'msg'       => 'Post canceled successfully'
                    ];

                } else {

                    $response = [
                        'response'          => 'error',
                        'msg'               => 'Unable to cancel post',
                        'validation_error'  => $this->postsModel->errors()
                    ];
                }

            } catch(Exception $e) {

                $response = [
                    'response'          => 'error',
                    'msg'               => 'Unable to cancel post',
                    'validation_error'  => [
                        'exception' => $e->getMessage()
                    ]
                ];
            }
        }

        return $this->response->setJSON($response);
    }
}