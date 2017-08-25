<?php
function load_module_model($model=null,$return=false,$module=null){
    $ci = &get_instance();
    if( !$module ) {
        $module = $ci->uri->segment(1);
    }

    if( !$model ){
        $model = $module;
    }

    $name = ucfirst($module).'_'.ucfirst($model).'_Model';
    $model = strtolower($model);

    if( !$name ) return FALSE;

    $model_file = MODULEPATH.DS."$module/models/".$model."_model.php";

    if ( file_exists($model_file)) {

        if( !class_exists($name) ){
            require($model_file);
        }

        if( $return ){
            $return = new $name();
            return $return;
        } else {
            $ci->$name = new $name();
        }

    }
}


function module_view($view_path=NULL,$data=array(),$display = true, $use_theme=true,$module=NULL ){
    $ci = get_instance();
    if( $display ){
        $ci->temp_view($view_path,$data,$use_theme,$module,$display);
    } else {
        return $ci->temp_view($view_path,$data,$use_theme,$module,$display);
    }


}

function module_view_file_exist($view,$module=''){
    $dir = MODULEPATH.DS."$module/views";
    $filename = "$dir/$view.html";
    return file_exists($filename);

}

function module_model_load($model=null,$module=null,$return=true){

    $ci = get_instance();
    return $ci->module_model($module,$model,$return);
}

function module_control_load($control=null,$module=null,$return=true){
    $ci = get_instance();
    return $ci->module_control_load($module,$control,$return);
}

