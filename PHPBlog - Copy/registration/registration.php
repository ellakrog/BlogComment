
<link rel="stylesheet" href="registration.css" >
<?php

include_once '../config/database.php';
include_once '../user/user.php';



$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$page_title = "Registration";

include_once '../index/headerbasic.php';

include_once 'header.php';

if($_POST){
 
 // set product property values
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 // create the product
 if($user->create($name,$email,$password)){

   
    header("Location: ../login/login.php");
    echo "Success!";
   
  
     // empty posted values
    
  
 }else{
     echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
 }

 // if unable to create the product, tell the user

}
?>

<ul class="nav justify-content-end">
        <li>
            <a class="nav-link active" href="../login/login.php">Login</a>
        </li>
 </ul>
<?php

include_once 'regiform.php';
?>
