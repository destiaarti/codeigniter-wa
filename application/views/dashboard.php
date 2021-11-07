<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Admin DIPONEGORO IO</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">VISA</span>
              <span class="info-box-text">Total Data: </span>
              <span class="info-box-number"><?php echo $visa_count_all ?></span>
              <span class="info-box-text"> <?php echo $visa_count_type_perpanjang ?> visa perpanjang</span>
              <span class="info-box-text"> <?php echo $visa_count_type_kedatangan ?> visa kedatangan</span>
              <span class="info-box-text"><?php echo $visa_count_status ?> visa has been sent notification</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

<div class="info-box-content">
  <span class="info-box-number">ITK</span>
  <span class="info-box-text">Total Data: </span>
  <span class="info-box-number"><?php echo $itk_count_all ?></span>
  <span class="info-box-text"><?php echo $itk_count_30 ?> itk unless 31 days</span>
  <span class="info-box-text"><?php echo $itk_count_60 ?> itk more than 30 days</span>
              <span class="info-box-text"><?php echo $itk_count_status ?> itk has been sent notification</span>
</div>

            <!-- /.info-box-content -->
          </div>

          <!-- /.info-box -->
        </div>
        
        </div>
        <div class="row">
        <div class="col-md-12">
        <div style="padding-bottom:20px;display:flex;justify-content: space-between;">
	<h1><i class="fa fa-fw fa-cc"></i> Last ITK</h1>
	<a href="<?php echo site_url('itk') ?>" class="btn bg-olive btn-flat margin">See More</a>
</div>
        <div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed text-center" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th width="30px" style="padding-left: 20px;">No</th>
				<th>NAME</th>
				<th>ITK NUMBER</th>
				<th>DATE EXPIRED</th>
				<th>DEADLINE TO EXPIRE</th>
				<th>SEND NOTIFICATION</th>
				<th>STATUS</th>
		
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($itk as $itk) { ?>
            <tr>
					<td width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $itk->first_name ?> <?= $itk->last_name ?></td>
					<td><?= $itk->no_passport ?></td>
					<td><?= date('d/F/Y', strtotime($itk->date_start)) ?> - <?= date('d/F/Y', strtotime($itk->date_expired))?> </td>
					<td><?= date_diff(date_create($itk->date_expired), date_create($itk->date_start))->format("%R%a days") ?></td>
					<td><?= date('d/F/Y', strtotime($itk->send_notification)) ?></td>
					<td><? if($itk->status_notification == 0){
						?> <button type="button" class="btn bg-navy btn-flat margin">unsent</button> <?
					}else{
						?> <button type="button" class="btn bg-green btn-flat margin">sent</button> <?
					} ?>
					</td>
				</tr>
			<?php } ?>
			
		</tbody>
		
	</table>
        </div>
</div>
<div class="col-md-12">
<div style="padding-bottom:20px;display:flex;justify-content: space-between;">
	<h1><i class="fa fa-fw fa-cc"></i> Last VISA</h1>
	<a href="<?php echo site_url('visa') ?>" class="btn bg-olive btn-flat margin">See More</a>
</div>

<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed text-center" id="mytable1" style="width: 100%">
		<thead>
			<tr class="active">
				<th width="30px" style="padding-left: 20px;">No</th>
				<th>NAME</th>
				<th>VISA NUMBER</th>
        <th>VISA TYPE</th>
				<th>DATE EXPIRED</th>
				<th>DEADLINE TO EXPIRE</th>
				<th>SEND NOTIFICATION</th>
				<th>STATUS</th>
		
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
             foreach ($visa as $visa) { ?>
              <tr id="<?php echo $visa->id; ?>">
                <td width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
                <td><?= $visa->first_name ?> <?= $visa->last_name ?></td>
                <td><?= $visa->visa_number ?></td>
                <td><?= $visa->visa_type ?></td>
                <td><?= date('d/F/Y', strtotime($visa->date_start)) ?> - <?= date('d/F/Y', strtotime($visa->date_expired))?> </td>
                <td><?= date_diff(date_create($visa->date_expired), date_create($visa->date_start))->format("%R%a days") ?></td>
                <td><?= date('d/F/Y', strtotime($visa->send_notification)) ?></td>
                <td><? if($visa->status_notification == 0){
                  ?> <button type="button" class="btn bg-navy btn-flat margin">unsent</button> <?
                }else{
                  ?> <button type="button" class="btn bg-green btn-flat margin">sent</button> <?
                } ?>
                </td>
				</tr>
			<?php } ?>
			
		</tbody>
		
	</table>
              </div>
</div>
</div>
        </section>
        </div>
        <script>
$(document).ready( function () {
    $('#mytable1').DataTable();
} );
</script>