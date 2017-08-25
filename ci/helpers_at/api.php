<?php

if( !function_exists('api_get') ):
function api_get($uri=""){
    $ci = get_instance();
    $data = $ci->api_membership->get_data($uri);
    return $data;
}
endif;
?>