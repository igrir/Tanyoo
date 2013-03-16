<html>
<head>
<title>Soal</title>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/table.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#soal").validate({
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
<body>
	<div class="content">
		<h1>Tanyoo</h1>
		<div class="data">		
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
				<td><?php echo $t->soal ?> ? </td>
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
		</div>
	</div>
</body>
</html>
