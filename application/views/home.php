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
	  };

	   // Load the SDK Asynchronously
	  (function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));


	   function loginUser() {    
    		FB.login(function(response) { }, {scope:'email'});     
       }

       function logout(){
       		FB.logout();
       		window.location = "<?php echo base_url()?>";
       }
	</script>

	<div data-role="page" id="one" data-theme="e" style="background:url(<?php echo base_url()?>/css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Home</h1> 
		</div> 
		
		<div data-role="content"> 

			<div data-role="fieldcontain" class="ui-hide-label">

				Selamat datang

				<input type="button" onClick="logout();" value="Logout"/>
			</div>

		</div> 

		<div id="user-info"></div>
		
	</div> 
</body> 
</html> 