<?php


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
  
     echo "<a class='btn btn-primary' style='' href='../blog/oneBlog.php?id_blog={$id_blog}' role='button'>Dicover more</a>";
     echo "</div>";

    echo "</div>";
    

    

    }

}else{
    echo "<div class='alert alert-danger'>No blogs found.</div>";
}
?>

     
 

