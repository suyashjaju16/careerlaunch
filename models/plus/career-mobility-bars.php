<?php 
// include("../../config.php");
$url = $base_url."career-mobility-bars";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$career_mobility_bars = curl_exec($ch);
curl_close($ch);
// echo "<pre>$social_capital_bars</pre>";
?>