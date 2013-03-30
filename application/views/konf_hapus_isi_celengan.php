
	<div data-role="content"> 
		<p class="text">-------<i>Hapus soal</i>------</p>
		<img src="<?php echo base_url()?>css/images/celengan.png" width="25px" height="25px">

		<div data-role="fieldcontain" class="ui-hide-label">
			
			<div class="choice_list">		<!-- menampilkan celengan yang sudah di buat -->
			<ul data-role="listview" data-inset="true" data-theme="d">
				<li><?php
						$teks_soal = $this->Soal_model->selectsoal($isi_celengan[0]->id_soal)->row()->text_soal;
						echo $teks_soal;
					?>
				</li>
			</ul>
				<form>
					Apakah anda yakin akan menghapus koleksi soal ini?
				</form>
			</div>

			<?php echo form_open("celengan/del_isi")?>
				<input type="hidden" name="id_celengan" value="<?php echo $celengan->id_celengan?>"/>
				<input type="hidden" name="id_soal" value="<?php echo $isi_celengan[0]->id_soal?>"/>
				<button type="submit">Hapus</button>
			</form>
			
			<input type="button" onClick="logout();" value="Logout"/>
		</div>
	</div>
	<div id="user-info"></div>

