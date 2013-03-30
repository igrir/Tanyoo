
	<div data-role="content"> 
		<p class="text">-------<i>beri pertanyaan</i>------</p>
		<div data-role="fieldcontain" class="ui-hide-label">
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>

			<?php echo form_open('soal/add',$attributes); ?>
			<div class="ui-body ui-body-d">
				<div data-role="fieldcontain">
					<input type="text" name="soal" placeholder="Soal">
					<input type="text" name="jawaban" placeholder="Jawaban" >
					<input type="text" name="tag" placeholder="Tag" >
				
					<input type="Submit" value="Post" name="post" data-inline="true" data-theme="b"/>
				</div>
			</div>
			</form>	

			<?php $i=1 ?>
			<?php foreach($data_soal as $t):?> 
			<div class="choice_list">		
			<ul data-role="listview" data-inset="true" data-theme="d" id="tampil-text">
				<li>
					<h3><?php echo $t->text_soal ?> ?</h3>
					<p>by <?php echo $t->username; ?></p>	
					<p>#<?php echo $t->tag ?></p>				
					<p><span class="ui-li-count"><?php echo anchor('soal/ubah/'.$t->id_soal,'update',array('class'=>'update'));?></p>
				</li>
			</ul>
			<?php $i++; ?>
			<?php endforeach ?>	
			
			</ul>
			</div>			
		</div>
	</div>
	<div id="user-info"></div>

