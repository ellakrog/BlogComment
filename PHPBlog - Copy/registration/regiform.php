

<div class="bodyregi">

<div class="form">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="name" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name">
   
  </div>
<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>