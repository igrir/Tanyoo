	<div data-role="content"> 
			<p class="text"><i><?php echo $profil->username; ?></i></p> <!-- untuk menampilkan nama user -->
			<div data-role="fieldcontain" class="ui-hide-label">
				<ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-theme="d">
				<li>
					<a href="">
					<img src="<?php echo base_url()?>css/images/user.png" style="padding:10px;">
					<h3 id="bio"><?php echo $profil->bio; ?></h3>
					<p>minat : <?php echo $profil->minat; ?></p>
					<p>skor : <?php echo $skor; ?></p>


					<?php

						//cek dulu apakah ini user yang login
						//dengan demikian user lain tidak bisa mengubah profil orang
						$username = $this->session->userdata('username');

						if ($username == $profil->username) {
							?>
								<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/edit_profil" data-rel="popout" data-position-to="window" data-transition="pop"></a> <!--untuk edit profile masukkan link disini-->
							<?php
						}
					?>
					</a>
				</li>
				</ul>
			</div>
			<p class="text">----------<i>skor</i>----------</p>
					<div class="ui-grid-a"> 
				<a href="<?php echo base_url()?>index.php/<?php echo $profil->username?>/jawab">
		          <div class="ui-block-a" id="tampilskor" class="jawaban">
		            <h3 class="text3"><?php echo $skor; ?></h3>
		            <p class="tengah" style="color:black;">jawaban</p>
		          </div> 
		        </a>
		
		        <a href="<?php echo base_url()?>index.php/<?php echo $profil->username?>/soal">
		          <div class="ui-block-b" id="tampilskor" class="soal">
		            <h3 class="text2"><?php echo $jml_soal; ?></h3>
		            <p class="tengah" style="color:black;">soal</p>
		          </div> 
		        </a>
			</div> 
			
			<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/celengan/"><img src="<?php echo base_url()?>css/images/t_celengan.png" width="60px" height="60px"></a>
			<a href="<?php echo base_url()?>index.php/u/<?php echo $profil->username?>/penghargaan/"><img src="<?php echo base_url()?>css/images/t_penghargaan.png" width="60px" height="60px"></a>
				
			
			<p class="text">----------<i>penjawab</i>----------</p>
			<ol data-role="listview" data-inset="true" data-theme="e">
				<?php 
					foreach($penjawab as $t):?>
					<li>
						<a href="<?php echo base_url()?>index.php/u/<?php echo $t->username?>"><?php echo $t->username;?></a>
					</li>
				<?php
					endforeach 
				?>	
			</ol>
		</div> 

		<div id="user-info"></div>
		
	
