<?php
# Author : SanzzXD
# Instagram @sanzzwibutzy_

error_reporting(0); //report null
include"set.php"; //ambil data di file function.php

$r="\r                             \r";
$h = "\33[32;1m";
$b = "\33[0;36m";
$m = "\33[31;1m";
$p = "\e[1;37m";
$d = "\033[1;30m";
$k = "\33[1;33m";
$c = "\e[1;36m";
$u = "\e[1;35m";
$a = "\e[1;30m";
$end = "\033[0m";
$bmerah = "\033[101m";

system("clear");
animasi($p."{$k}--------------------------------------------------{$p}\n");
animasi($p."║ {$k}▶ {$p}Script  : {$h}Auto Follower Ig                  {$p}║\n");
animasi($p."║ {$k}▶ {$p}Version : v.01                              {$p}║\n");
animasi($m."╚{$p}═══════════════════════════════════════════════{$m}╝\n");
animasi($p." {$k}◆ {$p}Youtube    : SanzzXD\n");
animasi($p." {$k}◆ {$p}Github : https://github.com/SanzzXD\n");
animasi($m."═{$p}═════════════{$c}[ {$p}{$bmerah}●    RUNNING    ●{$end} {$c}]{$p}═════════════{$m}═\n");

mengulang:
system("rm cookie.txt");

$takeTK=takeTK();
$token=explode('";',explode('&antiForgeryToken=',$takeTK)[1])[0];
animasi($p."[{$k}#{$p}] pleas wait.."); sleep(2);
$login=Log_in($token);
$info=json_decode($login)->status;
if($info=="success")
{
    animasi("\r{$p}[{$h}√{$p}] account {$h}connected\r"); sleep(2);
    
    $find=findID();
    //file_put_contents("findID",$find);
    $id = explode('">',explode('<input type="hidden" name="userID" value="',$find)[1])[0];
    //echo"$id \n";
    
    ulang:
    $sendFL=sendFollowers($id);
    $hasil=json_decode($sendFL)->status;
    if($hasil=="success")
    {
        animasi($r.$p."[{$h}√{$p}] {$h}successfully {$p}added followers to your account\n");
        goto ulang; sleep(2);
    }
    else
    {
        animasi($r.$p."[{$m}x{$p}] {$m}an error {$p}occurred in the system\n");
        for($x=3600;$x>0;$x--)
            {
                echo "\r \r"; //timer
                echo$p."[{$k}#{$p}] {$p}pleas wait ".$h.$x."  ";
                echo "\r \r";
                sleep(1);
            }
        goto mengulang;
    }
}
else
{
animasi($r.$p."[{$m}x{$p}] can't {$m}connect {$p}to account\n");

}
//= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
function bktakipci()
{
    $ua=array();
    $ua[]="Host: buyuktakipci.com";
    $ua[]="x-requested-with: XMLHttpRequest";
    $ua[]="user-agent: Mozilla/5.0 (Linux; Android 10; dandelion Build/QP1A.190711.020;) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/91.0.4472.101 Mobile Safari/537.36";
    $ua[]="referer: https://buyuktakipci.com/";
    return $ua;
}
function takeTK()
{
    $url="https://buyuktakipci.com/member";
    return curl($url,bktakipci());
}
function Log_in($token)
{
    include("set.php");
    $url="https://buyuktakipci.com/member?";
    $data="username={$t_user}&password={$t_pass}&userid=&antiForgeryToken={$token}";
    return curl($url,bktakipci(),$data);
}
function findID()
{
    include("set.php");
    $url="https://buyuktakipci.com/tools/send-follower?formType=findUserID";
    $data="username={$youser}";
    return curl($url,bktakipci(),$data);
}
function sendFollowers($id)
{
    include("set.php");
    $url="https://buyuktakipci.com/tools/send-follower/{$id}?formType=send";
    $data="adet=80&userID={$id}&userName={$youser}";
    return curl($url,bktakipci(),$data);
}
function curl($url, $httpheader = 0, $post = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    if ($httpheader) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    }
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_HEADER, true);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch);
    if (!$httpcode) return "Curl Error : ".curl_error($ch); else {
        $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        curl_close($ch);
        return array($header, $body)[1];
    }
}

//animasi
function animasi($str) 
{
    $arr = str_split($str);
    foreach ($arr as $az) 
    {
        echo $az; usleep(3000);
    }
}
