
	<div data-role="content"> 
		<p class="text">-------<i>celengan soal</i>------</p>
		<p class="text"><?php echo $profil->username; ?></p> <!--- tampilkan nama user -->
		<img src="<?php echo base_url()?>css/images/celengan.png" width="25px" height="25px">

		<div data-role="fieldcontain" class="ui-hide-label">
			
			<div class="choice_list">		<!-- menampilkan celengan yang sudah di buat -->
			<ul data-role="listview" data-inset="true" data-theme="d">

				<?php $banyak = count($user_celengan);
				echo $banyak;
				if ($banyak <= 0) {
					?>
						<li>Tidak ada celengan</li>					
					<?php
				}else{

				?>
				<li>
					<a href=""></a>
				</li>

				<?php } ?>				
			</ul>
			</div>	
			<a href="<?php echo base_url()?>index.php/celengan/tambah" data-role="button">Tambah</a>
			
			<input type="button" onClick="logout();" value="Logout"/>
		</div>
	</div>
	<div id="user-info"></div>

