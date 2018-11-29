<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >
<link rel="stylesheet" href="blog.css" >
<?php
session_start();
if(isset($_SESSION["user"])){
// get ID of the user 
//$id=htmlspecialchars($_GET['id_user'], ENT_QUOTES);
//$id_user= isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');
//$id=2;
// include database and object files
include_once '../config/database.php';
include_once '../user/user.php';
include_once 'blog.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$user= new User($db);
$blog = new Blog($db);

$page_title = "New Blog";
$id_user=$_SESSION["user"]["id_user"];

include_once '../index/headerbasic.php';

?>
<div class="page-user">
<h1><?php echo $page_title ; ?></h1>
    
</div>
<ul class="nav justify-content-end">
        <li>
        <?php
            echo "<a class='nav-link active' href='../user/user_page.php?id_user={$_SESSION["user"]["id_user"]}'>Go Back</a> ";
            ?>
        </li>
       
 </ul>

<?php
    include_once 'createBlog.php';

   include_once 'blogform.php';
}  
?>
 