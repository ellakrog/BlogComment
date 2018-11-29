<?php
class Blog{
 
    // database connection and table name
    private $conn;
    private $table_name='blogs';
 
    // object properties
    public $id_blog;
    public $city;
    public $culture;
    public $food;
    public $lenguage;
    public $nightlife;
    public $education;
    public $people;
    public $id_user;
    public $blog_image;
    public $created;
    public function __construct($db){
        $this->conn = $db;
    }
   

    function create($city, $culture,$food, $lenguage, $nightlife, $education,$people,$id_user,$filename){
        
        //write query
        $query = "INSERT INTO `blogs` ( `city`, `culture`, `food`, `lenguage`,`nightlife`, `education`, `people`,`id_user`, `blog_image`) 
        VALUES ('$city', '$culture', '$food','$lenguage', '$nightlife', '$education','$people','$id_user','$filename')";

 
        $stmt = $this->conn->prepare($query);
       // $this->created = date('Y-m-d H:i:s');
       // $this->image=htmlspecialchars(strip_tags($this->image));
       // $date = new Datetime('now');
        $stmt->bindParam(":blog_image", $filename);
       
       // $stmt->bindValue(':created',date("Y-m-d H:i:s", time()));

        if($stmt->execute()){
            
            return true;
        }else{
            return false;
        }
 
 
    }
    
    function saveID($id){
        //select all data
        $query = "INSERT INTO `blogs` ( `id_user`) VALUES ('$id')";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function userBlogs(){

 
        $query = "SELECT *
            FROM " . $this->table_name . "
            WHERE id_user = ?
            ";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $_GET['id_user']);
        $stmt->execute();
     
        
     
        return $stmt;
    }
    
    public function readAll($from_record_num, $records_per_page){
   
 
        $query = "SELECT
                  id_blog, city, culture, food,lenguage,nightlife,education, people, id_user, blog_image, created
                    FROM
                        " . $this->table_name . "
                    ORDER BY
                    id_blog ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
               
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }
    public function countAll(){
 
        $query = "SELECT id_user FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
        }
    public function OneBlog(){
 
         
        $query = "SELECT  id_blog,city, culture,food, lenguage, nightlife, education, people,id_user,blog_image,created
        FROM " . $this->table_name . "
        WHERE id_blog = ?
        LIMIT 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $_GET['id_blog']);

    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id_blog= $row['id_blog'];
    $this->city = $row['city'];
    $this->culture = $row['culture'];
    $this->food = $row['food'];
    $this->lenguage = $row['lenguage'];
    $this->nightlife = $row['nightlife'];
    $this->education = $row['education'];
    $this->people = $row['people'];
    $this->id_user = $row['id_user'];
    $this->created = $row['created'];
    $this->blog_image = $row['blog_image'];

        }
    
       
 
}