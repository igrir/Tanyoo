
	<div data-role="content" id="celengan"> 
		<p class="text">-------<i><?php echo $celengan->nama_celengan?></i>------</p>
		<img src="<?php echo base_url()?>css/images/celengan.png" width="70px" height="60px">

		<div data-role="fieldcontain" class="ui-hide-label">
			
			<div class="choice_list">		<!-- menampilkan celengan yang sudah di buat -->
			<ul data-role="listview" data-inset="true" data-theme="d">

				<?php $banyak = count($isi_celengan);
				echo "banyak soal dalam celengan: ".$banyak;
				if ($banyak <= 0) {
					?>
						<li>Tidak ada isi celengan</li>					
					<?php
				}else{
					foreach($isi_celengan as $isi){
						$teks_soal = $this->Soal_model->selectsoal($isi->id_soal)->row()->text_soal;

					?>
						<li>
							<a href="<?php echo base_url()?>index.php/jawab/<?php echo $isi->id_soal?>"><?php echo $teks_soal ?></a>

							<?php
								//cek apakah ini celengan sendiri untuk tombol delete

								$username = $this->session->userdata('username');

								$user_have = $this->Celengan_model->is_user_have_celengan($username, $celengan->id_celengan);

								if ($user_have) {
									?>
										<a href="<?php echo base_url()?>index.php/celengan/hapus_isi/<?php echo $isi->id_soal?>/<?php echo $celengan->id_celengan?>" data-icon="delete" data-transition="pop" data-position-to="window">delete</a>

									<?php
								}


								
							?>

							
						</li>
					<?php		
					}
				?>
				

				<?php } ?>				
			</ul>
			</div>	

			
		</div>
	</div>
	<div id="user-info"></div>

