<?php

class JQGridFilterUtil {
	
	static $STRING = "String";
	
	static $FLOAT = "Float";
	
	static $DATE = "Date";

	static function toSqlWhere ($filtersStr,$config){
		if($filtersStr == null || "" == $filtersStr){
			return null;
		}
		
		//$filters = json_decode($filtersStr);
		$filters = json_decode(str_replace("\\\"","\"",$filtersStr));
		
		if($filters == null){
			return null;
		}else{
			$groupOp = $filters->groupOp;
			$rules = $filters->rules;
			if($rules == null){
				return null;
			}
			
			$where = "";
			if( count($rules) >= 1){
				$rule = $rules[0];
				$exp = JQGridFilterUtil::getExp($rule->field,$rule->op,$rule->data,$config[$rule->field]);
				if($exp != null){
					$where = $exp;
				}
			}

			for ($index = 1; $index < count($rules); $index++){
					
				$rule = $rules[$index];
				$exp = JQGridFilterUtil::getExp($rule->field,$rule->op,$rule->data,$config[$rule->field]);
				if($exp != null){
					$where = $where." $groupOp ".$exp;
				}
			}
			
			return $where;
		}
	}
	
	static function getExp($field,$op,$val,$type){
		if(JQGridFilterUtil::$STRING == $type && $val != null && $val != ""){
			if($op == "cn"){
				return "$field like '%$val%'";
			}else if("eq" == $op){
				return "$field = '$val'";
			}else if("ne" == $op){
				return "$field != '$val'";
			}else{
				return null;
			}
		}elseif(JQGridFilterUtil::$FLOAT == $type){
			$syn = "=" ;
			if("eq" == $op){
				$syn = "=";
			}elseif("ne" == $op){
				$syn = "!=";
			}elseif("lt" == $op){
				$syn = "<";
			}elseif("le" == $op){
				$syn = "<=";
			}elseif("gt" == $op){
				$syn = ">";
			}elseif("ge" == $op){
				$syn = ">=";
			}
			return "$field $syn $val";
		}elseif(JQGridFilterUtil::$DATE == $type){
			$syn = ">";
			if("eq" == $op){
				return "DATE_FORMAT($field,'%Y-%m-%d') = '$val'";
			}elseif("ne" == $op){
				return "DATE_FORMAT($field,'%Y-%m-%d') != '$val'";
			}elseif("lt" == $op){
				$syn = "<";
			}elseif("gt" == $op){
				$syn = ">";
			} 
			return "$field $syn str_to_date('$val','%Y-%m-%d')";
		}
	}
}
