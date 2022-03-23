<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    private $token          = 'fofnolojnlasp2934890409AndfuifndAxcnnU';
    protected $table        = 'tb_users';
    protected $primaryKey   = 'cod_user';

    public function validaToken()
    {   
        $request = \Config\Services::request();

        $response   = null;
        $auth_token = null;

        if($request->getHeaderLine('token')) {

            $auth_token = $request->getHeaderLine('token');

        } elseif ($request->getGet('token')) {
            
            $auth_token = $request->getGet('token');
        }

        //echo 'auth_token: ' .  $auth_token . '<br> token: ' . $this->token;die;

        if ($auth_token === $this->token) {
            
            return true;

        } else {
            
            return false;
        }
    }
}