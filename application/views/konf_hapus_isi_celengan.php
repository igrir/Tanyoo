
	<div data-role="content" id="celengan" >
		<p class="text">-------<i>Hapus soal</i>------</p>
		<img src="<?php echo base_url()?>css/images/celengan.png" width="70px" height="60px">

		<div data-role="fieldcontain" class="ui-hide-label">
			
			<div class="choice_list">		<!-- menampilkan celengan yang sudah di buat -->
			<ul data-role="listview" data-inset="true" data-theme="b">
				<li><?php
						$teks_soal = $this->Soal_model->selectsoal($isi_celengan[0]->id_soal)->row()->text_soal;
						echo $teks_soal;
					?>
				</li>
			</ul>
			
			<h4 class="text4">Apakah anda yakin akan menghapus koleksi soal ini?</h4>



			</div>

			<?php echo form_open("celengan/del_isi")?>
				<input type="hidden" name="id_celengan" value="<?php echo $celengan->id_celengan?>"/>
				<input type="hidden" name="id_soal" value="<?php echo $isi_celengan[0]->id_soal?>"/>
				<button type="submit" data-inline="true" data-type="horizontal" data-theme="a">Hapus</button>
				<a href="isi_celengan.php" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancel</a> 
			</form>
			
		</div>
	</div>
	<div id="user-info"></div>

