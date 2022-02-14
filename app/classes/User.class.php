<?php
include_once('DatabaseHandler.class.php');
include_once('OAuth2Discord.class.php');


class User extends OAuth2Discord{
    public function __construct(){
        $oauth2 = new OAuth2Discord();
        $this->db = new DatabaseHandler();

        $this->userData = $oauth2->getUserData();

        $this->getURL = $oauth2->generateOAuth2URL();
        $this->user_id = $oauth2->getUserData()->id;
        $this->username = $oauth2->getUserData()->username;
        $this->user_guilds = $oauth2->getUserGuildData()->guilds[0]->name;
        $this->user_discriminator = $oauth2->getUserData()->discriminator;
        $this->user_avatar = $oauth2->getUserData()->avatar;

        $this->guildId = $oauth2->getGuildId();
        $this->state = $oauth2->state;

        $this->db_query_checkUser = 'SELECT * FROM usersdata WHERE userID = '.$this->user_id.';';
    }

    //!WAS HERE
    public function isUserValid(){
        echo $this->user_guilds;
        if(isset($_SESSION['state'])){
            if($_SESSION['state'] === $this->getState()){
                if($this->user_guilds === $this->guildId){
                    return true; 
                }
            }
        }
        return false;
    }

    public function getState(){
        $sql = 'SELECT * FROM usersdata WHERE userID = '.$this->user_id.';';
        $result = $this->db->connection->prepare($sql);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['userSessionState'];
    }

    public function getOAuth2URL(){
        return $this->getURL;
    }

    public function getUserDiscordTag(){
        return $this->username.'#'.$this->user_discriminator;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getUserImage(){
        return 'https://cdn.discordapp.com/avatars/'.$this->user_id.'/'.$this->user_avatar;
    }

    public function storeUserData(){
        if($this->db->isExist($this->db_query_checkUser)){
           $sql = "UPDATE usersdata SET userSessionState = '".$this->state."' WHERE userID ='".$this->user_id."';";
        }else{
           $sql = "INSERT INTO usersdata (userID, userSessionState, userAccessToken) VALUES ('$this->user_id', '$this->state', '".$_SESSION['access_token']."')";
        }
        $this->db->exec($sql);
    }
}
?>