
<div data-role="content"> 
	<p class="text"><i><?php echo $profil->username; ?></i></p> <!-- untuk menampilkan nama user -->
	<div class="ui-body ui-body-d">
		<form method="POST" action="<?php echo base_url()?>index.php/u/save_edit_profil" data-ajax="false"  data-transition="pop">
			<input type="hidden" name="username" value="<?php echo $profil->username;?>"/> 		
					
				<textarea type="text" name="bio" id="bio"><?php echo $profil->bio;?></textarea>
				<input type="text" name="minat" id="minat" value="<?php echo $profil->minat;?>"/>
				
				<fieldset class="ui-grid-a">
					<div class="ui-block-a"><button type="submit" data-theme="e" data-inline="true">Update</button></div>
				</fieldset>
		</form>		
		</div>
</div> 

<div id="user-info"></div>