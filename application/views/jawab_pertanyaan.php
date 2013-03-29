		<div data-role="content"> 
			<p class="text"><i>soal</i></p> 
			<div data-role="fieldcontain" class="ui-hide-label">
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
					<li>
						<?php $row= $soal->row(); ?>
						<h3><?php echo $row->text_soal; ?></h3>
						<p>#<?php echo $row->tag;?></p>
						<p><?php echo anchor('soal/ubah/'.$row->id_soal,'update',array('class'=>'update'));?>
						<p><?php echo anchor('soal/flag/'.$row->id_soal,'flag');?>
			
		
					</li>				
						<input type="hidden" name="id_soal" value="<?php echo $row->id_soal;?>"/> 		
				</ul>
				<input type="text" name="" id="" placeholder="jawaban"/>
				<button type="submit">jawab</button>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				
			</div>
			
			 <div data-role="fieldcontain" class="ui-hide-label">
				<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-ajax="false">acak</a>
			</div>
		</div> 

		<div id="user-info"></div>
		
	
