
	<div data-role="content"> 
		<p class="text">-------<i>beri pertanyaan</i>------</p>
		<div data-role="fieldcontain" class="ui-hide-label">
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>

			<?php echo form_open('soal/add',$attributes); ?>
			<div class="ui-body ui-body-d ui-corner-all">
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
					<br>
				<!--ini linknya bisa di ganti ga?aku udah coba kalo pake a href gabisa, soalnya buttonnya jadi gamau kecil kalo ngelinknya begini-->
				<!--<p data-role="button" data-inline="true" data-theme="a"><?php //echo anchor('soal/ubah/'.$t->id_soal,'edit',array('class'=>'update'));?><img src="<?php// echo base_url()?>css/images/edit.png" width="20px" style="float:right;"></p>-->
				<a href="<?php echo base_url()?>index.php/soal/ubah/<?php echo $t->id_soal?>"><img src="<?php echo base_url()?>css/images/edit.png" width="20px" style="float:right;"></a>
				
				</li>
			</ul>
			<?php $i++; ?>
			<?php endforeach ?>	
			
			</ul>
			</div>			
		</div>
	</div>
	<div id="user-info"></div>

