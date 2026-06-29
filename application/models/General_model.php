<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class General_model
 *
 * @property CI_DB_query_builder $db
 */
class General_model extends CI_Model
{
	/**
	 * General_model constructor.
	 */
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
    public function set_connection($db_connection)
    {
        $this->db   = $this->load->database($db_connection, TRUE);
    }

	/**
	 * Get Data
	 */
	function get_data($table_name = "",
	                  $conditions = array(),
	                  $order_field = "",
	                  $order_type = "",
	                  $start = null,
	                  $length = null,
	                  $field_select = array(),
	                  $table_join = array(),
	                  $fied_group = array(),
	                  $escape = true)
	{
		if (!empty($table_name)) {

			if (!empty($field_select)){
				foreach ($field_select as $select) {
					$this->db->select($select, $escape);
				}
			}

			$this->_generate_condition($conditions, $escape);

			// Added: Support for Order
			if (!empty($order_field)) {
				if (is_array($order_field))
				{
					foreach ($order_field as $key => $field)
					{
						$this->db->order_by($field, $order_type[$key], $escape);
					}
				}
				else
				{
					$this->db->order_by($order_field, $order_type, $escape);
				}
			}

			if ($fied_group != '' || !empty($fied_group)) {

				if (is_array($fied_group)) {
					foreach ($fied_group as $group) {
						$this->db->group_by($group, $escape);
					}
				}else{
					$this->db->group_by($fied_group, $escape);
				}

			}

			if (!empty($table_join))
			{
				foreach ($table_join as $join)
				{
					$this->db->join($join["table"], $join["condition"], (!empty($join["type"]) ? $join["type"] : null), $escape);
				}
			}

			if ($length) {
				$this->db->limit($length, $start);
			}

			$query = $this->db->get($table_name);
			return $query;
		}

		return false;
	}

	/**
	 * Get Data
	 */
	function get_data_function($table_name = "",
	                  $conditions = array(),
	                  $order_field = "",
	                  $order_type = "",
	                  $start = null,
	                  $length = null,
	                  $field_select = array(),
	                  $table_join = array(),
	                  $fied_group = array(),
	                  $escape = true)
	{
		if (!empty($table_name)) {

			$param_select       = "";
			$param_conditions   = "";
			$param_sort         = "";
			$param_sort_type    = "";
			$param_length       = 0;
			$param_start        = 0;
			$param_join         = "";
			$param_groupby      = "";


			if (!empty($field_select)){
				$param_select   = implode(", ", $field_select);
			}

			$param_conditions   = $this->_generate_condition($conditions, $escape, true);
			$param_conditions   = !empty($param_conditions) ? implode(" AND ", $param_conditions) : "";

			// Added: Support for Order
			if (!empty($order_field)) {
				if (is_array($order_field))
				{
					foreach ($order_field as $key => $field)
					{
						/*$this->db->order_by($field, $order_type[$key], $escape);*/
					}
				}
				else
				{
					$param_sort         = $order_field;
					$param_sort_type    = $order_type;
				}
			}

			if ($fied_group != '' || !empty($fied_group)) {

				$param_groupby  .= " ";

				if (is_array($fied_group)) {
					$fied_group = implode(", ", $fied_group);
				}else{
					/*$this->db->group_by($fied_group, $escape);*/
				}

				$param_groupby  .= $fied_group." ";
			}

			if (!empty($table_join))
			{
				foreach ($table_join as $join)
				{
					$param_join .= " ".(!empty($join["type"]) ? $join["type"] : "")." JOIN ".$join["table"]." ON ".$join["condition"]." ";
					/*$this->db->join($join["table"], $join["condition"], (!empty($join["type"]) ? $join["type"] : null), $escape);*/
				}
			}

			if ($length && $start) {
				$param_length   = $length;
				$param_start    = $start;
			}

			$query  = 'CALL get_data("'.$table_name.'", "'.$param_conditions.'", "'.$param_sort.'", "'.$param_sort_type.'", '.$param_length.', '.$param_start.', "'.$param_select.'", "'.$param_join.'", "'.$param_groupby.'");';
			$query  = $this->db->query($query);


			return $query;
		}

		return false;
	}

	/**
	 *  Insert Batch Query
	 * @param string $table_name
	 * @param array $data
	 * @return int
	 */
	public function insert_batch($table_name = "", $data = array())
	{
		if (!empty($table_name) && !empty($data))
			return $this->db->insert_batch($table_name, $data);
	}

	/**
	 * Insert single row to database
	 * @param string $table_name
	 * @param array $data
	 * @return null|integer
	 */
	public function insert($table_name = "", $data = array())
	{
        if ($this->db->dbdriver != "sqlsrv"){
            /*$this->query("SET GLOBAL FOREIGN_KEY_CHECKS=0");*/
        }

		if (!empty($table_name) && !empty($data)) {

			$new_data   = array();

			foreach ($data as $field => $value)
			{
				if (is_array($value) || is_object(is_array($value))){
					$new_data[$field]   = json_encode($value);
				}else{
					$new_data[$field]   = $value;
				}
			}

			$result = $this->db->insert($table_name, $new_data);
			return ($result) ? $this->db->insert_id() : null;
		}
	}

	/**
	 * @param string $table_name
	 * @param array $conditions
	 * @param int|null $limit
	 * @return CI_DB_result|mixed|null
	 */
	public function delete($table_name = "", $conditions = array(), $limit = null, $escape = true)
	{
		if (!empty($table_name) && !empty($conditions)) {

			$this->_generate_condition($conditions, $escape);
			
			if ($limit !== null) $this->db->limit($limit);
			
			$this->db->delete($table_name);
			return $this->db->error();
		} else {
			return false;
		}
	}

	/**
	 * @param string $table_name
	 * @param array $conditions
	 * @param array $data
	 * @return bool
	 */
    public function update($table_name = "", $conditions = array(), $data = array(), $primary_key = "", $table_join = array())
    {
        if ($this->db->dbdriver != "sqlsrv"){
            /*$this->query("SET GLOBAL FOREIGN_KEY_CHECKS=0");*/
        }

        if (!empty($table_name)) {
            $this->_generate_condition($conditions);

            $new_data   = array();

            foreach ($data as $field => $value)
            {
                if (is_array($value)){
                    $new_data[$field]   = json_encode($value);
                }else{
                    $new_data[$field]   = $value;
                }
            }

            $result = $this->db->update($table_name, $new_data);

            if (!empty($primary_key)) {
                $check_data = $this->get_data($table_name, $conditions)->row();
                return $check_data->$primary_key;
            }else{
                return $result;
            }
        }
    }
    public function update_new($table_name = "", $conditions = array(), $data = array(), $primary_key = "", $table_join = array())
    {
        if ($this->db->dbdriver != "sqlsrv"){
            /*$this->query("SET GLOBAL FOREIGN_KEY_CHECKS=0");*/
        }



        if (!empty($table_name)) {
            $this->_generate_condition($conditions);

            foreach ($data as $field => $item)
            {
                $value      = is_array($item["value"]) ? json_encode($item["value"]) : $item["value"];
                $escape     = array_key_exists("escape", $item) ? $item["escape"] : null;

                /*var_dump($field);
                var_dump($value);
                var_dump($escape);
                echo "===============================================";*/

                $this->db->set($field, $value, $escape);
            }

            /*die;*/

            $result = $this->db->update($table_name);

            /*var_dump($this->db);
            die;*/

            if (!empty($primary_key)) {
                $check_data = $this->get_data($table_name, $conditions)->row();
                return $check_data->$primary_key;
            }else{
                return $result;
            }
        }
    }

	/**
	 * @param $table_name
	 * @param array $conditions
	 * @param array $data
	 * @param string $primary_key
	 * @return mixed
	 */
	public function update_dynamic($table_name, $conditions = array(), $data = array(), $primary_key = "")
	{
		$check_data = $this->get_data($table_name, $conditions)->num_rows();

		$new_data   = array();

		foreach ($data as $field => $value)
		{
			if (is_array($value)){
				$new_data[$field]   = json_encode($value);
			}else{
				$new_data[$field]   = $value;
			}
		}

		if ($check_data) {

			$this->update($table_name, $conditions, $new_data);

			if (!empty($primary_key)) {
				$check_data = $this->get_data($table_name, $conditions)->row();
				return $check_data->$primary_key;
			}
		} else {
			$this->insert($table_name, $new_data);
			return $this->db->insert_id();
		}
	}

	/**
	 * @param $table_name
	 * @param array $conditions
	 * @param array $data
	 * @param string $primary_key
	 * @return mixed
	 */
	public function update_bacth($table_name, $data = array(), $key = "")
	{
		$this->db->update_batch($table_name, $data, $key);
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function query($query)
	{
		return $this->db->query($query);
	}

	/**
	 * @return array
	 */
	public function get_errors()
	{
		return $this->db->error();
	}


	public function _generate_condition($conditions = array(), $escape = true, $query_raw = false)
	{
		if ($query_raw){
			$condition_for_raw  = array();
		}

		if (!empty($conditions)) {
			foreach ($conditions as $field => $condition) {
				if (!empty($condition[SQL_CONDITION_OPERATOR])){
					switch ($condition[SQL_CONDITION_OPERATOR])
					{
						case SQL_WHERE_EQUAL:
							$this->db->where($field, (string)$condition[SQL_CONDITION_VALUE], $escape);

							if ($query_raw){
								$condition_for_raw[]    = " ".$field." =  '".(string)$condition[SQL_CONDITION_VALUE]."' ";
							}

							break;
						case SQL_WHERE_NULL:
							$this->db->where($field." IS NULL", null, $escape);

							if ($query_raw){
								$condition_for_raw[]    = " ".$field." =  IS NULL ";
							}

							break;
						case SQL_WHERE_NOT_NULL:
							$this->db->where($field." IS NOT NULL", null, $escape);
							if ($query_raw){
								$condition_for_raw[]    = " ".$field." =  IS NOT NULL ";
							}
							break;
						case SQL_WHERE_GREATER_THAN:
							$this->db->where($field." > ", $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_GREATER_THAN:
							$this->db->where($field." > ", $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_LESS_THAN:
							$this->db->where($field." < ", $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_GREATER_EQUAL:
							$this->db->where($field." >= ", $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_LESS_EQUAL:
							$this->db->where($field." <= ", $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_NOT_EQUAL:
							$this->db->where($field." != ", $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_LIKE:
							$this->db->like($field, $condition[SQL_CONDITION_VALUE]);
							if ($query_raw){
								$condition_for_raw[]    = " ".$field." LIKE  '%".(string)$condition[SQL_CONDITION_VALUE]."%' ";
							}
							break;
						case SQL_WHERE_LIKE_BEFORE:
							$this->db->like($field, $condition[SQL_CONDITION_VALUE], "before");
							if ($query_raw){
								$condition_for_raw[]    = " ".$field." LIKE  '".(string)$condition[SQL_CONDITION_VALUE]."%' ";
							}
							break;
						case SQL_WHERE_LIKE_AFTER:
							$this->db->like($field, $condition[SQL_CONDITION_VALUE], "after");
							if ($query_raw){
								$condition_for_raw[]    = " ".$field." LIKE  '%".(string)$condition[SQL_CONDITION_VALUE]."' ";
							}
							break;
						case SQL_WHERE_NOT_LIKE:
							$this->db->not_like($field, $condition[SQL_CONDITION_VALUE], $escape);
							break;
                        case SQL_WHERE_BETWEEN:
                            if (isset($condition[SQL_CONDITION_VALUE][0]) && isset($condition[SQL_CONDITION_VALUE][1]))
                            {
                                $start  = $condition[SQL_CONDITION_VALUE][0];
                                $end    = $condition[SQL_CONDITION_VALUE][1];

                                if (strpos($start, ".") !== false && strpos($end, ".") !== false)
                                {
                                    $this->db->where($field." BETWEEN ".$condition[SQL_CONDITION_VALUE][0]." AND ".$condition[SQL_CONDITION_VALUE][1]."");
                                }
                                else
                                {
                                    $this->db->where($field." BETWEEN '".$condition[SQL_CONDITION_VALUE][0]."' AND '".$condition[SQL_CONDITION_VALUE][1]."'");
                                }


                            }
                            break;
                        case SQL_WHERE_OR_BETWEEN:
                            if (isset($condition[SQL_CONDITION_VALUE][0]) && isset($condition[SQL_CONDITION_VALUE][1]))
                            {
                                $start  = $condition[SQL_CONDITION_VALUE][0];
                                $end    = $condition[SQL_CONDITION_VALUE][1];

                                if (strpos($start, ".") !== false && strpos($end, ".") !== false)
                                {
                                    $this->db->or_where("(".$field." BETWEEN ".$condition[SQL_CONDITION_VALUE][0]." AND ".$condition[SQL_CONDITION_VALUE][1].")");
                                }
                                else
                                {
                                    $this->db->or_where("(".$field." BETWEEN '".$condition[SQL_CONDITION_VALUE][0]."' AND '".$condition[SQL_CONDITION_VALUE][1]."')");
                                }


                            }
                            break;
						case SQL_WHERE_IN:
							$this->db->where_in($field, $condition[SQL_CONDITION_VALUE], $escape);
							break;
						case SQL_WHERE_NOT_IN:
							$this->db->where_not_in($field, $condition[SQL_CONDITION_VALUE], $escape);
							break;

						case SQL_CONDITION_QUERY:
							$this->db->where($condition[SQL_CONDITION_VALUE]);

							if ($query_raw){
								$condition_for_raw[]    = $condition[SQL_CONDITION_VALUE];
							}
							break;
						case SQL_CONDITION_OR_QUERY:
							$this->db->or_where($condition[SQL_CONDITION_VALUE]);

							if ($query_raw){
								$condition_for_raw[]    = $condition[SQL_CONDITION_VALUE];
							}
							break;
						default:
							$this->db->where($condition[SQL_CONDITION_VALUE]);
					}
				}
			}
		}


		if ($query_raw){
			return $condition_for_raw;
		}
	}

}
