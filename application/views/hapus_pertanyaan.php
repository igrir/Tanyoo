
	<div data-role="dialog" id="celengan"> 

		<div data-role="header" data-theme="d">
			<h1>Hapus</h1>
		</div>

		<div data-role="content" data-theme="c">
			<?php $row= $data_soal->row(); ?> 
			<h3>Hapus pertanyaan ini?</h3>
			<?php echo $row->text_soal; ?> <!--- tampilkan nama celengan -->
			<hr/>
			<?php
				//menampilkan jumlah flag
				echo "f:".$num_flag;

				//menampilkan penjawab
				echo "p:".$num_penjawab;
			?>

			<form method="POST" action="<?php echo base_url()?>index.php/soal/del_soal" data-ajax="false">
				<input type="hidden" name="id_soal" value="<?php echo $row->id_soal?>"/>
				<input type="Submit" value="Hapus" data-theme="e"/>
			</form>	
		</div>
		
	</div>

