<div class="row">
  <div class="col-md-4 mx-auto" >
    <h2><?= $title; ?></h2>
  </div>
</div>

<!--<?php echo validation_errors(); ?> -->

<?php echo form_open('users/login'); ?>


  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="mb-3">
      <label class="form-label">UserName</label>
      <input type="text" name="username" class="form-control" aria-describedby="usernameHelp">
        <?php echo form_error('username'); ?>
    </div>
    </div>
  </div>

 
 <div class="row">
  <div class="col-md-4 mx-auto" >
    <div class="mb-2">
      <div class="col-auto">
        <label for="inputPassword" class="col-form-label">Password</label>
      </div>
      <div class="col-auto">
        <input type="password" name="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpInline">
      </div>
      <div class="col-auto">
        <span id="passwordHelpInline" class="form-text">
          Must be 8-20 characters long.
        </span>
      </div>
          <?php echo form_error('password'); ?>
     </div>
  </div>
 </div>


  <div class="d-grid col-4 mx-auto">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
 
  
</form>