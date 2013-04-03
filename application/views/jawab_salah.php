		<div data-role="content"> 
			<p class="text"><i>soal</i></p> 
			
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
					<li>
						<?php echo $soal->text_soal?>
						<p style="margin-top:5px">by <?php echo $soal->username; ?></p>	
						<p>#<?php echo $soal->tag ?></p>	
					</li>	
					</li>				
					
				</ul>
				
				<ul data-role="listview" data-inset="true" data-theme="a" id="tampil-text"  >
					<li>
					<h2></h2> <!---- menampilkan jawaban user-->
					<p style="color:#B40404; font-size:30px"><b>salah</b></h4>
					<p style="color:#ffffff">Jawaban benar : <?php echo $soal->jawaban ?></p>
					</li>
				</ul>
				<!-- Disini buat menu-menu, edited by giri -->
				<div class="ui-grid-d">
					
					<div class="ui-block-a" style="height:50px; width:10%"></div>
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
				
					//menampilkan jumlah flag
					echo "<div class='ui-block-d ui-body-e' style='height:40px; width:25%; margin-top:-10px;'> <div id='flag'><p>flag : ".$num_flag."</p></div></div>";

					//menampilkan penjawab
					echo "<div class='ui-block-e ui-body-c' style='height:40px; width:35%; margin-top:-10px;'> <div id='flag'><p>penjawab : ".$num_penjawab."</p></div></div>";
					?>
				</div>


			
			<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-ajax="false">acak</a>
		</div> 

		<div id="user-info"></div>
		
	
