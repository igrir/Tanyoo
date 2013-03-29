		<div data-role="content"> 
			<p class="text"><i>soal</i></p> 
			<div data-role="fieldcontain" class="ui-hide-label">
				<ul data-role="listview" data-inset="true" data-theme="d"> <!---menampilkan pertanyaan-->
					<li>
						<?php echo $soal->text_soal?>
					</li>				
					<input type="hidden" value="<?php echo $soal->id_soal?>" name="id"/>
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
		
	
