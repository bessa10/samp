<?php

if (!function_exists('msgAlert')) 
{
    function msgAlert()
    {
        $html = '';

        if (session()->getFlashdata('msg') && session()->getFlashdata('msg')) {

        $type = session()->getFlashdata('type');
        $msg  = session()->getFlashdata('msg');

        //if ($msg['type'] && $msg['msg']) {

            $html .= '
                <div id="msg-alert">
                    <div class="mt-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-'.$type.'">
                            <strong>'.$msg.'</strong>
                        </div>
                    </div>
                </div>
            ';
        }

        return $html;
    }
}

if (!function_exists('isInvalid')) 
{
    function isInvalid($validation_error, $key)
    {   
        $class = '';

        if (isset($validation_error[$key])) {

            $class = 'is-invalid';
        }

        return $class;
    }
}

if (!function_exists('invalidFeedback')) 
{
    function invalidFeedback($validation_error, $key)
    {   
        $html = '';

        if (isset($validation_error[$key])) {

            $html = '
                <div class="invalid-feedback">
                    '.$validation_error[$key].'
                </div>
            ';
        }

        return $html;
    }
}

if (!function_exists('clearEndSpaces')) 
{
    function clearEndSpaces($text)
    {
        $text = trim($text);
        
        return $text;
    }
}