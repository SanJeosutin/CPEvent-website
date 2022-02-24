<?php
include_once('DatabaseHandler.class.php');
include_once('OAuth2Discord.class.php');


class User extends OAuth2Discord{
    static $db;
    static $userData;
    static $getURL;
    static $user_data;
    static $user_id;
    static $username;
    static $user_guilds;
    static $user_discriminator;
    static $user_avatar;
    static $guildId;
    static $state;
    static $db_query_checkUser;

    static public function load(){
        if(!isset($_SESSION['state']) || !isset($_SESSION['user_id'])){
            $oauth2 = new OAuth2Discord();
            
            self::$userData = $oauth2->getUserData();
            self::$getURL = $oauth2->generateOAuth2URL();

            self::$user_data = $oauth2->getUserData();
            self::$user_id = $oauth2->getUserData()->id;
            self::$username = $oauth2->getUserData()->username;
            
            self::$user_guilds = json_encode($oauth2->getUserGuildData()); 
            self::$user_discriminator = $oauth2->getUserData()->discriminator;
            self::$user_avatar = $oauth2->getUserData()->avatar;

            self::$guildId = $oauth2->getGuildId();
            self::$state = $oauth2->state;
        }
        self::$db = new DatabaseHandler();
        self::$db_query_checkUser = 'SELECT * FROM usersdata WHERE userID = '.self::$user_id.';';
    }

    static public function isUserValid(){
        if(isset($_SESSION['state'])){
            if($_SESSION['state'] === self::getState()){
                $userGuilds = json_decode(self::$user_guilds);
                foreach($userGuilds as $arr){
                    if($arr->id == self::$guildId){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    static public function getState(){
        $sql = 'SELECT * FROM usersdata WHERE userID = '.self::$user_id.';';
        $result = self::$db->connection->prepare($sql);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['userSessionState'];
    }

    static public function getUserId(){
        return self::$user_id;
    }

    static public function getOAuth2URL(){
        return self::$getURL;
    }

    static public function getUserDiscordTag(){
        return self::$username.'#'.self::$user_discriminator;
    }

    static public function getUsername(){
        return self::$username;
    }

    static public function getUserImage(){
        return 'https://cdn.discordapp.com/avatars/'.self::$user_id.'/'.self::$user_avatar;
    }

    static public function storeUserData(){
        $sql = "";
        if(self::$db->isExist(self::$db_query_checkUser)){
           $sql = "UPDATE usersdata SET userSessionState = '".self::$state."' WHERE userID ='".self::$user_id."';";
        }else if(!empty(self::$user_id)){
           $sql = "INSERT INTO usersdata (userID, userSessionState, userAccessToken) VALUES ('".self::$user_id."', '".self::$state."', '".$_SESSION['access_token']."')";
        }

        self::$db->exec($sql);
    }
}
?>