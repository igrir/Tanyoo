	<div id="fb-root"></div>
	<script>

	  window.fbAsyncInit = function() {
	    // init the FB JS SDK
	    FB.init({
	      appId      : '467472536639794', // App ID from the App Dashboard
	      channelUrl : '//localhost/lab/tanyoo/channel.html', // Channel File for x-domain communication
	      status     : true, // check the login status upon init?
	      cookie     : true, // set sessions cookies to allow your server to access the session?
	      xfbml      : true  // parse XFBML tags on this page?
	    });

	    //FB.login(function(response) { }, {scope:'email'}); 
	    // Additional initialization code such as adding Event Listeners goes here
		FB.Event.subscribe('auth.statusChange', handleStatusChange);
	  };

	   // Load the SDK Asynchronously
	  (function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));

        function handleStatusChange(response) {
	      document.body.className = response.authResponse ? 'connected' : 'not_connected';
	      if (response.authResponse) {
	        console.log(response);

	        updateUserInfo(response);
	      }
	    }
	

	
	   function updateUserInfo(response) {
	     FB.api('/me', function(response) {
	       //document.getElementById('user-info').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name;		       	

	       $("#fbid").val(response.id);

	       var image = '<center><img src="https://graph.facebook.com/' + response.id + '/picture"></center>';
	       $("#gambar").html(image);
	     });
	   }

	   function cekUser() {
		   		$.ajax({
		   			url:"<?php echo base_url()?>index.php/user/get_num_user?username="+$("#username_tmp").val(),
		   			cache: false
		   		}).done(function(result){
		   			if (result != 0) {
		   				//alert("Sudah ada nama itu, gunakanlah nama lain");
		   				$("#peringatan").html("Sudah ada nama itu, gunakanlah nama lain");
		   			}else{



		   				var tombol = "<div data-corners='true' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-icon='null' data-iconpos='null' data-theme='e' class='ui-btn ui-shadow ui-btn-corner-all ui-btn-up-e' aria-disabled='false'>\
											<span class='ui-btn-inner ui-btn-corner-all'>\
												<span class='ui-btn-text'>Submit</span>\
											</span>\
											<input type='submit' id='cek' value='Submit' class='ui-btn-hidden' aria-disabled='false'>\
									  </div>\
									  <input type='hidden' name='username' value='"
									  +$("#username_tmp").val()+
									  "'/>";

		   				$("#submit_area").html(tombol);

						$("#username_tmp").prop('disabled', true);
		   			}
		   		});
	   }

	</script>

	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>/css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Register</h1> 
		</div> 
		
		<div data-role="content"> 



			<div data-role="fieldcontain" class="ui-hide-label">


				<div id="gambar"></div>


				<form action="<?php echo base_url()?>/index.php/user/add_user" method="post" accept-charset="utf-8">


				<label for="username">Nama Tampilan</label>
				<input type="text" name="username_tmp" id="username_tmp" value="" placeholder="Nama Tampilan"/>
				<span id="peringatan"></span>
				<small>hanya gunakan 1 kata tanpa spasi</small>

				<br/><br/>

				<label for="username">Bio</label>
				<textarea id="bio" name="bio" placeholder="Bio" required></textarea>

				<br/>

				<input type="hidden" id="fbid" name="fbid" placeholder="fbid" />
				
				<br/>

				<label for="minat">Minat</label>
				<input type="text" name="minat" id="minat" value="" placeholder="Minat, pisahkan dengan spasi" required/>
				<br/>

				<div id="submit_area">
					<input type="button" id="cek" value="Ok?" onClick="cekUser();"/>
				</div>
				
			</div>

		</div> 

		<div id="user-info"></div>
		
	</div> 
</body> 
</html> 