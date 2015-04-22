<?php

	class rate
	{
		public $id;
		public $p_id;
		public $ip;
		public $rate;		
		
		public function rate()
		{
			$this->id = 0;
			$this->p_id = 0;
			$this->ip = null;
			$this->rate = null;
		}

		public function insert_record()
		{
			$query = 'INSERT INTO ' . 'rate SET ';			
			$query .= 'p_id = "' . $this->p_id . '"';			
			$query .= ', ip = "' . $this->ip . '"';			
			$query .= ', rate = "' . $this->rate . '"';
			
			mysql_query($query) or die('Error in rate class > insert_record method: ' . mysql_error());
			$id = mysql_insert_id();
		}	

		public function update_record() 
		{
			$query = 'UPDATE ' . 'rate SET ';
			$query .= 'rate = "' . $this->rate . '"';
			$query .= ' WHERE p_id = ' . $this->p_id;
			$query .= ' AND ip = "' . $this->ip . '"';

			mysql_query($query) or die('Error in rate class > update_record method: ' . mysql_error());
		}
		
		public function get_records ( $condition, $order = 'id ASC' )
		{
			$records = array();

			$query = 'SELECT * FROM ' . 'rate WHERE 1 = 1 ' . $condition . ' ORDER BY ' . $order;

			$rs = mysql_query($query) or die('Error in rate class > get_records method: ' . mysql_error());

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
				$this->p_id = (int) $record[0]['p_id'];
				$this->ip = common::get_value($record[0]['ip']);
			}
		}

		public function get_recordset ( $condition = '', $order = 'id', $order_type = 'DESC',  $start_row = 0, $offset = DEFAULT_PAGE_SIZE )
		{
			$query = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . 'rate WHERE 1 ' . $condition . ' ORDER BY ' . $order . ' ' . $order_type . ' LIMIT ' . $start_row . ', ' . $offset;
			$recordset = mysql_query($query) or die('Error in rate class > get_recordset method: ' . mysql_error());
			return $recordset;
		}

		public function count_records ($condition, $order = 'id DESC' )
		{
			$count = 0;
			$query = '';

			$query = 'SELECT COUNT(id) AS count FROM ' . 'rate WHERE 1 = 1 ' . $condition . ' ORDER BY ' . $order;

			$rs = mysql_query($query) or die('Error in rate class > count records method: ' . mysql_error());
			if ( $rs && mysql_num_rows($rs) ) 
				$count = mysql_result($rs, 0, 'count');
			mysql_free_result($rs);
			return $count;
		}
	}
?>