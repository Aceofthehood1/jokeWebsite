<?php
namespace Ijdb\Controllers;
class Author{
	private $authorsTable;

    public function __construct($authorsTable) { 
		$this->authorsTable = $authorsTable;
	}

    public function register() {

		return [
			'template' => 'registerForm.html.php',
			'variables' => [],
			'title' => 'Register author'
		];

	}

	public function registerSubmit() {
		$author = $_POST['author'];
		$author['password'] = password_hash($author['password'],PASSWORD_DEFAULT);
		$author = $this->authorsTable->insert($author);
		header('location: /joke/home');
	}


    public function login() {
		return [
			'template' => 'loginForm.html.php',
			'variables' => [],
			'title' => 'Login Page'
		];

	}

	public function loginSubmit() {
		$errorMessage = ['Incorrect Username or password'];
		$author = $_POST['author'];
		$authorName = $this->authorsTable->find('username',$author['username']);
		if(password_verify($author['username'], $authorName['username'])){
			header('location: /joke/home');
		}else{
			return [
				'template' => 'loginForm.html.php',
				'variables' => ['error' => $errorMessage[0] ],
				'title' => 'Login Page'
			];	
		}
		
	}

    public function logout() {

		
	}
}
?>