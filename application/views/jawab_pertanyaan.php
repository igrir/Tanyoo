		<div data-role="content"> 
			<p class="text"><i>-----------soal----------</i></p> 
			<div data-role="fieldcontain" class="ui-hide-label">
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
					<a href="<?php echo base_url()?>index.php/celengan/tambah_isi/<?php echo $soal->id_soal;?>"><img src="<?php echo base_url()?>css/images/celengan.png" width="40px"></a>
					<li>
						<?php echo $soal->text_soal?>
					</li>				
					
				</ul>
				<?php echo form_open('soal/cek_jawab'); ?>
					<input type="hidden" value="<?php echo $soal->id_soal?>" name="id"/>
					<input type="text" name="jawaban" id="" placeholder="jawaban"/>
					<button type="submit" data-inline="true">jawab</button>
				</form>
			</div>
			 <div data-role="fieldcontain" class="ui-hide-label">
				<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-ajax="false">acak</a>
			</div>
		</div> 

		<div id="user-info"></div>
		
	
