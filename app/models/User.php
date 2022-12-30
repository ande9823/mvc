<?php
class User extends Database {
	
	/**
	 * Checks if a username and password is correct.
	 * The Session variable that remembers the login is set in the UserController
	 */
	public function login(){
		
		//$email = filter_var ( $_POST['email'], FILTER_UNSAFE_RAW);
		$username = filter_var ( $_POST['username'], FILTER_UNSAFE_RAW);
        $password = filter_var ( $_POST['password'], FILTER_UNSAFE_RAW);
        
		
		
		//$result = $this->select_one ("user", "email", $email);
        $result = $this->select_one ("user", "username", $username);
/*
		$sql = "SELECT email, password FROM user WHERE email = :email";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$result = $stmt->fetch(); //fetchAll would get multiple rows
*/		
		return password_verify($password, $result['password']);

	}

	/**
	 * Registers a new user in the database
	 */
	public function register() {

		$email = filter_var ( $_POST['email'], FILTER_UNSAFE_RAW);
        $username = filter_var ( $_POST['username'], FILTER_UNSAFE_RAW);
		$password = filter_var ( $_POST['password'], FILTER_UNSAFE_RAW);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password);";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $hashed_password);
		$stmt->execute();

		return $email;

	}

	/**
	 * Gets all users from the database, but without revealing their password hash
	 */
	public function get_users () {
		$sql = "SELECT user_id, email, username FROM user";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Gets a single user from the database
	 */
	public function get_user ($user_id) {

		$sql = "SELECT user_id, email FROM user WHERE user_id = :user_id";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
    
    
    /**
	 * Uploades image to images from the database
	 */
    public function upload() {
        // If file upload form is submitted 
            if(!empty($_FILES["image"]["name"])) { 
                // Get file info 
                $fileName = basename($_FILES["image"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                
                // Allow certain file formats 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['image']['tmp_name']; 
                    
                    //this makes a blob to upload to a database
                    $image = file_get_contents($image);
                    
                    //$image = base64_encode($image); 
                    //seems like this by itself only gives a path to a temp_file (when decoded)
                    
                    
                    // Insert image content into database 
                    //CHANGE username SO IT FITS WITH USER
                    $username = "test";
		            $title = filter_var ( $_POST['title'], FILTER_UNSAFE_RAW);
                    $description = filter_var ( $_POST['description'], FILTER_UNSAFE_RAW);
        
        
                    $sql = "INSERT INTO images (username, title, image, description) VALUES (:username, :title, :image, :description);";

                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':image', $image);
                    $stmt->bindParam(':description', $description);
                    $stmt->execute();
                    
                    
                    $statusMsg = "File uploaded successfully."; 
                }else{ 
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                } 
            }else{ 
                $statusMsg = 'Please select an image file to upload.'; 
            }  
 
        // Display status message 
        echo $statusMsg; 
    }
    
    public function feed() {
        $sql = "SELECT username, title, image, description FROM images";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
