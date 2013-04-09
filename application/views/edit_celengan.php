
	<div data-role="content" id="celengan"> 
		<p class="text">--<i>edit nama celengan</i>--</p>
		<p class="text"><?php echo $celengan->nama_celengan; ?></p> <!--- tampilkan nama user -->

		<div data-role="fieldcontain" class="ui-hide-label">
			
			
			<?php echo form_open('celengan/edit_celengan'); ?>
			<div class="ui-body ui-body-d">
				<div data-role="fieldcontain">
					<input type="hidden" name="id_celengan" value="<?php echo $celengan->id_celengan?>"/>
					<input type="text" placeholder="Nama Celengan" name="nama_celengan" class="required" title="nama celengan harus diisi" value="<?php echo htmlentities($celengan->nama_celengan, ENT_QUOTES)?>"/>
					<input type="Submit" value="Edit" data-inline="true" data-theme="e" data-ajax="false"/>
					<a href="<?php echo base_url()?>index.php/celengan/hapus_celengan/<?php echo $celengan->id_celengan?>" data-rel="dialog" data-role="button" data-inline="true" data-theme="a">Hapus</a>
				</div>
			</div>

		</div>
	</div>
	<div id="user-info"></div>

