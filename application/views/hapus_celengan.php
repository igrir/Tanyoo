
	<div data-role="dialog" id="celengan"> 

		<div data-role="header" data-theme="d">
			<h1>Hapus</h1>
		</div>

		<div data-role="content" data-theme="c">
			<h3>Hapus celengan ini?</h3>
			<p class="text"><?php echo $celengan->nama_celengan; ?></p> <!--- tampilkan nama celengan -->

			
			<form method="POST" action="<?php echo base_url()?>index.php/celengan/del_celengan" data-ajax="false">
				<input type="hidden" name="id_celengan" value="<?php echo $celengan->id_celengan?>"/>
				<input type="Submit" value="Hapus" data-theme="e"/>
			</form>	
		</div>
		
	</div>

