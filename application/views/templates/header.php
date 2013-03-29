<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>TANYOO</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url()?>css/jquery.mobile-1.3.0.min.css"/>
		<script src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
		<script src="<?php echo base_url()?>js/jquery.mobile-1.3.0.min.js"></script>

		<style>
			body #logout { display:none; }
			body.connected #login { display: none; }
			body.connected #logout { display: block; }
			body.not_connected #login { display: block; }
			body.not_connected #logout { display: none; }
		</style>

	</head> 
<body> 
	