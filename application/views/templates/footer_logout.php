	

	
	<div data-role="footer" data-position="fixed"> 
	<div data-role="navbar">
		<ul>
			<li style="text-align:center; padding-top:10px;">&copy; Tanyoo 2013</li>
			<li><a href="<?php echo base_url()?>index.php/login/logout" data-rel="popup" data-position-to="window" data-transition="pop" data-ajax="false" data-theme="a" style="float:right;"><img src="<?php echo base_url()?>css/images/out.png" width="15px">&nbsp;logout</a></li>
		</ul>
	</div><!-- /navbar -->
	
	<!-- kalo logout pengen pake dialog ini tapi gabisa euy, tadi link di atas udah di ganti jadi ke id yang di bawah ini, tapi gagal terus-->
	<div data-role="popup" id="b" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
		<div data-role="header" data-theme="a" class="ui-corner-top">
			<h1>logout?</h1>
		</div>
		<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
			<h3 class="ui-title">Anda yakin akan keluar?</h3>
			<a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancel</a>    
			<a href="<?php echo base_url()?>index.php/login/logout" data-ajax="false" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Logout</a>  
		</div>
	</div>
	</div>
	</div>
	</body>

</html>