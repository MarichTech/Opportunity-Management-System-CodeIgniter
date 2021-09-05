<h2><?= $title ?></h2>
<br>
<br>
<div class="table-responsive">
    <table id="data-table" class="table table  table-bordered table-hover" style="width:100%; padding-top: 20px;">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>PhoneNumber</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($accounts as $account) : ?>
            
              <tr>
                 <td><img height="25%" width="25%"  src="<?php echo site_url(); ?>assets/images/posts/<?php echo $account['post_image']; ?>"></td>
                  <td><?php echo $account['name']; ?></td>
                  <td><?php echo $account['email']; ?></td>
                  <td><?php echo $account['phonenumber']; ?></td>
                  <td><?php echo $account['address']; ?></td>
                  <td><a href="<?php echo base_url(); ?>accounts/edit/<?php echo $account['id']; ?>" class="btn btn-outline-info"  data-bs-toggle="popover" title="Click to Edit Account" 
            ml-2><i class="fas fa-pen"></i></a> 
            <a href="<?php echo base_url(); ?>accounts/delete/<?php echo $account['id']; ?>" class="btn btn-outline-danger" data-bs-toggle="popover" title="Click to Delete Account"
            ml-2><i class="fas fa-trash"></i></a>

            <a href="<?php echo base_url(); ?>accounts/<?php echo $account['id']; ?>" class="btn btn-outline-secondary" data-bs-toggle="popover" title="Click to Delete Account"
            ml-2><i class="fas fa-cogs"></i></a></td>

              </tr>

          <?php endforeach; ?> 
        </tbody>
    </table>
</div>







