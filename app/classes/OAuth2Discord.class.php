<?php
require_once('DotEnv.class.php');
require_once('callAPI.class.php');
(new DotEnv(__DIR__ . '/../../.env'))->load();

class OAuth2Discord{
    private $base_url;
    private $base_header;
    private $client_id;
    private $client_scope;
    private $client_secret;
    private $redirect_uri;

    public function __construct(){
        $this->base_url = getenv('DISCORD_CLIENT_BASE_URL');
        $this->base_header = getenv('DISCORD_CLIENT_BASE_HEADER');
        $this->client_id = getenv('DISCORD_CLIENT_ID');
        $this->client_scope = getenv('DISCORD_CLIENT_SCOPE');
        $this->client_secret = getenv('DISCORD_CLIENT_SECRET');
        $this->redirect_uri = getenv('DISCORD_REDIRECT_URI');

        $this->state = $this->_generateState();
        
        try{
            if(!isset($_GET['code']) && !isset($_GET['state'])) return;
            $this->state = $_GET['state'];
            $this->rawToken = $_GET['code'];
            $this->oauth2_url = $this->base_url.'/oauth2/token';
            $this->header = '\'Content-Type\': \'application/x-www-form-urlencoded\'';

            $this->data = array(
                "client_id" => $this->client_id,
                "client_secret" => $this->client_secret,
                "grant_type" => 'authorization_code',
                "code" => $this->rawToken,
                "redirect_uri" => "$this->redirect_uri",
                "scope" => 'identify'
            );

            $this->rawData = API::makeRequest(
                $this->oauth2_url,
                'QUERY',
                $this->data
            );

            $this->token_type = $this->rawData->token_type;
            $this->access_token = $this->rawData->access_token;

            $this->_setSessionState();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getUserData(){
        $this->header = array(
            $this->base_header, 
            'Authorization: '.$this->token_type.' '.$this->access_token
        );
        return API::makeRequest(
            $this->base_url.'/users/@me',
            'HEADER',
            $this->header
        );
    }

    public function generateOAuth2URL(){
        return 'https://discord.com/api/oauth2/authorize?response_type=code&client_id='
                .$this->client_id.'&redirect_uri='
                .$this->redirect_uri.'&scope='
                .$this->client_scope.'&state='
                .$this->state;
    }
    
    public function validateUser(){
        if(!isset($_SESSION['state'])) return false;
        if($_SESSION['state'] !== $this->state) return false;

        return true;
    }

    private function _setSessionState(){
        $_SESSION['state'] = $this->state;
    }

    private function _generateState(){
        return bin2hex(openssl_random_pseudo_bytes(16));
    }

}
?>