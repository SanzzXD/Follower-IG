<?php
//CREATOR CLOWNXX
//INSTAGRAM _CLOWNXX

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
animasi($m."╔{$p}═══════════════════════════════════════════════{$m}╗\n");
animasi($p."║  {$m}██████{$p}╗{$m}██{$p}╗      {$m}██████{$p}╗ {$m}██{$p}╗    {$m}██{$p}╗{$m}███{$p}╗   {$m}██{$p}╗ ║\n");
animasi($p."║ {$m}██{$p}╔════╝{$m}██{$p}║     {$m}██{$p}╔═══{$m}██{$p}╗{$m}██{$p}║    {$m}██{$p}║{$m}████{$p}╗  {$m}██{$p}║ ║\n");
animasi($p."║ {$m}██{$p}║     {$m}██{$p}║     {$m}██{$p}║   {$m}██{$p}║{$m}██{$p}║ {$m}█{$p}╗ {$m}██{$p}║{$m}██{$p}╔{$m}██{$p}╗ {$m}██{$p}║ ║\n");
animasi($p."║ {$m}██{$p}║     {$m}██{$p}║     {$m}██{$p}║   {$m}██{$p}║{$m}██{$p}║{$m}███{$p}╗{$m}██{$p}║{$m}██{$p}║╚{$m}██{$p}╗{$m}██{$p}║ ║\n");
animasi($p."║ ╚{$m}██████{$p}╗{$m}███████{$p}╗╚{$m}██████{$p}╔╝╚{$m}███{$p}╔{$m}███{$p}╔╝{$m}██{$p}║ ╚{$m}████{$p}║ ║\n");
animasi($p."║  ╚═════╝╚══════╝ ╚═════╝  ╚══╝╚══╝ ╚═╝  ╚═══╝ ║\n");
animasi($p."║{$k}-----------------------------------------------{$p}║\n");
animasi($p."║ {$k}▶ {$p}Script  : {$h}girisyap                          {$p}║\n");
animasi($p."║ {$k}▶ {$p}Version : v.01                              {$p}║\n");
animasi($m."╚{$p}═══════════════════════════════════════════════{$m}╝\n");
animasi($p." {$k}◆ {$p}Youtube    : Clownxx\n");
animasi($p." {$k}◆ {$p}Owner Site : https://myclownxx.blogspot.com\n");
animasi($m."═{$p}═════════════{$c}[ {$p}{$bmerah}●    RUNNING    ●{$end} {$c}]{$p}═════════════{$m}═\n");

//////////////////////////////////////////////
//////////////////////////////////////////////
ulang:
system("rm cookie.txt"); //delet cookie
$girisyap = girisyap();
$token = explode('";',explode('&antiForgeryToken=',$girisyap)[1])[0];

$masuk = masuk($token);
$res = json_decode($masuk)->status;

//biar makin ganteng:)
animasi($p."[{$k}#{$p}] pleas wait.."); sleep(2);
//file_put_contents("res",$masuk);
if($res=="success")
{
    animasi("\r{$p}[{$h}√{$p}] account {$h}connected\r"); sleep(2);
    
    $findID = findID();
    $id = explode('">',explode('<input type="hidden" name="userID" value="',$findID)[1])[0];
    //echo"$id \n";
    mengulang: //portal
    $sendFL = sendFL();
    //print_r($sendFL);
    //file_put_contents("result.txt",$sendFL);
    $has = json_decode($sendFL)->status;
    
    if($has=="success")
    {
        animasi($r.$p."[{$h}√{$p}] {$h}successfully {$p}added followers to your account\n");
        goto mengulang; sleep(2);
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
        goto ulang;
    }
}
else
{
    animasi($r.$p."[{$m}x{$p}] can't {$m}connect {$p}to account\n");
}
//////////////////////////////////////////////
//////////////////////////////////////////////
function clownxx()
{
    $ua[]="Host: igfollower.net";
    $ua[]="x-requested-with: XMLHttpRequest";
    $ua[]="user-agent: Mozilla/5.0 (Linux; Android 10; dandelion Build/QP1A.190711.020;) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/91.0.4472.101 Mobile Safari/537.36";
    $ua[]="referer: https://igfollower.net/";
}
function girisyap()
{
    $url="https://igfollower.net/girisyap";
    return curl($url,clownxx());
}
function masuk($token)
{
    include("set.php");
    $url="https://igfollower.net/girisyap?";
    $data="username=$t_user&password=$t_pass&userid=&antiForgeryToken=$token";
    return curl($url,clownxx(),$data);
}
function findID()
{
    include("set.php");
    $url="https://igfollower.net/tools/send-follower?formType=findUserID";
    $data="username=$user";
    return curl($url,clownxx(),$data);
}
function sendFL()
{
    include("set.php");
    global $id;
    $url="https://igfollower.net/tools/send-follower/$id?formType=send";
    $data="adet=20&userID=$id&userName=$user";
    return curl($url,clownxx(),$data);
}
////////////////////////
///////////////////////
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