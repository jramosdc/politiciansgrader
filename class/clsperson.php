<?php

	class person 
	{

		public $id;
		public $name;
		public $image;		
		public $create_date;
		
		public function person()
		{
			$this->id = 0;
			$this->name='';
			$this->image='';
			$this->create_date = date('Y-m-d', time());
		}


		public function insert_record()
		{
			$query = 'INSERT INTO ' . 'person SET ';			
			$query .= 'name = "' . $this->name . '"';			
			$query .= ', image = "' . $this->image . '"';			
			$query .= ', create_date = "' . $this->create_date . '"';
			
			mysql_query($query) or die('Error in person class > insert_record method: ' . mysql_error());
			$id = mysql_insert_id();
		}	

		public function update_record ( ) 
		{
			$query = 'UPDATE ' . 'person SET ';
			$query .= 'name = "' . $this->name . '"';			
			$query .= ', image = "' . $this->image . '"';			
			$query .= ' WHERE id = ' . $this->id;
			mysql_query($query) or die('Error in person class > update_record method: ' . mysql_error());
		}

		public function delete_record ()
		{
			$query = 'DELETE FROM ' . 'person WHERE id = '. $this->id;
			mysql_query($query) or die('Error in person class > delete_record method: ' . mysql_error());
		}
		
		public function get_records ( $condition, $order = 'id ASC' )
		{
			$records = array();

			$query = 'SELECT * FROM ' . 'person WHERE 1 = 1' . $condition . ' ORDER BY ' . $order;

			$rs = mysql_query($query) or die('Error in person class > get_records method: ' . mysql_error());

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
				$this->name = common::get_value($record[0]['name']);
				$this->image = common::get_value($record[0]['image']);
			}
		}

		public function get_recordset ( $condition = '', $order = 'id', $order_type = 'DESC',  $start_row = 0, $offset = DEFAULT_PAGE_SIZE )
		{
			$query = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . 'person WHERE 1 ' . $condition . ' ORDER BY ' . $order . ' ' . $order_type . ' LIMIT ' . $start_row . ', ' . $offset;
			$recordset = mysql_query($query) or die('Error in person class > get_recordset method: ' . mysql_error());
			return $recordset;
		}
	}
?>