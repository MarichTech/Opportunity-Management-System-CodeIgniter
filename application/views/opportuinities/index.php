<h2><?= $title ?></h2>
<br>
<br>
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







