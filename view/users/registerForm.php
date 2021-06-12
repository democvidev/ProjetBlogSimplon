<form action="index.php?page=user.register" method="POST">
  <fieldset>    
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Your name</label>
      <input type="text" name="name" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>    
    <input type="submit" name="submit" class="btn btn-primary">
  </fieldset>
</form>