
		<div class="content">
			<p class="text">-------<i>edit pertanyaan</i>------</p>
	
				
			<?php $row= $data_soal->row(); ?> 
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
			<?php //echo form_open('soal/simpan_ubah', $attributes); ?>

			<div class="ui-body ui-body-e ui-corner-all">
				<form method="POST" action="<?php echo base_url()?>index.php/soal/simpan_ubah" data-ajax="false" >
						<input type="hidden" name="id_soal" value="<?php echo $row->id_soal;?>"/> 		
				
						<label for="soal">Soal : </label>
						<textarea id="soal" placeholder="Soal" name="soal" class="required" title="soal harus diisi"><?php echo $row->text_soal;?></textarea>
				
					
						<label for="jawaban">Jawaban : </label>
						<textarea id="jawaban" placeholder="Jawaban" name="jawaban" class="required" title="jawaban harus diisi"><?php echo $row->jawaban;?></textarea>
					
					
						<label for="tag">Tag : </label>
						<input type="text" id="tag" placeholder="Tag" name="tag" class="required" value="<?php echo htmlentities($row->tag, ENT_QUOTES);?>" title="tag harus diisi">
					
					
						<label for="lock">Lock : </label>
							<select name="lock" data-role="slider" id="lock">
								<option value="1" <?php if($row->locked == 1) echo "selected"; //awalnya locked ?>>Lock</option> 
								<option Value="0" <?php if($row->locked == 0) echo "selected"; //awalnya locked?>>Open</option>
							</select>
						</label>
					
					<div class="ui-grid-a">	
						<div class="ui-block-a"><button type="submit" data-inline="true">submit</button></div>
					</div>
				</form>		
				dijawab: <?php echo $num_penjawab?>,
				flag: <?php echo $num_flag?>
			</div>
	</div>
