<?php
/**
 * 数据库操作类
 * Enter description here ...
 * @author Administrator
 *
 */
class DbUtil{
	
	var $dbuser;
	
	var $dbpassword;
	
	var $dbname;
	
	var $dbhost;
	
	var $dbh;
	
	var $charset;
	
	var $collate;
	
	var $rows_affected = 0;
	
	var $insert_id = 0;
	
	var $col_info;
	
	var $last_result;
	
	var $last_error = 0;
	
	var $result;
	
	var $row_nums;
	
	/**
	 * 构造函数
	 * Enter description here ...
	 * @param 主机名 $hostname
	 * @param 用户名 $username
	 * @param 密码 $password
	 * @param 数据库名 $dbname
	 */
	function DbUtil($hostname, $username, $password, $dbname){
		return $this->__construct($hostname, $username, $password, $dbname);
	}
	
	/**
	 * 构造函数
	 * Enter description here ...
	 * @param unknown_type $hostname
	 * @param unknown_type $username
	 * @param unknown_type $password
	 * @param unknown_type $dbname
	 */
	function __construct($hostname, $username, $password, $dbname){
		$this->dbhost = $hostname;
		$this->dbname = $dbname;
		$this->dbpassword = $password;
		$this->dbuser = $username;
		
		$this->init_charset();
		
		$this->db_connect();
	}
	
	/**
	 * 获取自增主键
	 * @return number
	 */
	function getInsertId(){
		return $this->insert_id;
	}
	
	/**
	 * 初始化编码
	 * Enter description here ...
	 */
	function init_charset(){
		if(defined('DB_CHARSET')){
			$this->charset = DB_CHARSET;
		}else {
			$this->charset = 'utf8';
		}
			
		if(defined('DB_COLLATE'))
			$this->collate = DB_COLLATE;
		else
			$this->collate = 'utf8_general_ci';
	}
	
	
	/**
	 * 链接数据库
	 * Enter description here ...
	 */
	function db_connect(){
		
		$this->dbh = mysql_connect($this->dbhost, $this->dbuser, $this->dbpassword);
		mysql_set_charset($this->charset, $this->dbh);
		mysql_select_db($this->dbname, $this->dbh);
	}
	
	/**
	 * 查询执行查询语句
	 * Enter description here ...
	 * @param string $sql
	 */
	function query($sql){
		
		$this->flush();
		$return_val = 0;
		$this->result = mysql_query($sql, $this->dbh);
		$this->last_error =  mysql_errno($this->dbh);
		 echo mysql_error($this->dbh);
		if ( preg_match( "/^\\s*(insert|delete|update|replace|alter) /i", $sql ) ) {
			$this->rows_affected = mysql_affected_rows( $this->dbh );
			if ( preg_match( "/^\\s*(insert|replace) /i", $sql ) ) {
				$this->insert_id = mysql_insert_id($this->dbh);
			}
			$return_val = $this->rows_affected;
		}else{
			$i = 0;
			while ( $i < mysql_num_fields( $this->result ) ) {
				$this->col_info[$i] = mysql_fetch_field( $this->result );
				$i++;
			}
			$num_rows = 0;
			while ( $row = mysql_fetch_object( $this->result ) ) {
				$this->last_result[$num_rows] = $row;
				$num_rows++;
			}
			
			$this->num_rows = $num_rows;
			$return_val     = $num_rows;
		}
		
		return $return_val;
	}
	
	/**
	 * 插入数据
	 * @param unknown_type $table 表
	 * @param unknown_type $data 数据，数据模式，以 列名->值的格式
	 * @param unknown_type $format 格式化，格式化其中的列，如将某列格式化为数字 %d
	 */
	function insert($table, $data, $format = null){
		return $this->_insert_helper($table, $data, $format, 'INSERT');
	}
	
	/**
	 * 更新一个表
	 * @param unknown_type $table 要更新的表
	 * @param unknown_type $data 数据，数组格式，以列名->值的方式
	 * @param unknown_type $where 条件语句,数组格式
	 * @param unknown_type $format 值的格式化
	 * @param unknown_type $where_format 条件语句的格式化
	 */
	function update( $table, $data, $where, $format = null, $where_format = null ) {
		if ( ! is_array( $data ) || ! is_array( $where ) )
			return false;

		$formats = $format = (array) $format;
		$bits = $wheres = array();
		foreach ( (array) array_keys( $data ) as $field ) {
			if ( !empty( $format ) )
				$form = ( $form = array_shift( $formats ) ) ? $form : $format[0];
			elseif ( isset($this->field_types[$field]) )
				$form = $this->field_types[$field];
			else
				$form = '%s';
			$bits[] = "`$field` = {$form}";
		}

		$where_formats = $where_format = (array) $where_format;
		foreach ( (array) array_keys( $where ) as $field ) {
			if ( !empty( $where_format ) )
				$form = ( $form = array_shift( $where_formats ) ) ? $form : $where_format[0];
			elseif ( isset( $this->field_types[$field] ) )
				$form = $this->field_types[$field];
			else
				$form = '%s';
			$wheres[] = "`$field` = {$form}";
		}

		$sql = "UPDATE `$table` SET " . implode( ', ', $bits ) . ' WHERE ' . implode( ' AND ', $wheres );
		return $this->query( $this->prepare( $sql, array_merge( array_values( $data ), array_values( $where ) ) ) );
	}
	
	/**
	 * 执行一条语句，并获取结果。
	 * Enter description here ...
	 * @param string $query 查询语句
	 * @param string $output 输出格式，object或数组
	 */
	function get_results( $query = null, $output = OBJECT ) {

		if ( $query )
			$this->query( $query );
		else
			return null;

		$new_array = array();
		if ( $output == OBJECT ) {
			// Return an integer-keyed array of row objects
			return $this->last_result;
		} elseif ( $output == OBJECT_K ) {
			// Return an array of row objects with keys from column 1
			// (Duplicates are discarded)
			foreach ( $this->last_result as $row ) {
				$key = array_shift( $var_by_ref = get_object_vars( $row ) );
				if ( ! isset( $new_array[ $key ] ) )
					$new_array[ $key ] = $row;
			}
			return $new_array;
		} elseif ( $output == ARRAY_A || $output == ARRAY_N ) {
			// Return an integer-keyed array of...
			if ( $this->last_result ) {
				foreach( (array) $this->last_result as $row ) {
					if ( $output == ARRAY_N ) {
						// ...integer-keyed row arrays
						$new_array[] = array_values( get_object_vars( $row ) );
					} else {
						// ...column name-keyed row arrays
						$new_array[] = get_object_vars( $row );
					}
				}
			}
			return $new_array;
		}
		return null;
	}
	
	/**
	 * 获取一行数据
	 * Enter description here ...
	 * @param unknown_type $query 查找语句
	 * @param unknown_type $output 输出格式，object或数组
	 * @param unknown_type $y 第N行
	 */
	function get_row( $query = null, $output = OBJECT, $y = 0 ) {
		if ( $query )
			$this->query( $query );
		else
			return null;

		if ( !isset( $this->last_result[$y] ) )
			return null;

		if ( $output == OBJECT ) {
			return $this->last_result[$y] ? $this->last_result[$y] : null;
		} elseif ( $output == ARRAY_A ) {
			return $this->last_result[$y] ? get_object_vars( $this->last_result[$y] ) : null;
		} elseif ( $output == ARRAY_N ) {
			return $this->last_result[$y] ? array_values( get_object_vars( $this->last_result[$y] ) ) : null;
		} else {
			$this->print_error(/*WP_I18N_DB_GETROW_ERROR*/' $db->get_row(string query, output type, int offset) -- 输出类型必须是以下类型中的一个：OBJECT, ARRAY_A, ARRAY_N'/*/WP_I18N_DB_GETROW_ERROR*/);
		}
	}
	
	/**
	 * 获取一个字段值
	 * Enter description here ...
	 * @param unknown_type $query 查询语句
	 * @param unknown_type $x 第几行
	 * @param unknown_type $y 第几列
	 */
	function get_var( $query = null, $x = 0, $y = 0 ) {
		if ( $query )
			$this->query( $query );

		// Extract var out of cached results based x,y vals
		if ( !empty( $this->last_result[$y] ) ) {
			$values = array_values( get_object_vars( $this->last_result[$y] ) );
		}

		// If there is a value return it else return null
		return ( isset( $values[$x] ) && $values[$x] !== '' ) ? $values[$x] : null;
	}
	
	
	/**
	 * 插入或替换语句
	 * Enter description here ...
	 * @param unknown_type $table
	 * @param unknown_type $data
	 * @param unknown_type $format
	 * @param unknown_type $type
	 */
	function _insert_helper($table, $data, $format = null, $type = 'INSERT'){
		if ( ! in_array( strtoupper( $type ), array( 'REPLACE', 'INSERT' ) ) )
			return false;
		$formats = $format = (array) $format;
		$fields = array_keys( $data );
		$formatted_fields = array();
		foreach ( $fields as $field ) {
			if ( !empty( $format ) )
				$form = ( $form = array_shift( $formats ) ) ? $form : $format[0];
			elseif ( isset( $this->field_types[$field] ) )
				$form = $this->field_types[$field];
			else
				$form = '%s';
			$formatted_fields[] = $form;
		}
		$sql = "{$type} INTO `$table` (`" . implode( '`,`', $fields ) . "`) VALUES ('" . implode( "','", $formatted_fields ) . "')";
		$inserSql = $this->prepare( $sql, $data );
		return $this->query( $this->prepare( $sql, $data ) );
//echo $inserSql;
//return $this->query( $inserSql );
	}
	
	
	
	/**
	 * 刷新上次查询的缓存
	 */
	function flush() {
		$this->last_result = array();
		$this->col_info    = null;
		$this->last_query  = null;
	}
	
	/**
	 * 格式化sql语句
	 * Enter description here ...
	 * @param string $query sql查询语句
	 */
	function prepare( $query = null ) {
		if ( is_null( $query ) )
			return;

		$args = func_get_args();
		array_shift( $args );
		// If args were passed as an array (as in vsprintf), move them up
		if ( isset( $args[0] ) && is_array($args[0]) )
			$args = $args[0];
		$query = str_replace( "'%s'", '%s', $query ); // in case someone mistakenly already singlequoted it
		$query = str_replace( '"%s"', '%s', $query ); // doublequote unquoting
		$query = preg_replace( '|(?<!%)%s|', "'%s'", $query ); // quote the strings, avoiding escaped strings like %%s
		array_walk( $args, array( &$this, 'escape_by_ref' ) );
		return @vsprintf( $query, $args );
	}
	
	function escape_by_ref( &$string ) {
		$string = $this->_real_escape( $string );
	}
	
	function _real_escape( $string ) {
		if ( $this->dbh )
			return mysql_real_escape_string( $string, $this->dbh );
		else
			return addslashes( $string );
	}
	
	/**
	 * 查询返回的记录数（select * from table）
	 * Enter description here ...
	 * @param unknown_type $query
	 */
	function getResultNums($query = null){
		if(is_null($query)){
			return null;
		}
		$result = @mysql_query($query, $this->dbh);
		$this->last_error =  mysql_errno($this->dbh);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}
}

?>