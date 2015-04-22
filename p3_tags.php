<?php
   	
   	require_once 'include/general-includes.php';
    require_once 'class/clsp3tags.php';

    $objp3tags = new p3tags();
    $condition = "";
    $p3_tags = $objp3tags->get_records($condition);

    foreach($p3_tags as $r)
    {
      if($r['positive_or_negative'] == 1)
      {
        echo "<li class='btn btn-success'><a href='#'>" . $r['tag_name']  ."</a></li>";
      }
      else if($r['positive_or_negative'] == 2)
      {
        echo "<li class='btn btn-danger'><a href='#'>" . $r['tag_name']  ."</a></li>";
      }
    }
?>