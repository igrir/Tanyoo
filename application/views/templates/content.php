<?php

//Usage
	$user = $this->facebook->getUser();
if($user) {
    try {
        $user_info = $this->facebook->api('/me');
        echo '<pre>'.htmlspecialchars(print_r($user_info, true)).'</pre>';

        echo "usernamenya:". $user_info['username']. "<br/>";
        echo "fotonya: <img src='http://graph.facebook.com/". $user_info['username']. "/picture'/> <br/>";

        $params = array('next' => 'http://localhost/lab/FB/index.php/logout');

        echo "<br/>";
        echo "<a href=\"{$this->facebook->getLogoutUrl($params)}\">Logout</a>";

    } catch(FacebookApiException $e) {
        //echo "<a href=\"{$this->facebook->getLoginUrl()}\">Login using Facebook</a>";
        echo "gak konek";
        //echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
        $user = null;
    }
} else {
    echo "<a href=\"{$this->facebook->getLoginUrl()}\">Login using Facebook</a>";
}


?>
login 