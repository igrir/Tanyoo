		<div data-role="content"> 
			<p class="text"><i>-----------soal----------</i></p> 
			
				<ul data-role="listview" data-inset="true" data-theme="d" id="tampil-text"> <!---menampilkan pertanyaan-->
					<li>
						<?php echo $soal->text_soal?>
						<p style="margin-top:5px">by <?php echo $soal->username; ?></p>	
						<p>#<?php echo $soal->tag ?></p>	
					</li>				
					
				</ul>
				<ul data-role="listview" data-inset="true" data-theme="b" id="tampil-text"  >
					<li>
					<h2><?php echo $soal->jawaban ?></h2>
					<p style="color:#3ADF00; font-size:25px"><b>benar</b></h4>
					<p style="color:#ffffff">Jawaban benar : <?php echo $soal->jawaban ?></p>
					</li>
				</ul>
			
				<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-ajax="false">acak</a>

		</div> 

		<div id="user-info"></div>
		
	
