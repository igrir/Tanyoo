
		<div data-role="content"> 
			<p class="text"><i><?php echo $profil->username; ?></i></p> <!-- untuk menampilkan nama user -->
			<div data-role="fieldcontain" class="ui-hide-label">
				<ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-theme="d">
				<li>
					<a href="">
					<img src="<?php echo base_url()?>css/images/user.png"/>
					<h3><?php echo $profil->bio; ?></h3>
					<p>minat : <?php echo $profil->minat; ?></p><br/>
					<p><?php echo anchor('Profil/profile_ubah/'.$profil->username ,'update profile');?></p>
			
					<a href="" data-rel="popout" data-position-to="window" data-transition="pop"></a>
				</li>
				</ul>
			</div>
			<p class="text">----------<i>skor</i>----------</p>
			<div class="ui-grid-a"> 
				<div class="ui-block-a ui-body-d" id="tampilskor" class="jawaban">
					jawaban
				</div> 
				<div class="ui-block-b" id="tampilskor" class="soal">	
					<div class="ui-body-a">
					<p class="text2"><?php echo $jml_soal; ?></p>
					</div>
					soal
				</div> 
			</div> 
			<div data-role = "fieldcontain" class="ui-hide-label">

				<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/celengan/"><img src="<?php echo base_url()?>css/images/celengan.png" width="40px" height="40px"></a>
				<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/penghargaan/"><img src="<?php echo base_url()?>css/images/penghargaan.png" width="40px" height="40px"></a>

			</div>
			
			<p class="text">----------<i>penjawab</i>----------</p>
		</div> 

		<div id="user-info"></div>
		
	
