<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >
<link rel="stylesheet" href="home.css" >

<?php
session_start();
if(isset($_SESSION["user"])){
//$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');
 
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


//$user->readOne();

$stmt=$blog ->readAll($from_record_num, $records_per_page);
$page_url = "home.php?";


$total_rows=$blog->countAll();

include_once '../index/headerbasic.php';
?>
<div class="page-user">
    <h1><?php echo $page_title ; ?></h1>
    
</div>

<ul class="nav justify-content-end">
        <li>
        <?php
            echo "<a class='nav-link active' href='../user/user_page.php?id_user={$_SESSION["user"]["id_user"]}'>Your Profile</a>";
        ?>
        </li>
       
 </ul>

<?php

include_once '../blog/allBlogs.php';

?>
<br>

<div style="width: 50rem;  height:600px; position: relative;left: 490px; padding-top:50px" class="paging">

<?php

include_once '../paging/paging.php';
}else{
    echo "Please login to comment!";
}
?>

</div>