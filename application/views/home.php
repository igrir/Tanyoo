	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>/css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" class="ui-navbar-custom" data-position="inline" data-theme="e"> 
			<img border="0" src="css/images/t.png" style="float:left;display:inline" width="20px"/>
			<img border="0" src="css/images/search.png" style="float:right;display:inline" width="30px" data-role="button" />
			<div data-role="navbar" class="ui-navbar-custom"> 
				<ul> 
					<li><a href="#" id="home" data-icon="custom" class="ui-btn-active"></a></li> 
					<li><a href="#" id="profile" data-icon="custom"></a></li> 
					<li><a href="#" id="statistik" data-icon="custom"></a></li> 
				</ul> 
			</div> 
		</div> 
		
		<div data-role="content"> 

			<div data-role="fieldcontain" class="ui-hide-label">

				Selamat datang
				<a href="#" data-role="button" data-inline="true">Tulis Pertanyaan</a>
				<a href="#" data-role="button" data-inline="true">Jawab Pertanyaan</a>
				<input type="button" onClick="logout();" value="Logout"/>
			</div>

		</div> 

		<div id="user-info"></div>
		
	
