<h2><?= $title; ?></h2>

<!--<?php echo validation_errors(); ?> -->

<?php echo form_open('accounts/create'); ?>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Add Account Name">
      <?php echo form_error('name'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control"  name="email" placeholder="Add Account Email">
      <?php echo form_error('email'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Phonenumber</label>
      <input type="text" class="form-control"  name="phonenumber" placeholder="Add Account Phonenumber">
      <?php echo form_error('phonenumber'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" class="form-control"  name="address" placeholder="Add Account Address">
      <?php echo form_error('address'); ?>
    </div>

    <button class="btn btn-primary" type="submit">Submit </button>
</form>

