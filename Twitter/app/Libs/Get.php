<?php

namespace App\Libs;
use App\Libs\Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Get
{

    public function __construct(){
        $call = new Auth();
        $this->bearer_token = $call->bearer_token();

    }

    public function index(){
        $arr = $this->my_tweet();
        return $arr;
        // $this->bearer_token();
    }

    public function my_tweet(){
        /**************************************************

            GETメソッドのリクエスト [ベアラートークン]

        **************************************************/

        // 設定
        $bearer_token = $this->bearer_token ;	// ベアラートークン
        $request_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json' ;	// リクエストURL

        // パラメータ
        $params = array(
            'screen_name' => '@Mk1018Web' ,
            'count' => 10 ,
        ) ;

        // パラメータがある場合
        if ( $params ) {
            $request_url .= '?' . http_build_query( $params ) ;
        }

        // リクエスト用のコンテキスト
        $context = array(
            'http' => array(
                'method' => 'GET' , // リクエストメソッド
                'header' => array(			  // ヘッダー
                    'Authorization: Bearer ' . $bearer_token ,
                ) ,
            ) ,
        ) ;

        // cURLを使ってリクエスト
        $curl = curl_init() ;
        curl_setopt( $curl, CURLOPT_URL, $request_url ) ;	// リクエストURL
        curl_setopt( $curl, CURLOPT_HEADER, true ) ;	// ヘッダーを取得する
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $context['http']['method'] ) ;	// メソッド
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false ) ;	// 証明書の検証を行わない
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ) ;	// curl_execの結果を文字列で返す
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $context['http']['header'] ) ;	// ヘッダー
        curl_setopt( $curl, CURLOPT_TIMEOUT, 5 ) ;	// タイムアウトの秒数
        $res1 = curl_exec( $curl ) ;
        $res2 = curl_getinfo( $curl ) ;
        curl_close( $curl ) ;

        // 取得したデータ
        $json = substr( $res1, $res2['header_size'] ) ;	// 取得したデータ(JSONなど)
        $header = substr( $res1, 0, $res2['header_size'] ) ;	// レスポンスヘッダー (検証に利用したい場合にどうぞ)

        // [cURL]ではなく、[file_get_contents()]を使うには下記の通りです…
        // $json = @file_get_contents( $request_url , false , stream_context_create( $context ) ) ;

        // JSONを変換
        // $obj = json_decode( $json ) ;	// オブジェクトに変換
        $arr = json_decode( $json, true ) ;	// 配列に変換

        // HTML用
        $html = '' ;

        // 検証用にレスポンスヘッダーを出力 [本番環境では不要]
        // $html .= '<h2>取得したデータ</h2>' ;
        // $html .= '<p>下記のデータを取得できました。</p>' ;
        // $html .= 	'<h3>ボディ(JSON)</h3>' ;
        // $html .= 	'<p><textarea rows="8">' . $json . '</textarea></p>' ;
        // $html .= 	'<h3>レスポンスヘッダー</h3>' ;
        // $html .= 	'<p><textarea rows="8">' . $header . '</textarea></p>' ;

        // HTMLを出力
        // echo $arr ;
        // return view('twitter', ['tweet' => $arr]);
        // dd($arr);
        return $arr;
    }

    private function Standard_search(){
        $bearer_token = $this->bearer_token ;	// ベアラートークン
        $request_url = 'https://api.twitter.com/1.1/search/tweets.json' ;	// リクエストURL

        // パラメータ
        $params = array(
            'p' => 'from%3Atwitterdev',
            'result_type' => 'mixed',
            'count' => 2
        ) ;

        // パラメータがある場合
        if ( $params ) {
            $request_url .= '?' . http_build_query( $params ) ;
        }

        // リクエスト用のコンテキスト
        $context = array(
            'http' => array(
                'method' => 'GET' , // リクエストメソッド
                'header' => array(			  // ヘッダー
                    'Authorization: Bearer ' . $bearer_token ,
                ) ,
            ) ,
        ) ;
// dd($request_url);
        // cURLを使ってリクエスト
        $curl = curl_init() ;
        curl_setopt( $curl, CURLOPT_URL, $request_url ) ;	// リクエストURL
        curl_setopt( $curl, CURLOPT_HEADER, true ) ;	// ヘッダーを取得する
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $context['http']['method'] ) ;	// メソッド
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false ) ;	// 証明書の検証を行わない
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ) ;	// curl_execの結果を文字列で返す
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $context['http']['header'] ) ;	// ヘッダー
        curl_setopt( $curl, CURLOPT_TIMEOUT, 5 ) ;	// タイムアウトの秒数
        $res1 = curl_exec( $curl ) ;
        $res2 = curl_getinfo( $curl ) ;
        curl_close( $curl ) ;

        // 取得したデータ
        $json = substr( $res1, $res2['header_size'] ) ;	// 取得したデータ(JSONなど)
        $header = substr( $res1, 0, $res2['header_size'] ) ;	// レスポンスヘッダー (検証に利用したい場合にどうぞ)

        // [cURL]ではなく、[file_get_contents()]を使うには下記の通りです…
        // $json = @file_get_contents( $request_url , false , stream_context_create( $context ) ) ;

        // JSONを変換
        // $obj = json_decode( $json ) ;	// オブジェクトに変換
        $arr = json_decode( $json, true ) ;	// 配列に変換
dd($arr);
        return $arr;
    }

}
