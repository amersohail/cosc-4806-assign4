<?php require_once 'app/views/templates/headerPublic.php'; ?>

<h1>Register</h1>

<div class="row">
    <div class="col-4">
    <form action="/create/register" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="username">Username</label>
        <input required type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" name="password">
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input required type="password" class="form-control" name="confirm_password">
      </div>
            <br>
        <button type="submit" value="Register" class="btn btn-primary">Login</button>
    </fieldset>
    </form> 
  </div>
</div>

<div class="alert alert-warning mt-3" role="alert">
  <p class="h4">Password Rules</p>
  Contains at least one letter<br/>
  Contains at least one digit<br/>
  Is at least 8 characters long<br/>
  May contain special characters (@$!%*?&)
</div>

 <p><a href="/login">Back to Login</a></p>

 <?php require_once 'app/views/templates/footer.php' ?>