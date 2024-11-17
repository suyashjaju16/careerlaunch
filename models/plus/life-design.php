<?php 
// include("../../config.php");
$url = $base_url."life-design";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$life_design = curl_exec($ch);
curl_close($ch);
// echo "<pre>$life_design</pre>";
?>