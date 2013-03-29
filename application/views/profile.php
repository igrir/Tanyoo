
		<div data-role="content"> 
			<p class="text"><i><?php echo $profil->username; ?></i></p> <!-- untuk menampilkan nama user -->
			<div data-role="fieldcontain" class="ui-hide-label">
				<div class="ui-body ui-body-d">
				<div class="choice_list">		
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan bio dari user-->			
					<li>
							<?php echo $profil->bio; ?>
					</li>
				</ul>
				</div>	
				</div>
			</div>
			<p class="text">----------<i>skor</i>----------</p>
			<div class="ui-grid-a"> 
				<div class="ui-block-a" id="tampilskor" class="jawaban">
					jawaban
				</div> 
				<div class="ui-block-b" id="tampilskor" class="soal">
					soal
				</div> 
			</div> 
			<div data-role = "fieldcontain" class="ui-hide-label">

				<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/celengan/"><img src="<?php echo base_url()?>css/images/celengan.png" width="25px" height="25px"></a>
				<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/penghargaan/"><img src="<?php echo base_url()?>css/images/penghargaan.png" width="25px" height="25px"></a>

			</div>
			
			<p class="text">----------<i>penjawab</i>----------</p>
		</div> 

		<div id="user-info"></div>
		
	
