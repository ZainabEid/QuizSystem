<?php

    if ( ! function_exists('display_error')){
        function display_error($validation, $field)
        {
            if($validation->hasError($field)){

                return $validation->getError($field);
            }else{
                return false;
            }
        }
    }

?>