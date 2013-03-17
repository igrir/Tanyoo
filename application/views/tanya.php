	<div data-role="page" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" class="ui-navbar-custom" data-position="fixed" data-theme="e">
			<img border="0" src="<?php echo base_url()?>css/images/t.png" style="float:left;display:inline" width="20px"/>
			<img border="0" src="<?php echo base_url()?>css/images/search.png" style="float:right;display:inline" width="30px" data-role="button" />
			
			<div data-role="navbar" class="ui-navbar-custom"> 
				<ul> 
					<li><a href="#" id="home" data-icon="custom" class="ui-btn-active"></a></li> 
					<li><a href="#" id="profile" data-icon="custom"></a></li> 
					<li><a href="#" id="statistik" data-icon="custom"></a></li> 
				</ul> 
			</div> 
		</div>
		
		<div data-role="content">
			<div data-role="fieldcontain">
				<label>-----beri pertanyaan-----</label>
				<textarea cols="40"rows="10" name="textarea"id="textarea" placeholder="soal"></textarea> 
			</div>
			
			<div data-role="fieldcontain">
				<textarea cols="20"rows="10" name="textarea"id="textarea" placeholder="jawaban"></textarea> 
			</div>
			
			<div data-role="fieldcontain">
				<input type="text" name="tag" value="" id="tag" placeholder="tag"/>
			</div>
			
			<a href="" data-role="button" data-theme="a" data-inline="true">post</a>
		</div>
	