
	<div data-role="content"> 
		<p class="text"><i><?php echo $profil->username; ?></i></p> <!--- tampilkan nama user -->
		<center><img src="<?php echo base_url()?>css/images/celengan.png" width="70px" height="60px"></center>

		<div data-role="fieldcontain" class="ui-hide-label">
			
			<div class="choice_list">		<!-- menampilkan celengan yang sudah di buat -->
			<ul data-role="listview" data-inset="true" data-theme="d">

				<?php $banyak = count($user_celengan);
				echo "<p class='tengah'>banyak celengan : ".$banyak."</p>";
				if ($banyak <= 0) {
					?>
						<li>Tidak ada celengan</li>					
					<?php
				}else{
					foreach($user_celengan as $celengan){
					?>
						<li>
							<a href="<?php echo base_url()?>index.php/celengan/id/<?php echo $celengan->id_celengan?>"><?php echo $celengan->nama_celengan?></a>
							
							<?php if ($celengan->username == $this->session->userdata('username')){?>
								<a href="<?php echo base_url()?>index.php/celengan/edit/<?php echo $celengan->id_celengan?>" data-icon="gear">edit</a>
							<?php } ?>
						</li>
					<?php		
					}
				?>
				

				<?php } ?>				
			</ul>
			</div>	

			<?php if ($profil->username == $this->session->userdata('username')) { ?>
				<a href="<?php echo base_url()?>index.php/celengan/tambah" data-role="button">Tambah</a>
			<?php }?>
			
		</div>
	</div>
	<div id="user-info"></div>

