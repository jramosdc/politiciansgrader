<?php

	class positivetags 
	{
		public $id;
		public $tag_name;		
		public $create_date;
		
		public function positivetags()
		{
			$this->id = 0;
			$this->tag_name = '';
			$this->create_date = '';
		}

		public function insert_record()
		{
			$query = 'INSERT INTO ' . 'positive_tags SET ';
			$query .= ' tag_name = "' . $this->tag_name . '"';
			
			mysql_query($query) or die('Error in positive tags class > insert_record method: ' . mysql_error());
			$id = mysql_insert_id();
		}	

		public function update_record ( ) 
		{
			$query = 'UPDATE ' . 'positive_tags SET ';
			$query .= 'tag_name = "' . $this->tag_name . '"';
			$query .= ' WHERE id = ' . $this->id;
			mysql_query($query) or die('Error in positive tags class > update_record method: ' . mysql_error());
		}

		public function delete_record ()
		{
			$query = 'DELETE FROM ' . 'positive_tags WHERE id = '. $this->id;
			mysql_query($query) or die('Error in positive tags class > delete_record method: ' . mysql_error());
		}
		
		public function get_records ( $condition, $order = 'id ASC' )
		{
			$records = array();

			$query = 'SELECT * FROM ' . 'positive_tags WHERE 1 = 1' . $condition . ' ORDER BY ' . $order;

			$rs = mysql_query($query) or die('Error in positive tags class > get_records method: ' . mysql_error());

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
				$this->tag_name = common::get_value($record[0]['tag_name']);
				$this->create_date = $record[0]['create_date'];
			}
		}

		public function get_recordset ( $condition = '', $order = 'id', $order_type = 'DESC',  $start_row = 0, $offset = DEFAULT_PAGE_SIZE )
		{
			$query = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . 'positive_tags WHERE 1 ' . $condition . ' ORDER BY ' . $order . ' ' . $order_type . ' LIMIT ' . $start_row . ', ' . $offset;
			$recordset = mysql_query($query) or die('Error in positive tags class > get_recordset method: ' . mysql_error());
			return $recordset;
		}
	}
?>