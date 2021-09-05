<h2><?= $title; ?></h2>

<!--<?php echo validation_errors(); ?> -->

<?php echo form_open('opportuinities/update'); ?>
    <div class="mb-3">
      <input type="hidden" name="id" value="<?php echo $opportuinities['id']; ?>" >
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Add Opportuinity Name" value="<?php echo $opportuinities['name']; ?>">
      <?php echo form_error('name'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Amount</label>
      <input type="text" class="form-control"  name="amount" placeholder="Add Opportuinity Amount" value="<?php echo $opportuinities['amount']; ?>">
      <?php echo form_error('amount'); ?>
    </div>

    <div  class="mb-3">
      <label class="form-label">Stage</label>
      <input type="text" class="form-control"  name="stage" placeholder="Add Opportuinity Stage" value="<?php echo $opportuinities['stage']; ?>">
      <?php echo form_error('stage'); ?>
    </div>
    
    <button class="btn btn-primary" type="submit">Submit </button>
</form>

