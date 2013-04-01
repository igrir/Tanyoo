

<div data-role="page" data-theme="e" style="background:url(<?php echo base_url()?>css/images/back.png) no-repeat;background-size:100% 100%;" data-add-back-btn="true" data-back-btn-text="back">  
		<div data-role="header" data-position="fixed" data-theme="a"> 

			<div class="ui-grid-d" style="text-align:center;"> 
				<div class="ui-block-a"><img src="<?php echo base_url()?>css/images/t.png" width="17px" style="padding-top:7px;"></div> 

				<div class="ui-block-b" id="atas"><a href="<?php echo base_url()?>index.php/home" data-ajax="false"><img src="<?php echo base_url()?>css/images/home.png" width="25px" height="25px"></a>
				</div> 

				<div class="ui-block-c" id="atas"><a href="<?php echo base_url();?>index.php/u/<?php echo $this->session->userdata('username')?>" data-ajax="false" ><img src="<?php echo base_url()?>css/images/profile.png" width="25px"></a></div> 
				<div class="ui-block-d" id="atas"><a href=""><img src="<?php echo base_url()?>css/images/a_statistik.png" width="25px"></a></div> 
				<div class="ui-block-e" id="atas"><a href="<?php echo base_url()?>index.php/soal/cari_soal"><img src="<?php echo base_url()?>css/images/search.png" width="25px"></a></div> 
			</div>
		</div> 
		
		