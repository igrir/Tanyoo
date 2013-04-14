		<div data-role="content"> 
			<!-- <p class="text"><i>-----------soal----------</i></p>  -->
			
			<div data-role="fieldcontain" class="ui-hide-label" id="tampiltext" >
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
					<li>
						<?php
						if ($dijawab) {
							?>
							 <img src="<?php echo base_url()?>css/images/notif.png" width="32px" height="32px" style="margin-right:-40px;" class="ui-li-icon">
							<?php
						}else{
							?>
							 <img src="<?php echo base_url()?>css/images/notifmati.png" width="32px" height="32px" style="margin-right:-40px;" class="ui-li-icon">
							<?php
						}
						?>
						

						<?php echo $soal->text_soal?>
						<br><br><p style=" color:grey">by <a href="<?php echo base_url()?>index.php/u/<?php echo $soal->username; ?>"><?php echo $soal->username?></a></p>
						<p style=" color:grey"><?php echo $soal->tag?></p>
					</li>				
					
				</ul>
				
				
				<div class="ui-grid-d">
					
					<div class="ui-block-a" style="height:50px; width:30%">
						<?php 
							$pemilik = $soal->username;
							if($this->session->userdata('username') == $pemilik){?>
								<a href="<?php echo base_url()?>index.php/soal/ubah/<?php echo $soal->id_soal?>">
									edit<img src="<?php echo base_url()?>css/images/edit.png" width="32px" style="margin-left:20px;">
								</a>
							<?php
							}
						?>
					</div>
					<div class="ui-block-b" style="height:50px; width:15%">
						<a href="<?php echo base_url()?>index.php/celengan/tambah_isi/<?php echo $soal->id_soal;?>"><img src="<?php echo base_url()?>css/images/t_celengan.png" width="32px"></a>
					</div>
					<?php

					if ($flagged) {
						?>
						<div class="ui-block-c" style="height:50px; width:15%">
						<a href="<?php echo base_url()?>index.php/soal/unflag_soal/<?php echo $soal->id_soal?>" data-ajax="false"><img src="<?php echo base_url()?>css/images/flag.png" width="30px"></a>
						</div>
					<?php
					}else{
						?>
						<div class="ui-block-c" style="height:50px; width:15%">
						<a href="<?php echo base_url()?>index.php/soal/flag_soal/<?php echo $soal->id_soal?>" data-ajax="false"><img src="<?php echo base_url()?>css/images/unflag.png" width="30px"></a>
						</div>
					<?php
					}
					?>
					<!--menampilkan jumlah flag-->
					<div class="ui-block-d" style="height:40px; width:20%;"><p style="margin-top:-15px; margin-left:20px; font-size:23px"> <div id="flag"><b><?php echo $num_flag?></b></p></div></div>

					<!--menampilkan penjawab-->
					<div class="ui-block-e" style="height:40px; width:20%;"> <img src="<?php echo base_url()?>css/images/orang.png" width="17px" height="27px" style="margin-top:5px;"> <div id="flag"><p style="margin-top:-28px; font-size:16px"><b><? echo $num_penjawab?></b></p></div></div>
					</div>
					
					
					
				
				<?php //echo form_open('soal/cek_jawab'); ?>
				<form action="<?php echo base_url()?>index.php/soal/cek_jawab" data-transition="flip" method="POST">
					<input type="hidden" value="<?php echo $soal->id_soal?>" name="id"/>
					<input type="text" name="jawaban" id="" placeholder="jawaban"/>
					
					<button type="submit" data-inline="true">jawab</button>
					<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-ajax="false" data-inline="true" data-theme="b">acak</a>
				</form>
			</div>
		</div> 

		<div id="user-info"></div>