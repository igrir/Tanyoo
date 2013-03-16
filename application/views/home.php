	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>/css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Home</h1> 
		</div> 
		
		<div data-role="content"> 

			<div data-role="fieldcontain" class="ui-hide-label">

				Selamat datang

				<input type="button" onClick="logout();" value="Logout"/>
			</div>

		</div> 

		<div id="user-info"></div>
		
	