<?php
header('Content-Type: text/html; charset=UTF-8');


if ( $_GET["type"] == 2){
$api_url = 'https://microsoftgraph.chinacloudapi.cn/v1.0/sites/';
$auth_url = 'https://login.chinacloudapi.cn/common/oauth2/v2.0/token';
}
else { 
$api_url = 'https://graph.microsoft.com/v1.0/sites/';
$auth_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
}

function send_post($url, $post_data) {
  $postdata = http_build_query($post_data);
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',
      'content' => $postdata,
      'timeout' => 15 * 60
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  return $result;
};


function getak($code,$auth_url){
$post_data = array(
'code' => $code,
'grant_type' => 'authorization_code',
'client_id' => '395ac1f4-ca51-4553-9217-b8a191c8cd54',
'client_secret' => '6t_zTrrDX~zgY1y-v274KdMLf0yPWEwV~q',
'redirect_uri' => 'https://api.us.ppxwo.top/onedrive'
);
$data = send_post($auth_url, $post_data);
$data = json_decode($data, true);
//var_dump($data);
return $data['access_token'];
}


function getid($ak,$hostname,$site,$api_url){
$post_data = array(
'code' => $ak,
'grant_type' => 'authorization_code',
'client_id' => '395ac1f4-ca51-4553-9217-b8a191c8cd54',
'client_secret' => '6t_zTrrDX~zgY1y-v274KdMLf0yPWEwV~q',
'redirect_uri' => 'https://api.us.ppxwo.top/onedrive'
);
$header = array(
   'Authorization: bearer  '.$ak,
   'Accept: application/json',
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $api_url.$hostname.':'.$site);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
$data = curl_exec($curl);
if (curl_error($curl)) {
    print "Error: " . curl_error($curl);
} else {
    $data = json_decode($data, true);
    //var_dump($data);
    return $data["id"];
    curl_close($curl);
}


}
$code = $_GET['code'];
$hostname = $_GET['hostname'];
$site = $_GET['site'];
$ak = getak($code,$auth_url);
$id = getid($ak,$hostname,$site,$api_url);
echo $id;