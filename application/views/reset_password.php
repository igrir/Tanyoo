	<div data-role="page" id="respass" data-add-back-btn="true" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"  data-auto-back-btn="true"> 
			<h1>Reset</h1> 
		</div> 	
		<div data-role="content"> 
			<div class="ui-body ui-body-e ui-corner-all">
			<form method="POST" action="<?php echo base_url()?>index.php/proc_reset_pass" data-ajax="false">
				<h3>Kamu lupa kata kunci?</h3>
				<span style="font-size: 12px">Masukkan username kamu disini dan kami akan mengirim link reset untuk kamu melalui email</span>
				<br/>
				<br/>

				<span style="color:#df0000"><?php echo $error;?></span>

				<input type="text" name="username" id="username" placeholder="username"/>

				<button type="submit" data-inline="true">reset</button>
				
			</form>
			<hr/>
			<a href="<?php echo base_url() ?>index.php">Login</a> <br/>
			atau belum punya akun?<br/>
			<a href="<?php echo base_url() ?>index.php/register"> daftar disini</a>
			</div>
			
		</div> 

		<div id="user-info"></div>
		
	</div> 
