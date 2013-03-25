<div data-role="content"> 
	<p class="text">-------<i>cari soal</i>------</p>
	<div data-role="fieldcontain" class="ui-hide-label">
		<form action="<?php echo base_url()?>index.php/soal/proses_cari_soal" method="POST" data-ajax="false">
			<table>
				<tr>
					<td><input type="text" placeholder="Pencarian" name="cari" size="60px" ></td>
				</tr>
				<tr>
					<td><input type="Submit" value="Cari" name="bcari" class="orange" data-ajax="false"/></td>
				</tr>					
			</table>
		</form>	
		<?php 
			if(isset($_POST['bcari'])){	?>
				<?php $i=1 ?>
				<?php foreach($data_soal as $t): //menampilkan hasil dari data_soal yang ada dicontroller ke dalam tabel?> 
				<table>		
				<tr>
					<td><?php echo $t->text_soal ?> ? </td>
				</tr>
				<tr>
					<td><?php echo $t->jawaban ?></td>
				</tr>
				<tr>
					<td>#<?php echo $t->tag ?></td>
				</tr>
				<?php $i++; ?>
				<?php endforeach ?>					
				</table>	
		<?php
			}
		?>
			
	</div>
</div>