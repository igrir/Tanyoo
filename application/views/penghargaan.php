
	<div data-role="content"> 
		<p class="text">-------<i>penghargaan</i>------</p>
		<p class="text"></p> <!--- tampilkan nama user -->
		<img src="<?php echo base_url()?>css/images/penghargaan.png" width="25px" height="25px">
		
		<div data-role="fieldcontain" class="ui-hide-label">
		<?php 	if($nama_penghargaan!=false){		
					foreach($nama_penghargaan as $row):
					echo $row->nm_penghargaan;
					endforeach;
				}
				else
				
				echo "Anda Belum Mempunyai Penghargaan";
					?>
						
		</div>
	</div>
	<div id="user-info"></div>

