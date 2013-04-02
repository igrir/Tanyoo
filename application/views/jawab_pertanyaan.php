		<div data-role="content" id="celengan"> 
			<p class="text"><i>-----------soal----------</i></p> 
			<div data-role="fieldcontain" class="ui-hide-label">
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
					<li>
						<?php echo $soal->text_soal?>
					</li>				
					
				</ul>
				<!-- Disini buat menu-menu, edited by giri -->
				<div style="text-align: right;">
					<a href="<?php echo base_url()?>index.php/celengan/tambah_isi/<?php echo $soal->id_soal;?>"><img src="<?php echo base_url()?>css/images/celengan.png" width="30px"></a>

					<?php

					if ($flagged) {
						?>
						<a href="<?php echo base_url()?>index.php/soal/unflag_soal/<?php echo $soal->id_soal?>">unflag</a>
					<?php
					}else{
						?>
						<a href="<?php echo base_url()?>index.php/soal/flag_soal/<?php echo $soal->id_soal?>">flag</a>
					<?php
					}

					?>
					
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
		
	
