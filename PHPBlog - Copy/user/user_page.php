<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >

<?php
session_start();
if(isset($_SESSION["user"])){
//$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');
 
// include database and object files
include_once '../config/database.php';
include_once '../user/user.php';
include_once '../blog/blog.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$user = new User($db);
$blog =new Blog($db);

//$user->id_user = $id_user;



//$user ->readOne();

$total_rows=$blog->countAll();
$stmt=$blog->userBlogs();

$page_title = "userAcount";

?>

<?php
include_once '../index/headerbasic.php';
?>


<div class="page-user">
    <h1><?php echo $_SESSION['user']['name']; ?></h1>
    
</div>

 <?php

 
 include_once 'navbar.php';
 if($total_rows>0){
 
  
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<div class='card1' style='width: 68rem; position: relative;left: 360px; padding-top:15px'>";
     echo "<div class='card' style='width: 50rem;  height:600px; position: relative;left: 130px;'>";
         echo "<div class='card-body' style='width: 40rem;'>";
         echo " <h1 class='card-title'>{$city} </h1>";
      
         echo " <h5 style='position: relative;left: 500px;'class='card-title'>created: {$row['created']}</h5>";
     echo "</div>";
     echo " <img style='padding-bottom:1px' class='card-img-bottom'  src='../uploads/".$row['blog_image']."'>";

     echo "<a class='btn btn-primary' style='' href='#' role='button'>Dicover more</a>";
     echo "</div>";

    echo "</div>";
     }

    
 }else{
     echo "<div class='alert alert-danger'>No blogs found.</div>";
}
}
 ?>
    






  

