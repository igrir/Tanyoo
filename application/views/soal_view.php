<html>
<head>
<title>Soal</title>
<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>/css/images/back.png) no-repeat;background-size:100% 100%;">  
<div data-role="header" data-position="inline" data-theme="e"> 
	<h1>Home</h1> 
</div> 
<body>
	<div data-role="content"> 
		<h1>Tanyoo</h1>
		<div data-role="fieldcontain" class="ui-hide-label">
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
			<?php echo form_open('soal/add',$attributes); ?>
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
						<td><input type="Submit" value="simpan" class="orange" /></td>
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
</body>
</html>
