
	<div data-role="content"> 
		<p class="text">-------<i>statistik</i>------</p>
		<p class="text"></p> <!--- tampilkan nama user -->

		<ul data-role="listview" data-inset="true" data-theme="e"> 
			<li>
				<h3>Statistik Tanyoo</h1>
				<p>Banyak Pengguna : <?php echo $num_user?></p>
				<p>Banyak Soal : <?php echo $num_soal?></p>
				<p>Banyak jawaban  : <?php echo $num_jawaban_soal?></p>
				<p>Banyak flag  : <?php echo $num_flagged_soal?></p>
			</li>		

			<li>
				<h3>Statistik Kamu</h1>
				<p>Banyak penjawab soalmu  : <?php echo $num_jawaban_soalmu?></p>
				<p>Banyak flagmu  : <?php echo $num_flagged_soalmu?></p>
			</li>					
		</ul>
		
		<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan 3 nama peserta skor tertinggi-->
			<?php
			$count = 1;
			foreach($highscore as $hs):?> 
			
			<li data-role="list-divider">Rangking <?php echo $count?></li>
			<li>
				<a href="<?php echo base_url()?>index.php/u/<?php echo $hs->username?>"><p><?php echo $hs->username;?></p></a> <!--masukkan nama-->
			</li>

			<?php 
			$count++;
			endforeach ?>
		</ul>
		
	</div>
	<div id="user-info"></div>

