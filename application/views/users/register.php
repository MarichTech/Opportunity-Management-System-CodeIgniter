<div class="row">
  <div class="col-md-4 mx-auto" >
    <h2><?= $title; ?></h2>
  </div>
</div>

<!--<?php echo validation_errors(); ?> -->

  <?php echo form_open('users/register'); ?>

  
  <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="form-floating mb-3">
      <input type="text" name="name" class="form-control" id="floatingNameInput" placeholder="Full Name">
      <label for="floatingNameInput">Full Name</label>
      <?php echo form_error('name'); ?>
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="form-floating mb-3">
      <input type="text" name="username" class="form-control" id="floatingUserNameInput" placeholder="UserName">
      <label for="floatingUserNameInput">UserName</label>
      <?php echo form_error('username'); ?>
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" id="floatingEmailInput" placeholder="Email Address" aria-describedby="emailHelp">
      <label for="floatingEmailInput">Email Address</label>
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      <?php echo form_error('email'); ?>
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="floatingPasswordInput" aria-describedby="passwordHelpInline">
      <label for="floatingPasswordInput">Password</label>
      <div id="passwordHelpInline" class="form-text">Must be 8-20 characters long.</div>
      <?php echo form_error('password'); ?>
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="inputPassword2" aria-describedby="passwordConfirmHelpInline">
      <label for="inputPassword2">Confirm Password</label>
      <div id="passwordConfirmHelpInline" class="form-text">Ensure you match Passwords.</div>
      <?php echo form_error('password2'); ?>
    </div>
    </div>
  </div>

  <div class="d-grid col-4 mx-auto">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>

<br>