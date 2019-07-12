<?php
//header('content-type:text/plain');
$appID = 'samsharp-5067-49a2-942d-2cdab859d2f5';



 

$callName = 'GetSingleItem';

$compatibilityLevel = 647;

$endpoint = "http://open.api.ebay.com/shopping";

 

$headers[] = "X-EBAY-API-CALL-NAME: $callName";

$headers[] = "X-EBAY-API-APP-ID: $appID";

$headers[] = "X-EBAY-API-VERSION: $compatibilityLevel";

$headers[] = "X-EBAY-API-REQUEST-ENCODING: XML";

$headers[] = "X-EBAY-API-RESPONSE-ENCODING: XML";

$headers[] = "X-EBAY-API-SITE-ID: 0";

$headers[] = "Content-Type: text/xml";


if (!function_exists('curl_download_ratings_ebay'))   {

function curl_download_ratings_ebay($Url){

 if (!function_exists('curl_init')){

 die('cURL is not installed. Install and try again.');

 }

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, $Url);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $output = curl_exec($ch);

 curl_close($ch);

 $start = strpos($output, '<div id="dsr" class="dsr fl col-3">');

$end = strpos($output, '</div><div class="clearfloat"></div></div>', $start);

$length = $end-$start;

$output = substr($output, $start, $length);



 return $output;

}
}

$string = curl_download_ratings_ebay($profile_link3);

$length = strlen($string);

$flag='';

  for($i=0;$i<$length;$i++){

    if($string[$i]=='t' && $string[$i+1]=='i' && $string[$i+2]=='t' && $string[$i+3]=='l' && $string[$i+4]=='e' && $string[$i+5]=='=' && $string[$i+6]=='"' ){
      $flag .= $string[$i+7].$string[$i+8].$string[$i+9].'|';
      
    }

  }

  $flag = str_replace(" /","",$flag);

  $flag = array_map('floatval', explode('|', $flag));

  $flag = array_sum($flag)/20;

  


    $reviews = '';

  for($i=0;$i<$length;$i++){

    if($string[$i]=='f' && $string[$i+1]=='l' && $string[$i+2]=='"' && $string[$i+3]=='>' ){
      $reviews .= $string[$i+4].$string[$i+5].$string[$i+7].$string[$i+8].$string[$i+9].'|';
      
    }

  }

  $reviews = array_map('intval', explode('|', $reviews));

 

  $reviews = array_sum($reviews)/4;


  $reviews = (int)$reviews;

  echo "<p class='prof_reviews'>".$reviews." Bewertungen auf <a href='".$profile_link3."' target='_blank'> ebay.com</a></p>";
  
?>
 <p class="prof_ratings"><?php echo sprintf('%.2f',$flag) ; ?> von 5 Sternen </p>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address3; ?>",
      "postalCode":"<?php echo $postal_code3; ?>",
      "addressLocality": "<?php echo $address3; ?>",
      "addressCountry": "<?php echo $country3; ?>"
    },
    "name": "<?php echo $name3; ?>",
    "telephone": "<?php echo $phone3 ; ?>",
    "image": "<?php echo $image_link3; ?>",
    "url": "<?php echo $profile_link3; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo sprintf('%.2f',$flag) ; ?>",
      "ratingCount": "<?php echo $reviews; ?>"
    }
    }
  </script>
