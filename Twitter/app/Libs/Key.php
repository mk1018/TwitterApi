<?php

namespace App\Libs;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Key
{

    public function __construct(){
        $this->api_key = "hN31DhMeAI8EXEr9gLUcsvkF0" ;	// API Key
        $this->api_secret = "s8AuZ66eOfcORLwafE57ziLrqyHXLDXnbaG0jpeVOcx8ioJTW3" ;	// API Secret
        $this->callback_url = "http://localhost/" ;	// Callback URL (このプログラムのURLアドレス)

        $this->access_token_secret = "" ; // [アクセストークンシークレット] (まだ存在しないので「なし」)

        $this->credential = base64_encode( $this->api_key . ":" . $this->api_secret ) ;

    }

    public function keys_return(){
        $keys = array(
            'api_key' => $this->api_key,
            'api_secret' => $this->api_secret,
            'callback_url' => $this->callback_url,
            'access_token_secret' => $this->access_token_secret,
            'credential' => $this->credential
        );

        return $keys;
    }
}
