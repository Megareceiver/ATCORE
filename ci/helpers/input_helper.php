<?php

function post_edit($str = NULL)
{
    $inputs = $_POST;
    $input_filter = array();

    $id = 0;
    if (! empty($inputs))
        foreach ($inputs as $key => $value) {
            if (strpos($key, $str) === 0) {
                $id = $value;
                if ($value) {
                    $id = str_replace($str, NULL, $key);
                }
            }
        }
    return $id;
}

if (! function_exists('input_val')) {

    function input_val($name)
    {
        global $ci;
        $val = NULL;
        if ($ci->input->post($name)) {
            $val = $ci->input->post($name);
        } else
            if ($ci->input->get($name)) {
                $val = $ci->input->get($name);
            }
        return $val;
    }
}

if (! function_exists('input_post')) {

    function input_post($name)
    {
        global $ci;
        $val = NULL;
        if ($ci->input->post($name)) {
            $val = $ci->input->post($name);
        }
        return $val;
    }
}

if (! function_exists('input_get')) {

    function input_get($name)
    {
        global $ci;
        $val = NULL;

        if ($ci->input->get($name)) {
            $val = $ci->input->get($name);
        }
        return $val;
    }
}