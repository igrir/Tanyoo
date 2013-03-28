
		<div class="content">
			<p class="text">-------<i>edit pertanyaan</i>------</p>
			<div class="data">		
			<?php $row= $data_soal->row(); ?> 
				<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
				<?php //echo form_open('soal/simpan_ubah', $attributes); ?>
				<form method="POST" action="<?php echo base_url()?>index.php/soal/simpan_ubah" data-ajax="false">
					<input type="hidden" name="id_soal" value="<?php echo $row->id_soal;?>"/> 		
						<label for="soal">Soal</label>
						<input type="text" id="soal" placeholder="Soal" name="soal" class="required" value="<?php echo $row->text_soal;?>" title="soal harus diisi" size="60px">


						<label for="jawaban">Jawaban</label>
						<input type="text" id="jawaban" placeholder="Jawaban" name="jawaban" class="required" value="<?php echo $row->jawaban;?>" title="jawaban harus diisi" size="60px">


						<label for="tag">Tag</label>
						<input type="text" id="tag" placeholder="Tag" name="tag" class="required" value="<?php echo $row->tag;?>" title="tag harus diisi" size="30px">
						

						<label for="lock">Lock</label>
							<select name="lock" data-role="slider" id="lock">
								<option value="1" <?php if($row->lock == 1) echo "selected";?>>Lock</option>
								<option Value="0" <?php if($row->lock == 0) echo "selected";?>>Open</option>
							</select>
						</label>
						

						<fieldset class="ui-grid-a">
							<div class="ui-block-a"><button type="submit" data-theme="e" data-inline="true">Submit</button></div>
						</fieldset>
				</form>		
		
			</div>
		</div>
		
	</div>
