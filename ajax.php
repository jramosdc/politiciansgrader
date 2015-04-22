<?php
    require_once 'include/general-includes.php';
    require_once 'class/clsrate.php';

    extract($_POST);
    $user_ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_COOKIE['PCounterLikeDislike'."_".$p_id]))
    {
        
    }
    else
    {
        $objrate = new rate();
        
        if($act == 'like'): 
            $objrate->p_id = $p_id;
            $objrate->ip = $user_ip;
            $objrate->rate = 1;

            $objrate->insert_record();
            $id = mysql_insert_id();

            $expire = time() + 60 * 60 * 24 * 30;
            setcookie("PCounterLikeDislike"."_".$p_id, $id, $expire);
        endif;

        if($act == 'dislike'):
            $objrate->p_id = $p_id;
            $objrate->ip = $user_ip;
            $objrate->rate = 2;

            $objrate->insert_record();
            $id = mysql_insert_id();

            $expire = time() + 60 * 60 * 24 * 30;
            setcookie("PCounterLikeDislike"."_".$p_id, $id, $expire);
        endif;
    }
?>