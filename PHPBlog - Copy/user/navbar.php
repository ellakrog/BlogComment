<link rel="stylesheet" href="user.css" >

<ul class="nav justify-content-center">
  <li class="nav-item">
  <?php
   echo "<a class='nav-link ' href='../home/home.php?id_user={$_SESSION["user"]["id_user"]}'>Home</a>";
  ?>
  </li>
  
  <li class="nav-item">
  <?php
   echo "<a class='nav-link active' href='../blog/blog_create.php?id_user={$_SESSION["user"]["id_user"]}'>New Blog</a>";
  ?>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../home/home.php">Gallery</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../home/home.php">Notes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../logout/logout.php">Logout</a>
  </li>
</ul>
