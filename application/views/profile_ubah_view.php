<div data-role="content"> 
	<p class="text"><i>edit profil <br/><?php echo $profil->username; ?></i></p> <!-- untuk menampilkan nama user -->
	<div class="ui-body ui-body-d">

		<form method="POST" action="<?php echo base_url()?>index.php/u/save_edit_profil" data-ajax="false"  data-transition="pop">
			<input type="hidden" name="username" value="<?php echo $profil->username;?>"/> 		

				<label for="bio">Bio</label>
				<textarea type="text" name="bio" id="bio"><?php echo $profil->bio;?></textarea>
				<label for="minat">Minat</label>
				<input type="text" name="minat" id="minat" value="<?php echo $profil->minat;?>"/>
				<label for="minat">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $profil->email;?>"/>
				<hr/>
				<center><b>Ubah password</b></center>
				<span style="font-size:0.8em">ubah password, jika anda ingin</span>
				<br/>
				<span style="font-size:0.8em; color:#df0000;">
				<?php 
					if (isset($error)) {
						echo $error;
					}
				?>
				</span>	
				<br/>
				<label for="password">Password lama</label>
				<input type="password" name="password" id="password" value=""/>
				<label for="password">Password baru</label>
				<input type="password" name="password_b1" id="password_baru" value=""/>
				<label for="password">Ketik lagi password baru</label>
				<input type="password" name="password_b2" id="password" value=""/>


				<fieldset class="ui-grid-a">
					<div class="ui-block-a"><button type="submit" data-theme="e" data-inline="true">Update</button></div>
				</fieldset>
		</form>		
		</div>
</div> 

<div id="user-info"></div>