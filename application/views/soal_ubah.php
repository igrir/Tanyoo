
		<div class="content">
			<p class="text">-------<i>edit pertanyaan</i>------</p>
	
				<a href="<?php echo base_url();?>index.php/soal/index">kembali ke edit soal</a>
			<?php $row= $data_soal->row(); ?> 
				<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
				<?php //echo form_open('soal/simpan_ubah', $attributes); ?>
				<div class="ui-body ui-body-d">
				<form method="POST" action="<?php echo base_url()?>index.php/soal/simpan_ubah" data-ajax="false"  data-transition="pop">
					<input type="hidden" name="id_soal" value="<?php echo $row->id_soal;?>"/> 		
					
						<label for="soal">Soal : </label>
						<textarea type="text" id="soal" placeholder="Soal" name="soal" class="required" title="soal harus diisi" size="60px"><?php echo $row->text_soal;?></textarea>

						<label for="jawaban">Jawaban : </label>
						<textarea type="text" id="jawaban" placeholder="Jawaban" name="jawaban" class="required" title="jawaban harus diisi" size="60px"><?php echo $row->jawaban;?></textarea>

						<label for="tag">Tag : </label>
						<input type="text" id="tag" placeholder="Tag" name="tag" class="required" value="<?php echo $row->tag;?>" title="tag harus diisi" size="30px">
						

						<label for="lock">Lock : </label>
							<select name="lock" data-role="slider" id="lock">
								<option value="1" <?php if($row->locked == 1) echo "selected"; //awalnya locked ?>>Lock</option> 
								<option Value="0" <?php if($row->locked == 0) echo "selected"; //awalnya locked?>>Open</option>
							</select>
						</label>
						

						<fieldset class="ui-grid-a">
							<div class="ui-block-a"><button type="submit" data-theme="e" data-inline="true">Submit</button></div>
						</fieldset>
				</form>		
				</div>
			</div>
		
	</div>
