<link rel="stylesheet" href="../registration/registration.css" >
<link rel="stylesheet" href="../index/index.css" >
<?php
session_start();
include_once '../config/database.php';
include_once '../user/user.php';



$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$page_title = "Login";

include_once '../index/headerbasic.php';
include_once '../registration/header.php';
?>

<ul class="nav justify-content-end">
        <li>
            <a class="nav-link active" href="../registration/registration.php">Registration</a>
        </li>
 </ul>
<?php
if($_POST){
 
    // set product property values
   
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
   
    // create the product
    if($user->isAdmin()){
   
        echo "<div class='alert alert-info'>";
            echo " <a href='../admin/admin.php'>Welcome admin</a>.";
        echo "</div>";
         
        // empty posted values
       
     
       }else if($fetched_user=$user->login()){

        $_SESSION["user"] = $fetched_user;
        $_SESSION["loggedIn"] = true;
           echo "<div class='alert alert-info'>";
           echo " <a href='../user/user_page.php?id_user={$_SESSION["user"]["id_user"]}'>Welcome</a>.";
          echo "</div>";
           
       }
        else{
        echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
       }
   
    // if unable to create the product, tell the user
   
   }

   include_once 'logform.php';
   ?>