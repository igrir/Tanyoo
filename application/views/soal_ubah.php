
		<div class="content">
			<h1>Ubah Data</h1>
			<div class="data">		
			<?php $row= $data_soal->row(); ?> 
				<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
				<?php //echo form_open('soal/simpan_ubah', $attributes); ?>
				<form method="POST" action="<?php echo base_url()?>index.php/soal/simpan_ubah" data-ajax="false">
					<input type="hidden" name="id_soal" value="<?php echo $row->id_soal;?>"/> 		
					<table>
						<tr>
							<td><b>Soal</b></td>
							<td><input type="text" placeholder="Soal" name="soal" class="required" value="<?php echo $row->text_soal;?>" title="soal harus diisi" size="60px" ></td>
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
							<td><b>Lock</b></td>
							<td>
								<select name="lock" data-role="slider">
									<option value="1" <?php if($row->lock == 1) echo "selected";?>>Lock</option>
									<option Value="0" <?php if($row->lock == 0) echo "selected";?>>Open</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><input type="Submit" value="simpan"/></td>
						</tr>
					</table><br/>
				</form>		
			
			</table>
			</div>
		</div>
		
	</div>
