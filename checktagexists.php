<?php
    require_once 'include/general-includes.php';
    require_once 'class/clsnegativetags.php';
    require_once 'class/clspositivetags.php';

    extract($_POST);

   	$objnegativetags = new negativetags();
    $condition = " AND tag_name = '$tagname' ";

   	$negative_tag = $objnegativetags->get_records($condition);

    if(count($negative_tag) > 0)
    {
    	echo '1';
    }
    else
    {
    	$objpositivetags = new positivetags();
    	$condition = " AND tag_name = '$tagname' ";

   		$positive_tag = $objpositivetags->get_records($condition);

   		if(count($positive_tag) > 0)
   		{
   			echo '1';
   		}
   		else
   		{
   			echo '0';
   		}
    }
?>