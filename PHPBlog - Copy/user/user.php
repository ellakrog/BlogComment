<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name='users';
 
    // object properties
    public $id_user;
    public $name;
    public $email;
    public $password;
    public $isAdmin;
    public $created;
  
    public function __construct($db){
        $this->conn = $db;
    }
    function create($name,$email,$password){
 
        //write query
        $query = "INSERT INTO `users` ( `name`, `email`, `password`) VALUES ( '$name', '$email', '$password')";

 
        $stmt = $this->conn->prepare($query);
 
        

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
 
    }
    public function isAdmin(){
   
        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM users WHERE email=:email and password=:password and isAdmin=1 ";

            // Prepare the statement
            $query = $this->conn->prepare($sql);
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
            // Bind parameters
           
            $query->bindParam(":email", $this->email);
            $query->bindParam(":password", $this->password);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0 ) {
                
             
                    return true;
              
                }
                else{
                    return false;
                }
            } 
            catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }
    public function login(){
   
        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM users WHERE email=:email and password=:password ";

            // Prepare the statement
            $query = $this->conn->prepare($sql);

            // Bind parameters
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
           
            $query->bindParam(":email", $this->email);
            $query->bindParam(":password", $this->password);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0 ) {
                // Verify hashed password against entered password
                
                //extract($returned_row);
                //$id = $returned_row['id_user'];
                //$query = "INSERT INTO `blogs` ( `id_user`) VALUES ('$id')";
               // $stmt = $this->conn->prepare($query);
               
                    return $returned_row;
                }
                   
                
                else{
                    return false;
                }
            }
            catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }
    

    function readOne(){
        
        
        $query = "SELECT name
            FROM " . $this->table_name . "
            WHERE id_user = ?
            LIMIT 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $_GET['id_user']);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->name = $row['name'];
       
        
    }

       
}