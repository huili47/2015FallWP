<?php
require_once '../inc/global.php';
class Meal {
    public static function Get($id = null){
        $sql = "SELECT * FROM Meals";
        
		if($id){
			$sql .= " WHERE meals_id= $id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
		
    }
    
    static public function Delete($id)
	{
		$conn = GetConnection();
		$sql = "DELETE FROM Meals WHERE meal_id = $id";
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
		   	if(empty($row['Calories'])) $errors['Calories'] = "is required";
			if(empty($row['MealType'])) $errors['MealType'] = "is required";
			return count($errors) > 0 ? $errors : false ;
		}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
		//	$row2['Birthday'] = date( 'Y-m-d H:i:s', strtotime( $row2['Birthday'] ) );
			if (!empty($row['meals_id'])) {
				$sql = "Update Meals Set Name ='$row2[Name]',Calories = '$row[Calories], MealType = '$row[MealType] WHERE meals_id = $row2[meal_id]";
			}else{
				$sql = "INSERT INTO Meals(Name, Calories, MealType) VALUES ('$row2[Name]', '$row2[Calories]', '$row[MealType]',Now() ) ";				
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
