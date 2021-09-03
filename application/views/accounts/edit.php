<h2><?= $title; ?></h2>

<!--<?php echo validation_errors(); ?> -->

<?php echo form_open('accounts/update'); ?>
    <div class="mb-3">
      <input type="hidden" name="id" value="<?php echo $account['id']; ?>" >
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Add Account Name" value="<?php echo $account['name']; ?>">
      <?php echo form_error('name'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control"  name="email" placeholder="Add Account Email" value="<?php echo $account['email']; ?>">
      <?php echo form_error('email'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Phonenumber</label>
      <input type="text" class="form-control"  name="phonenumber" placeholder="Add Account Phonenumber" value="<?php echo $account['phonenumber']; ?>">
      <?php echo form_error('phonenumber'); ?>
    </div>
    
    <div  class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" class="form-control"  name="address" placeholder="Add Account Address" value="<?php echo $account['address']; ?>">
      <?php echo form_error('address'); ?>
    </div>
    <button class="btn btn-primary" type="submit">Submit </button>
</form>

