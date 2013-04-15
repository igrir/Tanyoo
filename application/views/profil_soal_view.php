
	<div data-role="content"> 
		<p class="text">-------<i>soal</i>------</p>
		<div data-role="fieldcontain" class="ui-hide-label">			

			<?php echo $pagination_link;?>
			<?php $i=1 ?>
			<?php foreach($data_soal as $t):?> 

			<?php 
				$num_penjawab = $this->Log_model->get_num_penjawab($t->id_soal);
				$num_flag = $this->Log_model->get_num_flag($t->id_soal);
			?>
			<div class="choice_list">
			<ul data-role="listview" data-inset="true" data-theme="d" id="tampil-text">
				<li>
						<a href="<?php echo base_url()?>index.php/soal/jawab_id/<?php echo $t->id_soal?>">
							<p style="color:black;"><b><?php echo $t->text_soal ?> ?</b></p>
							<p style="">by <?php echo $t->username; ?></p>	
							<p style="">#<?php echo $t->tag ?></p>	
							<!-- Flag sama penjawabnya kalau bisa diganti sama ikon :) -->
							<p style="">j:<?php echo $num_penjawab ?>,f:<?php echo $num_flag ?></p>	
						</a>

					
				</li>
			</ul>
			</div>
			<?php $i++; ?>
			<?php endforeach ?>	
			
			</ul>
		
		</div>
	</div>
	<div id="user-info"></div>
