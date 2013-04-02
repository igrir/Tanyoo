
	<div data-role="content"> 
		<p class="text">-------<i>beri pertanyaan</i>------</p>
		<div data-role="fieldcontain" class="ui-hide-label">
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>

			<?php echo form_open('soal/add',$attributes); ?>
			<div class="ui-body ui-body-d ui-corner-all">
				<div data-role="fieldcontain">
					<!-- <input type="text" name="soal" placeholder="Soal"> -->
					<textarea name="soal" placeholder="Soal"></textarea>
					<input type="text" name="jawaban" placeholder="Jawaban" >
					<input type="text" name="tag" placeholder="Tag" >
				
					<input type="Submit" value="Post" name="post" data-inline="true" data-theme="b"/>
				</div>
			</div>

			<?php $i=1 ?>
			<?php foreach($data_soal as $t):?> 

			<?php 
				$num_penjawab = $this->Log_model->get_num_penjawab($t->id_soal);
				$num_flag = $this->Log_model->get_num_flag($t->id_soal);
			?>
			<div class="choice_list">
			<ul data-role="listview" data-inset="true" data-theme="d" id="tampil-text" data-split-icon="gear">
				<li>
					<a href=""></a>
					<p style="color:black; padding-left:10px;"><b><?php echo $t->text_soal ?> ?</b></p>
					<p style="padding-left:10px;">by <?php echo $t->username; ?></p>	
					<p style="padding-left:10px;">#<?php echo $t->tag ?></p>	
					<a href="<?php echo base_url()?>index.php/soal/ubah/<?php echo $t->id_soal?>"></a>

					<!-- Flag sama penjawabnya kalau bisa diganti sama ikon :) -->
					<p style="padding-left:10px;">j:<?php echo $num_penjawab ?>,f:<?php echo $num_flag ?></p>	
				</li>
			</ul>
			</div>
			<?php $i++; ?>
			<?php endforeach ?>	
			
			</ul>
		
		</div>
	</div>
	<div id="user-info"></div>
