<html>
<head> 
<link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php 
						$atribut = array(
									'id' => 'formpassword'
									);
  echo form_open('PengelolaanPengguna/ubahPassword/'.$hasil -> idPengguna, $atribut); ?>
  
<div class="form-group">								
	<label>Password</label>
	<?php 
				$data = array(
						'id' => 'password',
				 		'name' => 'password',
						'class' => 'form-control required',
						'minlength' => '6',
				);
				echo form_password($data); ?> </div> 
<div class="form-group">								
	<label>Password Lagi</label>
	<?php 
				$data = array(
						'id' => 'password_lagi',
				 		'name' => 'password_lagi',
						'class' => 'form-control required',
						'minlength' => '6',
						'equalTo' => '#password'
				);
				echo form_password($data); ?> </div> 
<div class="form-group">
	<?php 
			$data3 = array(
        		'name'          => 'submit',
        		'id'            => 'Submit',
        		'type'          => 'submit',
        		'class'         => 'btn btn-primary',
				'content'       => 'Ubah'
				
);

			echo form_button($data3); ?> 
			</div> 
	
<?php echo form_close(); ?>

	  <script src="../../assets/js/jquery.js"></script>
	  <script src="../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	  <script type="text/javascript" src="../../assets/js/jquery.validate.js"></script>
	  <script type="text/javascript" src="../../assets/js/messages_id.js"></script>
	  <script>$(document).ready(function() {
				$("#formpassword").validate();
			});
		</script>
		</body>
		</html>