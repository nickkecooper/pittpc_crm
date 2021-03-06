<div class="modal" id="addQuoteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header text-white">
        <h5 class="modal-title"><i class="fa fa-fw fa-file mr-2"></i>New Quote</h5>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        
        <div class="modal-body bg-white">

          <?php if(isset($_GET['client_id'])){ ?>
          <input type="hidden" name="client" value="<?php echo $client_id; ?>">
          <?php }else{ ?>
          
          <div class="form-group">
            <label>Client <strong class="text-danger">*</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
              </div>
              <select class="form-control select2" name="client" required>
                <option value="">- Client -</option>
                <?php 
                
                $sql = mysqli_query($mysqli,"SELECT * FROM clients WHERE company_id = $session_company_id"); 
                while($row = mysqli_fetch_array($sql)){
                  $client_id = $row['client_id'];
                  $client_name = $row['client_name'];
                ?>
                  <option <?php if($_GET['client_id'] == $client_id) { echo "selected"; } ?> value="<?php echo $client_id; ?>"><?php echo $client_name; ?></option>
                
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <?php } ?>
          
          <div class="form-group">
            <label>Date <strong class="text-danger">*</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
              </div>
              <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label>Category <strong class="text-danger">*</strong></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-fw fa-list"></i></span>
              </div>
              <select class="form-control select2" name="category" required>
                <option value="">- Category -</option>
                <?php 
                
                $sql = mysqli_query($mysqli,"SELECT * FROM categories WHERE category_type = 'Income' AND company_id = $session_company_id"); 
                while($row = mysqli_fetch_array($sql)){
                  $category_id = $row['category_id'];
                  $category_name = $row['category_name'];
                ?>
                <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                
                <?php
                }
                ?>
              </select>
            </div>
          </div>
        
        </div>
        <div class="modal-footer bg-white">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="add_quote" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>