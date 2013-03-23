
	<div data-role="content"> 
		<img src="<?php echo base_url()?>css/images/t2.png" />
		<div data-role="fieldcontain" class="ui-hide-label">
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
			<?php //echo form_open('soal/add',$attributes); ?>
			<form action="<?php echo base_url()?>index.php/soal/add" method="POST" data-ajax="false">
				<table>
					<tr>
						<td><input type="text" placeholder="Soal" name="soal" class="required" title="soal harus diisi" size="60px" ></td>
					</tr>
					<tr>
						<td><input type="text" placeholder="Jawaban" name="jawaban" class="required" title="jawaban harus diisi" size="60px"></td>
					</tr>
					<tr>
						<td><input type="text" placeholder="Tag" name="tag" class="required" title="tag harus diisi" size="30px"></td>
					</tr>
					<tr>
						<td><input type="Submit" value="post" class="orange" data-ajax="false"/></td>
					</tr>					
					</table><br/>
			</form>		
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
			<tr>
				<td align="center" valign="baseline"><?php echo anchor('soal/ubah/'.$t->id_soal,'update',array('class'=>'update'));?> </td> 
			</tr>
			<?php $i++; ?>
			<?php endforeach ?>					
			</table>				
			
			<input type="button" onClick="logout();" value="Logout"/>
		</div>
	</div>
	<div id="user-info"></div>

