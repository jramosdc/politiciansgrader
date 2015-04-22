<?php
   	
   	require_once 'include/general-includes.php';
    require_once 'class/clsp1tags.php';

    $objp1tags = new p1tags();
    $condition = "";
    $p1_tags = $objp1tags->get_records($condition);

    foreach($p1_tags as $r)
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