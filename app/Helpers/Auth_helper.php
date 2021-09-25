<?php 

    function auth_user()
    {
        if(session()->has('loggedUser')){

            return session()->get('loggedUser');
        }else{
            return false;
        }
    }

    function auth_check()
    {
        if(session()->has('loggedUser')){
            return true;
        }else{
            return false;
        }
    }

?>