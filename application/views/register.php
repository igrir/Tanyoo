	
	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;" data-add-back-btn="true">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Register</h1> 
		</div> 
		
		<div data-role="content"> 


			<div class="ui-body ui-body-e">
			


				<div id="gambar"></div>

			
				<form action="<?php echo base_url()?>index.php/user/add_user" method="post" accept-charset="utf-8">

				<div data-role="fieldcontain" class="ui-hide-label">
					<label for="username">Nama Tampilan</label>
					<input type="text" name="username" id="username" value="" placeholder="Nama Tampilan"/>
					<span id="peringatan"></span>
					<small><i>hanya gunakan 1 kata tanpa spasi</i></small>
				</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" value="" placeholder="Password"/>

				<br/>

				<label for="username">Bio</label>
				<textarea id="bio" name="bio" placeholder="Bio" required></textarea>

				<br/>

				<input type="hidden" id="fbid" name="fbid" placeholder="fbid" />
				
				<br/>

				<label for="minat">Minat</label>
				<input type="text" name="minat" id="minat" value="" placeholder="Minat, pisahkan dengan spasi" required/>
				<br/>

				<div id="submit_area">
					<button type="submit">Register</button>
				</div>
				
			</div>
			</div>

		</div> 

		<div id="user-info"></div>
		
	</div> 
</body> 
</html> 