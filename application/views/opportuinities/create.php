<h2><?= $title; ?></h2>

<!--<?php echo validation_errors(); ?> -->

<?php echo form_open('opportuinities/create'); ?>

    <div  class="mb-3">
      <label class="form-label">Account</label>
        <select class="form-select" name="account_id" required>
          <option selected disabled value="">Choose...</option>
          <?php foreach($accounts as $account): ?>
            <option value="<?php echo $account['id']; ?>"><?php echo $account['name']; ?></option>
          <?php endforeach; ?>
        </select>
        <?php echo form_error('account_id'); ?>
        
    </div>

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Add Opportuinity Name">
      <?php echo form_error('name'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Amount</label>
      <input type="text" class="form-control"  name="amount" placeholder="Add Opportuinity Amount">
      <?php echo form_error('amount'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Stage</label>
      <input type="text" class="form-control"  name="stage" placeholder="Add Opportuinity Stage">
      <?php echo form_error('stage'); ?>
    </div>

    <button class="btn btn-primary" type="submit">Submit </button>
</form>

