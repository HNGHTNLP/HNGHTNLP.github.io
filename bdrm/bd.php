<?php
error_reporting(0);
$id=$_GET[id];
$auth_key = $_GET["auth_key"];
$ts = $_GET["ts"];
$bstr = isset($ts)?$ts:"";
$ids = array(
'lntv'=>'lntv',//辽宁卫视
'dspd'=>'dspd',//都市频道
'typd'=>'typd',//体育频道
'shpd'=>'shpd',//生活频道
'qspd'=>'qspd',//青少频道
'yspd'=>'yspd',//影视剧频道
'bfpd'=>'bfpd',//北方频道
'yjgw'=>'yjgw',//宜佳购物
'yxjj'=>'yxjj',//游戏竞技频道
'xdm'=>'xdm',//新动漫
'cctv1'=>'cctv1',//cctv1
'cctv2'=>'cctv2',//cctv2
'cctv4'=>'cctv4',//cctv4
'cctv7'=>'cctv7',//cctv7
'cctv9'=>'cctvjilu',//cctv9
'cctv10'=>'cctv10',//cctv10
'cctv11'=>'cctv11',//cctv11
'cctv12'=>'cctv12',//cctv12
'cctv13'=>'cctv13',//cctv13
'cctv14'=>'cctvchild',//cctv14
'cctv15'=>'cctv15',//cctv15
'cctv17'=>'cctv17',//cctv17
);
$header = array(
"Referer: http://bdrm.bdy.lnyun.com.cn",
);
if($bstr == "")
{
$time = time();
$pam = md5("/bdrm/".$ids[$id].".m3u8-".$time."-0-0-dPBxXGs7yIaSZG5m");
$url = "https://bdrmtvzb.lnyun.com.cn/bdrm/".$ids[$id].".m3u8?auth_key=".$time."-0-0-".$pam;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
curl_close($ch);
$ts = str_replace("?","&",$result);
$ts = str_replace("bdrmtvzb.lnyun.com.cn","bd.php?ts=bdrmtvzb.lnyun.com.cn",$ts);
print_r($ts);
}
else
{
$url = "https://bdrmtvzb.lnyun.com.cn/bdrm/".$ts."?auth_key=".$auth_key;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, trim($url));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
curl_close($ch);
print_r($result);
}
?>
