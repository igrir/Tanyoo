	<script>
        function handleStatusChange(response) {
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