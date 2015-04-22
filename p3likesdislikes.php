<?php
   	
   	require_once 'include/general-includes.php';
    require_once 'class/clsrate.php';

    $objrate = new rate();
    
    $condition = ' AND p_id = 3 AND rate = 1 ';
    $p3likes = $objrate->count_records($condition);
   
   	$condition = ' AND p_id = 3 AND rate = 2 ';
   	$p3dislikes = $objrate->count_records($condition);

    echo "<div class='left'><img  src='images/like-icon.png'  alt='Like'>";
    echo "(" . $p3likes . ")";
    echo "</div>";

    echo "<div class='right'><img src='images/unlike-icon.png' alt='Unlike'>";
    echo "(" . $p3dislikes . ")";
    echo "</div>";
?>