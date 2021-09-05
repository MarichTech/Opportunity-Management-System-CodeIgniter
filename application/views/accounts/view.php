<div class="card mb-3" style="max-width: 540px;">
  <div class="row">
    <div class="col-md-10">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $account['post_image']; ?>" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $account['name']; ?></h5>
          <p class="card-text">Phone Number: <?php echo $account['phonenumber']; ?></p>
          <p class="card-text">Physical Address: <?php echo $account['address']; ?></p>
          <p class="card-text">Email: <?php echo $account['email']; ?></p>
          <p class="card-text"><small class="text-muted">Created On: <?php echo $account['created_on']; ?></small></p>
        </div>
      </div>
    </div>
    </div>
    <div class="col-md-2">
    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Opportuinity
</button>
    </div>
  </div>
</div>







<div class="table-responsive">
    <table id="data-table" class="table table  table-bordered table-hover" style="width:100%; padding-top: 20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>amount</th>
                <th>stage</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($opportuinities as $opportuinity) : ?>
            
              <tr>
                  <td><?php echo $opportuinity['name']; ?></td>
                  <td><?php echo $opportuinity['amount']; ?></td>
                  <td><?php echo $opportuinity['stage']; ?></td>
                  <td><a href="<?php echo base_url(); ?>opportuinities/edit/<?php echo $opportuinity['id']; ?>" class="btn btn-outline-info" data-bs-toggle="popover" title="Click to Edit Opportuinity" 
            ml-2><i class="fas fa-pen"></i></a> 
            <a href="<?php echo base_url(); ?>opportuinities/delete/<?php echo $opportuinity['id']; ?>" class="btn btn-outline-danger " data-bs-toggle="popover" title="Click to Delete Opportuinity" 
            ml-2><i class="fas fa-trash"></i></a></td>
                 
              </tr>

          <?php endforeach; ?> 
        </tbody>
    </table>
</div>




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Opportuinity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo form_open('opportuinities/createPopup'); ?>
          <input type="hidden" class="form-control" name="accountId" value="<?php echo $account['id']; ?>">

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

     


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ok</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>