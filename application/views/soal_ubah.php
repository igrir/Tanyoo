<html>
<head>
<title>Soal</title>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
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
		<h1>Ubah Data</h1>
		<div class="data">		
		<?php $row= $data_soal->row(); ?> 
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
			<?php echo form_open('soal/simpan_ubah', $attributes); ?>
				<input type="hidden" name="id_soal" value="<?php echo $row->id_soal;?>"/> 		
				<table>
					<tr>
						<td><b>Soal</b></td>
						<td><input type="text" placeholder="Soal" name="soal" class="required" value="<?php echo $row->soal;?>" title="soal harus diisi" size="60px" ></td>
					</tr>
					<tr>
						<td><b>Jawaban</b></td>
						<td><input type="text" placeholder="Jawaban" name="jawaban" class="required" value="<?php echo $row->jawaban;?>" title="jawaban harus diisi" size="60px"></td>
					</tr>
					<tr>
						<td><b>Tag</b></td>
						<td><input type="text" placeholder="Tag" name="tag" class="required" value="<?php echo $row->tag;?>" title="tag harus diisi" size="30px"></td>
					</tr>
					<tr>
						<td><input type="Submit" value="simpan" class="orange"/></td>
					</tr>
				</table><br/>
			</form>		
		
		</table>
		</div>
	</div>
</body>
</html>
