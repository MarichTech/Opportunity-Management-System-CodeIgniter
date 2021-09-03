<h2><?= $title ?></h2>
<br>
<br>
<div class="table-responsive">
    <table id="data-table" class="table table  table-bordered table-hover" style="width:100%; padding-top: 20px;">
        <thead>
            <tr>
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
                  <td><?php echo $account['name']; ?></td>
                  <td><?php echo $account['email']; ?></td>
                  <td><?php echo $account['phonenumber']; ?></td>
                  <td><?php echo $account['address']; ?></td>
                  <td><a href="<?php echo base_url(); ?>accounts/edit/<?php echo $account['name']; ?>" class="btn btn-outline-info"
            ml-2><i class="fas fa-edit"></i></a> 
            <a href="<?php echo base_url(); ?>accounts/delete/<?php echo $account['id']; ?>" class="btn btn-outline-danger"
            ml-2><i class="fas fa-trash"></i></a></td>
              </tr>

          <?php endforeach; ?> 
        </tbody>
    </table>
</div>







