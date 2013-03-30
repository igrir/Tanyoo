
	<div data-role="content"> 
		<center><img src="<?php echo base_url()?>css/images/celengan.png" width="25px"></center>
		<p class="text">-------<i>Tambahkan isi celengan</i>------</p>
		 <!--- tampilkan nama user -->
		<!-- <p class="text"><?php echo $profil->username; ?></p> -->
		

		<div data-role="fieldcontain" class="ui-hide-label">
			<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
				<li>
					<?php echo $soal->text_soal?>
				</li>				
				
			</ul>
			
			<p class="text">-------<i>Tambahkan ke</i>------</p>
			<div class="choice_list">		<!-- menampilkan celengan yang sudah di buat -->
			<ul data-role="listview" data-inset="true" data-theme="d">

				<?php $banyak = count($user_celengan);
				if ($banyak <= 0) {
					?>
						<li>Tidak ada celengan</li>					
					<?php
				}else{
					foreach($user_celengan as $celengan){
					?>
						<li>
							<a href="<?php echo base_url()?>index.php/celengan/add_isi/<?php echo $soal->id_soal?>/<?php echo $celengan->id_celengan?>"><?php echo $celengan->nama_celengan?></a>
						</li>
					<?php		
					}
				?>
				

				<?php } ?>				
			</ul>
			</div>	
			<a href="<?php echo base_url()?>index.php/celengan/tambah" data-role="button">Tambah</a>


		</div>
	</div>
	<div id="user-info"></div>

