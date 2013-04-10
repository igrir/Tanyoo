
	<div data-role="content"> 
		
		<p class="text">-------<i>penghargaan</i>------</p>
		
		<p class="text"></p> <!--- tampilkan nama user -->
		<center>
		<img src="<?php echo base_url()?>css/images/penghargaan.png" width="60px" height="60px">
		</center>
		<div data-role="fieldcontain" class="ui-hide-label">
		<?php 	if($nama_penghargaan!=false){		
					foreach($nama_penghargaan as $row):
					echo "<ul data-role='listview' data-inset='true' data-theme='d' id='tampil-text'> ";?>
					<li>
					<img src="<?php echo base_url()?>css/images/penghargaan.png" width="32px" height="32px" class="ui-li-icon">
					<?php echo $row->nm_penghargaan;
					echo "</li>";
					echo "</ul>";
					endforeach;
					
				}else{
				
					echo "<div class='ui-body ui-body-a ui-corner-all'><p style='text-align:center;'>Anda Belum Mempunyai Penghargaan</p></div>";
				}
		?>
						
		</div>
	</div>
	<div id="user-info">
</div>
	
	<!---menampilkan pertanyaan-->
