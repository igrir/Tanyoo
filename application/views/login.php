	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Selamat Datang</h1> 
		</div> 	
		<div data-role="content" id="logo"> 
			<img src="<?php echo base_url()?>css/images/tagline.png" width="70%"></a>
			<br>
			<br>
			<a href="<?php echo base_url()?>index.php#two" data-role="button" data-transition="flip" data-ajax="false">Login</a></p>
		</div> 
	</div> 
	
	<div data-role="page" id="two" data-add-back-btn="true" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"  data-auto-back-btn="true"> 
			<h1>Halaman Login</h1> 
		</div> 	
		<div data-role="content"> 
			<div class="ui-body ui-body-e ui-corner-all">
			<!-- <?php echo form_open("login/check_login")?> -->
			<form method="POST" action="<?php echo base_url()?>index.php/login/check_login" data-ajax="false">
				<label for="username">username</label>
				<input type="text" name="username" id="username" placeholder="username"/>
				<label for="password">password</label>
				<input type="password" name="password" id="password" placeholder="password"/>
				<button type="submit" data-inline="true">login</button>
				
			</form>
			belum punya akun daftar <a href="<?php echo base_url() ?>index.php/register">disini</a>
			</div>
			
		</div> 

		<div id="user-info"></div>
		
	</div> 
