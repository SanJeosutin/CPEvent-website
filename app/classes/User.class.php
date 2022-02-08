<?php
require_once('OAuth2Discord.class.php');

class User{
    private $getURL;
    private $validateUser;

    private $user_id;
    private $username;
    private $user_discriminator;
    private $state;

    public function __construct(){
        $oauth2 = new OAuth2Discord();
        
        $this->getURL = $oauth2->generateOAuth2URL();
        $this->validateUser = $oauth2->validateUser();
        $this->user_id = $oauth2->getUserData()->id;
        $this->username = $oauth2->getUserData()->username;
        $this->user_discriminator = $oauth2->getUserData()->discriminator;
        $this->state = $oauth2->state;
    }

    public function getValidLogin(){
        return $this->validateUser;
    }

    public function getState(){
        return $this->state;
    }

    public function getOAuth2URL(){
        return $this->getURL;
    }

    public function getUserDiscordTag(){
        return $this->username.'#'.$this->user_discriminator;
    }

    private function _storeUserID(){
    }
}
?>