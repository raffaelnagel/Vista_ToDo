<?php
class Todo{
		private $id;
		private $title;
		private $description;
		
		/*Constructor*/
		function Todo(){
			$this->id = null;
			$this->title = null;
			$this->description = null;
		}
		
		/*Getters & Setters*/
		
		public function getId(){
			return $this->id;
		}
		public function getTitle(){
			return $this->title;
		}
		public function getDescription(){
			return $this->description;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		public function setTitle($title){
			$this->title = $title;
		}
		public function setDescription($description){
			$this->description = $description;
		}
}
?>
