<?php
   	
   	require_once 'include/general-includes.php';
    require_once 'class/clsp2tags.php';

    $objp2tags = new p2tags();
    $condition = "";
    $p2_tags = $objp2tags->get_records($condition);

    foreach($p2_tags as $r)
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