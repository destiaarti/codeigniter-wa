<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
				<img src="<?php echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); ?>" class="img-circle">
			</div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('username')?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HOME</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
     <?php if($userdata->role == "admin") {?> 
      <li><a href="<?=base_url('/admin/user')?>"><i class="fa fa-users"></i> <span>User</span></a></li>
      <?php } ?>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>ITK</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?=base_url('/itk')?>"><i class="fa fa-users"></i> <span>SEMUA ITK</span></a></li>
          <li><a href="<?=base_url('/itk/itk_30')?>"><i class="fa fa-users"></i> <span>ITK 30 HARI</span></a></li>
        <li><a href="<?=base_url('/itk/itk_60')?>"><i class="fa fa-users"></i> <span>ITK 60 HARI</span></a></li>
          </ul>
        </li>

      <li><a href="<?=base_url('/visa')?>"><i class="fa fa-link"></i> <span>Visa</span></a></li>
   
        </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
