<html> 
	<head> 
	<meta charset="utf-8"> 
	<title>Beranda</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css"/>
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.mobile-1.2.0.min.js"></script>
</head> 
<body> 
	<div data-role="page" data-theme="e" style="background:url(css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" class="ui-navbar-custom" data-position="fixed" data-theme="e">
			<img border="0" src="css/images/t.png" style="float:left;display:inline" width="20px"/>
			<img border="0" src="css/images/search.png" style="float:right;display:inline" width="30px" data-role="button" />
			
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
	</div>
</body>
</html>