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
/*
    public function upload() {
		$path = "/app/models/testimages/pokeball.jpg";
        $imagedata = file_get_contents($path);
        if ($imagedata !== false) {
            $image_blob = 'data:image/jpg;base64,'.base64_encode($imagedata);
        } else {
            $image_blob = "";
            echo "file_get_contents doesn't work in getting the image data";
        }
        echo "</br> path = ".$path." & imagedata = ".$imagedata." & base64 = ".$image_blob."";
*/
        /*
        $image = filter_var ( $_POST['image'], FILTER_UNSAFE_RAW);
        $image_content = file_get_contents($image);
        $base64 = base64_encode($image_content);
        */
/*
        $user_id = 1;
		$title = filter_var ( $_POST['title'], FILTER_UNSAFE_RAW);
        
        ////$image = filter_var ( $_POST['image'], FILTER_UNSAFE_RAW);
        
        //$image_blob = fopen($image, 'rb');
        //$image_blob = file_get_contents($image);
        
        ////$image_blob = base64_encode($image);
        ////echo "image = ".$image." & image_content = ".$image_blob."";
		
        $description = filter_var ( $_POST['description'], FILTER_UNSAFE_RAW);
        
        //$path = pathinfo($_FILES["image"]["name"]);
        //$extension = $path['extension'];
        //$fileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        $sql = "INSERT INTO images (user_id, title, image, description) VALUES (:user_id, :title, :image, :description);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        //$stmt->bindParam(':image', $image);
        $stmt->bindParam(':image', $image_blob);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        
        //return $image_id;
	}
*/

    public function feed() {
        $sql = "SELECT username, title, image, description FROM images";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
        /**
	 * Uploades image to images from the database
	 */
/*
    public function upload() {
		/*
        $path = "/public/assets/fish.jpg";
        $imagedata = file_get_contents($path);
        if ($imagedata !== false) {
            $image_blob = 'data:image/jpg;base64,'.base64_encode($imagedata);
        } else {
            $image_blob = base64_encode($imagedata);
        }
        echo "imagedata = ".$imagedata." & base64 = ".$image_blob."";
        */
/*
        $target_dir = "/app/models/testimages/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
*/
        /*
        ////$image = filter_var ( $_POST['image'], FILTER_UNSAFE_RAW);
        //$image_blob = fopen($image, 'rb');
        //$image_blob = file_get_contents($image);
        ////$image_blob = base64_encode($image);
        ////echo "image = ".$image." & image_content = ".$image_blob."";
		
        $path = pathinfo($_FILES["image"]["name"]);
        $extension = $path['extension'];
        
        $fileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        */
        
        /*
        $user_id = 1;
		$title = filter_var ( $_POST['title'], FILTER_UNSAFE_RAW);
        $description = filter_var ( $_POST['description'], FILTER_UNSAFE_RAW);
        
        
        $sql = "INSERT INTO images (user_id, title, image, description) VALUES (:user_id, :title, :image, :description);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        //$stmt->bindParam(':image', $image);
        $stmt->bindParam(':image', $image_blob);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        */
//	}
    
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
                    
                    //These following two go independently, but don't get decoded properly (giant string if used with base64_encode, but somewhat shorter if used alone)
                    //$image = addslashes(file_get_contents($image));
                    //$image = file_get_contents($image);
                    
                    //$image = fopen($image, 'rb'); //seems to only have some form of image?
                    
                    $image = base64_encode($image); //seems like this by itself only gives a path to a temp_file (best for now)
                    
                    //$image = mysql_real_escape_string($image); //This don't work at all
                    
                    
                    // Insert image content into database 
                    /*CHANGE username SO IT FITS WITH USER*/
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
        //} 
 
        // Display status message 
        echo $statusMsg; 
    }
}
