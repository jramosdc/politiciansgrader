<?php

	class p1tags 
	{

		public $id;
		public $tag_id;
		public $tag_name;
		public $positive_or_negative;	
		public $count_tags;
		public $create_date;
		
		public function p1tags()
		{
			$this->id = 0;
			$this->tag_id = 0;
			$this->tag_name = '';
			$this->positive_or_negative = null;
			$this->count_tags = 0;
		}

		public function insert_record()
		{
			$query = 'INSERT INTO ' . 'p1_tags SET ';		
			$query .= ' tag_id = "' . $this->tag_id . '"';			
			$query .= ', tag_name = "' . $this->tag_name . '"';			
			$query .= ', positive_or_negative = "' . $this->positive_or_negative . '"';
			$query .= ', count_tags = "' . $this->count_tags . '"';

			mysql_query($query) or die('Error in p1tags class > insert_record method: ' . mysql_error());
			$id = mysql_insert_id();
		}	

		public function update_record ( ) 
		{
			$query = 'UPDATE ' . 'p1_tags SET ';
			$query .= 'count_tags = "' . $this->count_tags . '"';	
			$query .= ' WHERE id = ' . $this->id;
			mysql_query($query) or die('Error in p1tags class > update_record method: ' . mysql_error());
		}

		public function get_records ( $condition, $order = 'id ASC' )
		{
			$records = array();

			$query = 'SELECT * FROM ' . 'p1_tags WHERE 1 = 1' . $condition . ' ORDER BY ' . $order;

			$rs = mysql_query($query) or die('Error in p1tags class > get_records method: ' . mysql_error());

			if ( $rs && mysql_num_rows($rs) ) 
			{
				while ( $record = mysql_fetch_assoc($rs) ) 
				{
					$records[] = $record;
				}
			}
			mysql_free_result($rs);
			return $records;
		}

		public function set_properties ( $id ) 
		{
			$record = $this->get_records(' AND id = ' . (int) $id);

			if ( is_array($record) && count($record) ) 
			{

				$this->id = (int) $record[0]['id'];
				$this->tag_id = common::get_value($record[0]['tag_id']);
				$this->tag_name = common::get_value($record[0]['tag_name']);
				$this->positive_or_negative = common::get_value($record[0]['positive_or_negative']);
				$this->count_tags = common::get_value($record[0]['count_tags']);
			}
		}

		public function get_recordset ( $condition = '', $order = 'id', $order_type = 'DESC',  $start_row = 0, $offset = DEFAULT_PAGE_SIZE )
		{
			$query = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . 'p1_tags WHERE 1 ' . $condition . ' ORDER BY ' . $order . ' ' . $order_type . ' LIMIT ' . $start_row . ', ' . $offset;
			$recordset = mysql_query($query) or die('Error in p1tags class > get_recordset method: ' . mysql_error());
			return $recordset;
		}

		public function count_records ($condition, $order = 'id DESC' )
		{
			$count = 0;
			$query = '';

			$query = 'SELECT COUNT(id) AS count FROM ' . 'p1_tags WHERE 1 = 1 ' . $condition . ' ORDER BY ' . $order;

			$rs = mysql_query($query) or die('Error in p1tags class > count records method: ' . mysql_error());
			if ( $rs && mysql_num_rows($rs) ) 
				$count = mysql_result($rs, 0, 'count');
			mysql_free_result($rs);
			return $count;
		}

		public function sum_records($condition)
		{
			$sum = 0;
			$query = '';

			$query = 'SELECT SUM(count_tags) AS sum FROM ' . 'p1_tags WHERE 1 = 1 ' . $condition;

			$rs = mysql_query($query) or die('Error in p1tags class > sum records method: ' . mysql_error());
			if ( $rs && mysql_num_rows($rs) ) 
				$sum = mysql_result($rs, 0, 'sum');
			mysql_free_result($rs);
			return $sum;
		}
	}
?>