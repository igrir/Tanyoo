<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>register</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css"/>
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/jquery.mobile-1.2.0.min.js"></script>

		<style>
			body #logout { display:none; }
			body.connected #login { display: none; }
			body.connected #logout { display: block; }
			body.not_connected #login { display: block; }
			body.not_connected #logout { display: none; }
		</style>

	</head> 
<body> 
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