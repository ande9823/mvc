<?php

class UserController extends Controller {
	
	public function index ($param) {
		echo 'user index function not implemented';
	}
	
    public function register () {
        if($this->method('post')) {
            $username = $this->model('User')->register();
            header('Location: /user/login');
        } else {
            $this->view('user', 'registration');
        }
    }

    public function login() {
        if($this->method('post')) {
            if($this->model('User')->login()) {
                $_SESSION['logged_in'] = true;
                header('Location: /');
            } else {
                echo 'wrong username or password';
            }
        } else {
            $this->view('user', 'login');
        }
	}
	
	public function logout() {
        session_unset();
		header('Location: /');	
	}

    //link to user/table.php - userlist
    public function all_users () {
        if($this->logged_in()) {
            $viewbag['users'] = $this->model('user')->get_users();
            $this->view('user', 'table', $viewbag);
        } else {
			header('Location: /user/login');
		}
    }
    
    //link to user/upload.php
    public function upload() {
        if($this->logged_in()) {
			$this->view('user', 'upload');
		} else {
			header('Location: /user/login');
		}
    }
	
    //link
    public function feed () {
		if($this->logged_in()) {
			$this->view('user', 'feed');
		} else {
			header('Location: /user/login');
		}
	}
}