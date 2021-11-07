
<?php echo anchor('/itk', 'Back'); ?>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah ITK</h3>
            </div>
            <form action="<?= base_url('itk/create') ?>" method="post" autocomplete="on" enctype="multipart/form-data">
    
              <div class="box-body">
				<div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="enter First Name" required>
                </div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
                  <label for="exampleInputPassword1">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" required>
                </div>
				</div>
				<div class="col-md-7">
                <div class="form-group">
                  <label for="exampleInputEmail1">Passport Number</label>
                  <input type="text" name="no_passport" class="form-control" id="no_passport" placeholder="Enter Passport Number" required>
                </div>
				</div>
				<div class="col-md-7">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
				</div>
				<div class="col-md-8">
                <div class="form-group">
                  <label for="exampleInputEmail1">Date Expired</label>
                  <div class="form-group">
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="date_start" id="date_start" placeholder="Enter Date Start" required>
                  </div>
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="date_expired" id="date_expired" placeholder="Enter Date Expired" required>
                  </div>
                  </div>
                </div>
				</div>
				<div class="col-md-7">
                <div class="form-group">
                  <label for="exampleInputFile">ITK File</label>
                  <input class="form-control-file"  type="file" id="itk_file" name="itk_file">

                  <p class="help-block">File type allowed jpg,pdf,png,jpeg, maximum size 5 mb</p>
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Passport File</label>
                  <input class="form-control-file" type="file" id="passport_file" name="passport_file">
                  <p class="help-block">File type allowed jpg,pdf,png,jpeg, maximum size 5 mb</p>
                </div>
                <?php echo @$error; ?> 
				<?php if(validation_errors()) { echo validation_errors(); }?>
    <!-- <form action="<?php echo base_url('captcha/check_captcha');?>" method="post">
        <?php echo $captcha;?>
        Masukan kode captcha
        <input type="text" name="captcha">
        <button type="submit">Submit</button>
    </form>
				
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
			  </div> -->
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
		  </div>
  
     <?php include __DIR__ . "/../date_compare.php"; ?>
