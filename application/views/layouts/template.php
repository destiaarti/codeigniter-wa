<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/uploads/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('_meta.php') ;?>

	<!-- css -->
	<?php require_once('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		<?php require_once('_header.php') ;?>
		<!-- sidebar -->
		<?php require_once('_sidebar.php') ;?>
		<!-- content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<?php
if ($this->session->flashdata('Edit')) {
   
 echo "<div class='alert alert-info alert-dismissible fade in' role='alert'><span class='glyphicon glyphicon-wrench' aria-hidden='true'></span>";
    echo $this->session->flashdata('Edit');
    echo "</div>";
}
elseif($this->session->flashdata('Error')){

   echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
   echo $this->session->flashdata('Error');
    echo "</div>";
}

elseif($this->session->flashdata('Hapus')){

	echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>";
	echo $this->session->flashdata('Hapus');
	 echo "</div>";
 }elseif($this->session->flashdata('Tambah')){

	echo "<div class='alert alert-success alert-dismissible fade in' role='alert'><span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span>";
	echo $this->session->flashdata('Tambah');
	 echo "</div>";
 }
?>
			<section class="content">
				<?php echo $contents ;?>
			</section>
		</div>
		<!-- footer -->
		<?php require_once('_table.php') ;?>
		<?php require_once('_footer.php') ;?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- js -->

	<?php require_once('_js.php') ;?>
</body>

</html>
