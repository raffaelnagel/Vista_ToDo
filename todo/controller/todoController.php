<?php

	require_once 'model/todoService.php';

	class TodoController{
		
		public function redirect($location) {
			header('Location: '.$location);
		}
		
		public function handleRequest() {
			$op = isset($_GET['op'])?$_GET['op']:NULL;
			try {
				if (!$op || $op == 'list' ) {
					$this->listTodo();
				} elseif ( $op == 'new' ) {
					$this->newTodo();
				} elseif ( $op == 'delete' ) {
					$this->deleteTodo();
				} elseif ( $op == 'update' ) {
					$this->updateTodo();
				} else {
					$this->showError("Page not found", "Page for operation ".$op." was not found!");
				}
			} catch ( Exception $e ) {
				// some unknown Exception got through here, use application error page to display it
				$this->showError("Application error", $e->getMessage());
			}
		}
		
		public function showError($title, $message) {
			include 'view/error.php';
		}
		
		public function listTodo() {
			$items = TodoService::listAll();
			include 'view/todo-list.php';
			
			if ( isset($_POST['form-submitted']) ) {
				
				$title       = isset($_POST['title'])      ?   $_POST['title']      :NULL;
				$description = isset($_POST['description'])?   $_POST['description']:NULL;
				
				try {
					TodoService::insertItem($title, $description);
					$this->redirect('index.php');
					return;
				} catch (ValidationException $e) {
					$errors = $e->getErrors();
				}
			}			
		}
		
		public function newTodo() {
       
			$title = 'Add new To Do Item';
			
			$title = '';
			$description = '';
		   
			$errors = array();
			
			if ( isset($_POST['form-submitted']) ) {
				
				$title       = isset($_POST['title'])      ?   $_POST['title']      :NULL;
				$description = isset($_POST['description'])?   $_POST['description']:NULL;
				
				try {
					TodoService::insertItem($title, $description);
					$this->redirect('index.php');
					return;
				} catch (ValidationException $e) {
					$errors = $e->getErrors();
				}
			}			
			include 'view/todo-new.php';
		}
		
		public function deleteTodo() {
			$id = isset($_GET['id'])?$_GET['id']:NULL;
			if ( !$id ) {
				throw new Exception('Internal error.');
			}
			
			TodoService::deleteItem($id);
			
			$this->redirect('index.php');
		}
		
		public function updateTodo() {
       
			$title = 'Update To Do Item';
			
			$id = isset($_GET['id'])?$_GET['id']:NULL;
			if ( !$id ) {
				throw new Exception('Internal error.');
			}
			
			$obj = TodoService::getById($id);
			$title = $obj->getTitle();
			$description = $obj->getDescription();
		   
			$errors = array();
			
			if ( isset($_POST['form-submitted']) ) {
				
				$title       = isset($_POST['title'])      ?   $_POST['title']      :NULL;
				$description = isset($_POST['description'])?   $_POST['description']:NULL;
				
				try {
					TodoService::updateItem($id, $title, $description);
					$this->redirect('index.php');
					return;
				} catch (ValidationException $e) {
					$errors = $e->getErrors();
				}
			}			
			include 'view/todo-new.php';
		}
		
	}

?>
