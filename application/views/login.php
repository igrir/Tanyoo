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


	   function loginUser() {    
    		FB.login(function(response) { }, {scope:'email'});     
       }

       function logout(){
       		FB.logout();
       		window.location.reload();
       }
	</script>
	<script>
        function handleStatusChange(response) {
        	console.log(response);
	      document.body.className = response.authResponse ? 'connected' : 'not_connected';
	      if (response.authResponse) {
	        console.log(response);

	        updateUserInfo(response);
	      }
	    }
	

	
	   function updateUserInfo(response) {
	     FB.api('/me', function(response) {
	       document.getElementById('user-info').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name;		       	
	       document.location = "index.php/login/"+response.id;
	     });
	   }

	   function loginUser() {    
	     FB.login(function(response) { }, {scope:'email'});     
	   }
	</script>

	<div data-role="page" id="one" data-theme="e" style="background:url(css/images/back.png) no-repeat;background-size:100% 100%;">  
		<div data-role="header" data-position="inline" data-theme="e"> 
			<h1>Register</h1> 
		</div> 
		
		<div data-role="content"> 

			<div id="login">
			   <p><button onClick="loginUser();">Login</button></p>
			</div>
			<div id="logout">
			   <p><button  onClick="logout();">Logout</button></p>
			</div>
		</div> 

		<div id="user-info"></div>
		
	</div> 
</body> 
</html> 