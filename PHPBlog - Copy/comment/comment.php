<?php
class Comment{
 
    // database connection and table name
    private $conn;
    private $table_name='comment';
 
    // object properties
    public $id_com;
    public $id_user;
    public $id_blog;
    public $content;
    public $created;
   
  
    public function __construct($db){
        $this->conn = $db;
    }
    function create($id_user,$id_blog,$content){
 
        //write query
        $query = "INSERT INTO `comment` ( `id_user`, `id_blog`, `content`) VALUES ( '$id_user', '$id_blog', '$content')";

 
        $stmt = $this->conn->prepare($query);
 
        

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
 
    }
    public function postCommentOfBlog(){

        $query = "SELECT  comment.content, comment.id_blog,comment.id_user,comment.created, users.name
            FROM comment
            INNER JOIN users ON comment.id_user = users.id_user

            WHERE comment.id_blog = ?
            ";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $_GET['id_blog']);
        $stmt->execute();
     
        
     
        return $stmt;
    }
    public function CountAllComments(){
        $query = "SELECT id_com FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
        }
}