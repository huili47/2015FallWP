<?php
require_once '../inc/global.php';
class Friend {
	
    public static function Get($id = null){
        $sql = "SELECT * FROM Friends";
        
		if($id){
			$sql .= " WHERE Friend_id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
		
    }
    
    static public function Delete($id){
        
		$conn = GetConnection();
		$sql = "DELETE FROM Friends WHERE Friend_id = $id";
		//echo $sql;
		$results = $conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		return $error ? array ('sql error' => $error) : false;
	}
	
	static public function Blank()
	{
		return array();
	}
	
	static public function Validate($row){
			$errors = array();
			if(empty($row['Friend_id'])) $errors['Friend_id'] = "is required";
			if(empty($row['Person_id'])) $errors['Person_id'] = "is required";
			//if(strtotime($row['Birthday']) > time()) $errors['Birthday'] = "must be in the past";
			
			return count($errors) > 0 ? $errors : false ;
	}
	
	static public function Save($row){
		
	
		if( $row['id']){
			
			$sql = "UPDATE Friend "
				.	" Set Name = '$row[Name]', Friend_id='$row[Friend_id]', Users_id='$row[Person_id]' WHERE Friend_id=$row[id] ";
			
		}else{
		
				$sql = "Insert Into Friends (Friend_id, Person_id) Values('$row[Friend_id]', '$row[Person_id]')";
		}
		
		$conn = GetConnection();
	
		$results = $conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		return $error ? array ('sql error' => $error) : false;
		
		
	}
}
