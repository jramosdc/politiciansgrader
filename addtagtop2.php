<?php
    require_once 'include/general-includes.php';
    require_once 'class/clsnegativetags.php';
    require_once 'class/clspositivetags.php';
    require_once 'class/clsp2tags.php';

    extract($_POST);

    $btnval;
    $p_n;

    if($p_n == 2)
    {
    	$objnegativetags = new negativetags();
    	$condition = " AND tag_name = '$btnval' ";

    	$negative_tag = $objnegativetags->get_records($condition);

    	if(count($negative_tag) > 0)
    	{
    		$objp2tags = new p2tags();

    		$condition = " AND tag_id = " . $negative_tag[0]['id'] . " AND positive_or_negative = 2";
    		if($objp2tags->count_records($condition) > 0)
    		{
    			$rec = $objp2tags->get_records($condition);
				
				$id = $rec[0]['id'];
				$objp2tags->set_properties($id);
				$objp2tags->count_tags = $objp2tags->count_tags + 1;

				$objp2tags->update_record();
    		}
    		else
    		{
    			$objp2tags->tag_id = $negative_tag[0]['id'];
    			$objp2tags->tag_name = $negative_tag[0]['tag_name'];
    			$objp2tags->positive_or_negative = 2;
    			$objp2tags->count_tags = 1;

    			$objp2tags->insert_record();
    		}
    	}
    }
    else if($p_n == 1)
    {
        $objpositivetags = new positivetags();
        $condition = " AND tag_name = '$btnval' ";

        $positive_tag = $objpositivetags->get_records($condition);

        if(count($positive_tag) > 0)
        {
            $objp2tags = new p2tags();

            $condition = " AND tag_id = " . $positive_tag[0]['id'] . " AND positive_or_negative = 1";
            if($objp2tags->count_records($condition) > 0)
            {
                $rec = $objp2tags->get_records($condition);
                
                $id = $rec[0]['id'];
                $objp2tags->set_properties($id);
                $objp2tags->count_tags = $objp2tags->count_tags + 1;

                $objp2tags->update_record();
            }
            else
            {
                $objp2tags->tag_id = $positive_tag[0]['id'];
                $objp2tags->tag_name = $positive_tag[0]['tag_name'];
                $objp2tags->positive_or_negative = 1;
                $objp2tags->count_tags = 1;

                $objp2tags->insert_record();
            }
        }
    }
?>