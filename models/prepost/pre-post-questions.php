<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

// {
//     "competency" : "overall_career_readiness",
//     "filters": {
//       "semester": "Fall 2024 - Spring 2025.",
//       "org_name": "efb383d9-2b47-4dcc-ac2f-8b6e93568b74",
//       "implementation_type": "general",
//       "use_case_id": "General Access",
//       "demographics_question": [],
//       "custom_questions": []
//     }
// }


$url = BASE_URL."pre-post-questions";
$ch = curl_init( $url );
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$pre_post_questions = curl_exec($ch);
// echo "<pre>$comp</pre>";
curl_close($ch);
?>