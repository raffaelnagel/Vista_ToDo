<?php

	require_once 'model/todoClass.php';
	require_once 'model/connectionClass.php';
	
	
	class TodoService{
		
		public static function listAll(){
			$connection = new Connection(); 
			$query = "SELECT * FROM todo ORDER BY id asc"; 
			$results = $connection->mysql->query($query); 
			 
			$items = array();  
			if($results->num_rows) { 				
				while($row = $results->fetch_object()) { 
					$obj = new Todo();
					
					$obj->setId($row->id); 
					$obj->setTitle($row->title);
					$obj->setDescription($row->description);
					
					$items[] = $obj;
				}
			}			
			return $items;
		}
		
		public static function getById($id){
			
			$connection = new Connection(); 
			
			$getId = $connection->mysql->real_escape_string($id);
			$query = "SELECT * FROM todo WHERE id = {$getId}"; 
			$results = $connection->mysql->query($query); 
			  
			if($results->num_rows){
				while($row = $results->fetch_object()) { 
					$obj = new Todo();
					
					$obj->setId($row->id); 	
					$obj->setTitle($row->title); 
					$obj->setDescription($row->description); 					
				}
			}			
						
			return 	$obj;
		}
		
		public static function updateItem($id, $newTitle, $newDescription){
			$connection = new Connection(); 
			
			$updateId = $connection->mysql->real_escape_string($id);
			
			$newTitle = $connection->mysql->real_escape_string($newTitle);
			$newDescription = $connection->mysql->real_escape_string($newDescription); 
			
			$query = "UPDATE todo SET title = '{$newTitle}' , description = '{$newDescription}' WHERE id = {$updateId}"; 
			
			if ($connection->mysql->query($query) === TRUE) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public static function deleteItem($id){						
			$connection = new Connection(); 
			
			$deleteId = $connection->mysql->real_escape_string($id);
			$query = "DELETE FROM todo WHERE id = {$id}"; 
			
			if ($connection->mysql->query($query) === TRUE) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public static function insertItem($title,$description){
			$connection = new Connection(); 
			
			$query = "INSERT INTO todo(title,description) Values('{$title}' , '{$description}')"; 
			
			if ($connection->mysql->query($query) === TRUE) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}

?>
