<?php
require_once '../inc/global.php';
class Person {
    public static function Get($id = null){
        $sql = "SELECT * FROM Persons";
        
		if($id){
			$sql .= " WHERE persons_id= $id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
		
    }
    
    static public function Delete($id)
	{
		$conn = GetConnection();
		$sql = "DELETE FROM Persons WHERE persons_id = $id";
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
	
		static public function Validate($row)
		{
			$errors = array();
	     	if(empty($row['Name'])) $errors['Name'] = "is required";
			if(empty($row['Age'])) $errors['Age'] = "is required";
			if(empty($row['Height'])) $errors['Height'] = "is required";
			if(empty($row['Weight'])) $errors['Weight'] = "is required";
			return count($errors) > 0 ? $errors : false ;
		}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
		   if( !empty($row['id'])){
			
		    	$sql = "Update Persons set Name='$row[Name]',  Age='$row[Age]', Height='$row[Height]', Weight='$row[Weight]', Avatar='$row[Avatar]', Status='offline' WHERE id= $row[id]";
			
	     	}else{
		
			$sql = "Insert Into Persons (Name, Age, Height, Weight, Avatar, Status) Values ( '$row[Name]', '$row[Age]', '$row[Height]', '$row[Weight]', '$row[Avatar]', 'offline' )";
		}
		
			
			
			//my_print( $sql );
			
			$results = $conn->query($sql);
			$error = $conn->error;
			
			if(!$error && empty($row['id'])){
				$row['id'] = $conn->insert_id;
			}
			
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}
}
