<?php
    require_once 'include/general-includes.php';
    require_once 'class/clsnegativetags.php';
    require_once 'class/clsp1tags.php';
    require_once 'class/clsp2tags.php';
    require_once 'class/clsp3tags.php';

    extract($_POST);

   	$objnegativetags = new negativetags();
   	$objnegativetags->tag_name = $tagname;
   	$objnegativetags->insert_record();
   	$id = mysql_insert_id();


   	if($p == 1)
   	{
   		$objp1tags = new p1tags();
	   	$objp1tags->tag_id = $id;
	    $objp1tags->tag_name = $tagname;
	    $objp1tags->positive_or_negative = 2;
	    $objp1tags->count_tags = 1;
		$objp1tags->insert_record();
	}
	else if($p == 2)
   	{
   		$objp2tags = new p2tags();
	   	$objp2tags->tag_id = $id;
	    $objp2tags->tag_name = $tagname;
	    $objp2tags->positive_or_negative = 2;
	    $objp2tags->count_tags = 1;
		$objp2tags->insert_record();
	}
	else if($p == 3)
   	{
   		$objp3tags = new p3tags();
	   	$objp3tags->tag_id = $id;
	    $objp3tags->tag_name = $tagname;
	    $objp3tags->positive_or_negative = 2;
	    $objp3tags->count_tags = 1;
		$objp3tags->insert_record();
	}
?>
