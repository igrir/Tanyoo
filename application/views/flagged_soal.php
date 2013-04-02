
	<div data-role="content" id="celengan"> 
		<!-- <img src="<?php echo base_url()?>css/images/celengan.png" width="70px" height="60px"> -->
		<p class="text"><i>Soal kamu beri bendera</i></p>
		 <!--- tampilkan nama user -->
		<!-- <p class="text"><?php echo $profil->username; ?></p> -->
		

		<div data-role="fieldcontain" class="ui-hide-label">

			<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
				<li>
					<?php echo $soal->text_soal?>
				</li>				
			</ul>
			<a href="<?php echo base_url()?>index.php/soal/unflag_soal/<?php echo $soal->id_soal?>" data-ajax="false"><img src="<?php echo base_url()?>css/images/flag.png" width="30px"></a>
			<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-icon="arrow-r" data-iconpos="right">Jawab pertanyaan lagi</a>

		</div>
	</div>
	<div id="user-info"></div>

