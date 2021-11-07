<?php echo anchor('/itk', 'Back'); ?>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit ITK</h3>
            </div>
            <form action="<?= base_url('itk/update') ?>" method="post" autocomplete="on" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $itk->id ?>">
    
              <div class="box-body">
				<div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">First Name</label>
                  <input type="text" name="first_name" class="form-control" value="<?= $itk->first_name ?>" id="first_name" placeholder="enter First Name" required>
                </div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
                  <label for="exampleInputPassword1">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="last_name" value="<?= $itk->last_name ?>" placeholder="Enter Last Name" required>
                </div>
				</div>
				<div class="col-md-7">
                <div class="form-group">
                  <label for="exampleInputEmail1">Passport Number</label>
                  <input type="text" name="no_passport" class="form-control" id="no_passport" value="<?= $itk->no_passport ?>" placeholder="Enter Passport Number" required>
                </div>
				</div>
				<div class="col-md-7">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="email"  value="<?= $itk->email ?>" placeholder="Enter email" required>
                </div>
				</div>
				<div class="col-md-8">
                <div class="form-group">
                  <label for="exampleInputEmail1">Date Expired</label>
                  <div class="form-group">
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="date_start" value="<?= $itk->date_start ?>" id="date_start" placeholder="Enter Date Start" required>
                  </div>
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="date_expired" id="date_expired" value="<?= $itk->date_expired ?>" placeholder="Enter Date Expired" required>
                  </div>
                  </div>
                </div>
				</div>
				<div class="col-md-7">
                <div class="form-group">
                  <label for="exampleInputFile">ITK File</label>
				  </br>
				  <?if($itk->itk_file != "default.png") { ?>
		<button><?=anchor('upload/itk/'.$itk->itk_file, 'View ITK File!','target="_blank"')?></button>
		
<? } else{ ?>
	<p>No File Upload</p>
	<? } ?>
	<p> </p>
                  <input class="form-control-file"  type="file" id="itk_file" name="itk_file">

                  <p class="help-block">File type allowed jpg,pdf,png,jpeg, maximum size 5 mb</p>
				  <input type="hidden" name="old_image_itk" value="<?php echo $itk->itk_file ?>" />
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Passport File</label>
				  </br>
				  <?if($itk->passport_file != "default.png") { ?>
		<button><?=anchor('upload/passport/'.$itk->passport_file, 'View Passport File!','target="_blank"')?></button>
		
<? } else{ ?>
	<p>No File Upload</p>
	<? } ?>
	<p> </p>
                  <input class="form-control-file" type="file" id="passport_file" name="passport_file">

                  <p class="help-block">File type allowed jpg,pdf,png,jpeg, maximum size 5 mb</p>
				  <input type="hidden" name="old_image_passport" value="<?php echo $itk->passport_file ?>" />
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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
		  </div>
      <?php include __DIR__ . "/../date_compare.php"; ?>