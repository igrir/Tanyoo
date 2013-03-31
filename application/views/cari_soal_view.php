<div data-role="content"> 
	<p class="text">-------<i>cari soal</i>------</p>
	<div data-role="fieldcontain" class="ui-hide-label">
		<form action="<?php echo base_url()?>index.php/soal/proses_cari_soal" method="POST" data-ajax="false">
			<table>
				<tr>
					<td><input type="text" placeholder="Pencarian" name="cari" size="60px" ></td>
				</tr>
				<tr>
					<td><input type="Submit" value="Cari" name="bcari" data-ajax="false" data-inline="true"/></td>
				</tr>					
			</table>
		</form>	
		<?php 
			if(isset($_POST['bcari'])){	?>
				<?php $i=1 ?>
				<?php foreach($data_soal as $t): //menampilkan hasil dari data_soal yang ada dicontroller ke dalam tabel?> 
				<div class="choice_list">		
				<ul data-role="listview" data-inset="true" data-theme="d" id="tag">
					<li><h3><?php echo $t->text_soal ?> ?</h3>
					<p><i>#<?php echo $t->tag ?></i></p>
					<p><?php echo anchor('soal/jawab_id/'.$t->id_soal,'jawab');?></p>
				</ul>
				<?php $i++; ?>
				<?php endforeach ?>						
		<?php
			}
		?>
			
	</div>
</div>