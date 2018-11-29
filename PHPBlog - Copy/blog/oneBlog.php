<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >
<link rel="stylesheet" href="home.css" >

<?php
session_start();
if(isset($_SESSION["user"])){
//$id_user= isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');

// include database and object files
include_once '../config/database.php';
include_once '../user/user.php';
include_once '../blog/blog.php';
include_once '../paging/core.php';
include_once '../comment/comment.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 

// prepare objects
$user = new User($db);
$blog =new Blog($db);
$comment=new Comment($db);

$page_title = "Blogs";

$user ->readOne();
$blog->OneBlog();

$id_blog=$blog->id_blog;

$stmt=$comment->postCommentOfBlog();
$total=$comment->CountAllComments();

include_once '../index/headerbasic.php';
    
//$id_user=$blog->id_user;

?>
<div class="page-user">
    <h1><?php echo $page_title ; ?></h1>
   
</div>

<ul class="nav justify-content-end">
        <li>
        <?php
            echo "<a class='nav-link ' href='../user/user_page.php?id_user={$_SESSION["user"]["id_user"]}'>Your Profile</a>";
        ?>
        </li>
       
 </ul>
 
 
<?php
    echo "<div class='card1' style='width: 68rem; position: relative;left: 360px; padding-top:15px'>";
        echo "<div class='card' style='width: 50rem;  height:600px; position: relative;left: 130px;'>";
            echo "<div class='card-body' style='width: 40rem;'>";
            echo " <h1 class='card-title'>{$blog->city} </h1>";
            echo " <h5>Created by: {} </h5>";//trebam staviti join i povuci iz base
            echo " <h5 style='position: relative;left: 500px;'class='card-title'>created: {$blog->created}</h5>";
            echo "</div>";
        echo " <img style='padding-bottom:1px' class='card-img-bottom'  src='../uploads/".$blog->blog_image."'>";
       
        echo "</div>";
        echo " <h3 class='card-title'>Culture: </h1>";
        echo " <h5 style='position: relative;left: 10px;'class='card-title'>{$blog->culture}</h5><br>";
        
        echo " <h3 class='card-title'>Food: </h1>";
        echo " <h5 style='position: relative;left: 10px;'class='card-title'>{$blog->food}</h5><br>";

        echo " <h3 class='card-title'>Lenguage: </h1>";
        echo " <h5 style='position: relative;left: 10px;'class='card-title'>{$blog->lenguage}</h5><br>";

        echo " <h3 class='card-title'>Night Life: </h1>";
        echo " <h5 style='position: relative;left: 10px;'class='card-title'>{$blog->nightlife}</h5><br>";

        echo " <h3 class='card-title'>Education: </h1>";
        echo " <h5 style='position: relative;left: 10px;'class='card-title'>{$blog->education}</h5><br>";

        echo " <h3 class='card-title'>People: </h1>";
        echo " <h5 style='position: relative;left: 10px;'class='card-title'>{$blog->people}</h5><br>";

       echo "</div>";
       


    
     ?>
     <div class="comment">
     <?php
     include_once '../comment/postComOfoneID.php'
     ?>

     </div>
<?php
include_once '../comment/add_comment.php';

include_once '../comment/comform.php';

 }
  ?>
