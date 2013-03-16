	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Register</h1> 
		</div> 
		
		<div data-role="content"> 

			<!-- <?php echo form_open("login/check_login")?> -->
			<form method="POST" action="<?php echo base_url()?>index.php/login/check_login" data-ajax="false">
				<label for="username">username</label>
				<input type="text" name="username" id="username"/>
				<label for="password">password</label>
				<input type="password" name="password" id="password"/>
				<button type="submit">login</button>
				
			</form>
			belum punya akun daftar <a href="<?php echo base_url() ?>index.php/register">disini</a>

		</div> 

		<div id="user-info"></div>
		
	</div> 
