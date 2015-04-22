<?php
	require_once 'include/general-includes.php';
	require_once 'class/clsnegativetags.php';
	require_once 'class/clspositivetags.php';

	echo "<ul>";

	$objnegativetags = new negativetags();
    $condition = "";
    $negative_tag_names = $objnegativetags->get_records($condition);

   	foreach($negative_tag_names as $r)
    {
    	echo "<li>";
        echo "<input name='p1_negative_btn_list' type='button' class='btn btn-danger' value='$r[tag_name]'>";
        echo "</li>"; 
   	}
    
    echo "</ul>";

    echo "<ul>";

    $objpositivetags = new positivetags();
    $condition = "";
    $positive_tag_names = $objpositivetags->get_records($condition);

    foreach($positive_tag_names as $r)
    {
    	echo "<li>";
        echo "<input name='p1_positive_btn_list' type='button' class='btn btn-success' value='$r[tag_name]'>";
        echo "</li>"; 
    }
    
    echo "</ul>";
?>