


	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;" data-add-back-btn="true">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Register</h1> 
		</div> 
		
		<div data-role="content"> 


			<div class="ui-body ui-body-e ui-corner-all">
			
				<div id="gambar"></div>

			
				<form action="<?php echo base_url()?>index.php/user/add_user" method="post" accept-charset="utf-8" id="register_form">

				<?php echo $error?>
				<div data-role="fieldcontain" class="ui-hide-label">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" value="" placeholder="Username"/>
					<span id="peringatan"></span>
					<small><i>hanya gunakan 1 kata tanpa spasi</i></small>
				</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" value="" placeholder="Password"/>

				<br/>
				<input type="text" name="email" value="" placeholder="Email"/>
				<br/>

				<label for="username">Bio</label>
				<textarea id="bio" name="bio" placeholder="Bio" required></textarea>

				<br/>
				
				<br/>

				<label for="minat">Minat</label>
				<input type="text" name="minat" id="minat" value="" placeholder="Minat, pisahkan dengan spasi" required/>
				<br/>

				<div id="submit_area">
					<button type="submit" onClick="return validate();">Register</button>
				</div>
				
			</div>
			</div>

		</div> 

		<div id="user-info"></div>
		
	</div> 
</body> 
</html> 