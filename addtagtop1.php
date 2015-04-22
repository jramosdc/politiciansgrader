<?php
    require_once 'include/general-includes.php';
    require_once 'class/clsnegativetags.php';
    require_once 'class/clspositivetags.php';
    require_once 'class/clsp1tags.php';

    extract($_POST);

    if($p_n == 2)
    {
    	$objnegativetags = new negativetags();
    	$condition = " AND tag_name = '$btnval' ";

    	$negative_tag = $objnegativetags->get_records($condition);

    	if(count($negative_tag) > 0)
    	{
    		$objp1tags = new p1tags();

    		$condition = " AND tag_id = " . $negative_tag[0]['id'] . " AND positive_or_negative = 2";
    		if($objp1tags->count_records($condition) > 0)
    		{
    			$rec = $objp1tags->get_records($condition);
				
				$id = $rec[0]['id'];
				$objp1tags->set_properties($id);
				$objp1tags->count_tags = $objp1tags->count_tags + 1;

				$objp1tags->update_record();
    		}
    		else
    		{
    			$objp1tags->tag_id = $negative_tag[0]['id'];
    			$objp1tags->tag_name = $negative_tag[0]['tag_name'];
    			$objp1tags->positive_or_negative = 2;
    			$objp1tags->count_tags = 1;

    			$objp1tags->insert_record();
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
            $objp1tags = new p1tags();

            $condition = " AND tag_id = " . $positive_tag[0]['id'] . " AND positive_or_negative = 1";
            if($objp1tags->count_records($condition) > 0)
            {
                $rec = $objp1tags->get_records($condition);
                
                $id = $rec[0]['id'];
                $objp1tags->set_properties($id);
                $objp1tags->count_tags = $objp1tags->count_tags + 1;

                $objp1tags->update_record();
            }
            else
            {
                $objp1tags->tag_id = $positive_tag[0]['id'];
                $objp1tags->tag_name = $positive_tag[0]['tag_name'];
                $objp1tags->positive_or_negative = 1;
                $objp1tags->count_tags = 1;

                $objp1tags->insert_record();
            }
        }
    }
?>