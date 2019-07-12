<?php

//header('content-type:text/plain');

if (!function_exists('curl_download_aerzte2'))   {

function curl_download_aerzte2($Url){

 if (!function_exists('curl_init')){

 die('cURL is not installed. Install and try again.');

 }

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, $Url);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $output = curl_exec($ch);

 curl_close($ch);

 $start = strpos($output, "<div class='rating-box rating-tool-tip'>");

$end = strpos($output, '<span class="recommend-scroll">', $start);

$length = $end-$start;

$output = substr($output, $start, $length);



 return $output;

}

}

  $string = curl_download_aerzte2($profile_link5);
   $length = strlen($string);

$flag='';

  for($i=0;$i<$length;$i++){

    if($string[$i]=='<' && $string[$i+1]=='p' && $string[$i+2]=='>' ){
      $flag .= $string[$i+4].$string[$i+5].$string[$i+6].$string[$i+7];
      
    }

  }

$ratings = trim($flag);

  echo "<p class='prof_reviews'>".$ratings." Bewertungen auf <a href='".$profile_link5."' target='_blank'> aerzte.de</a></p>";

  $flag='';


  for($i=0;$i<$length;$i++){

    if($string[$i]=='e' && $string[$i+1]=='=' && $string[$i+2]=='\'' ){
      $flag .= $string[$i+3].$string[$i+4].$string[$i+5];
      
    }

  }

$reviews = trim($flag);


?>


 <p class="prof_ratings"><?php echo sprintf('%.1f',$reviews) ; ?> von 5 Sternen </p>




 <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address5; ?>",
      "postalCode":"<?php echo $postal_code5; ?>",
      "addressLocality": "<?php echo $address5; ?>",
      "addressCountry": "<?php echo $country5; ?>"
    },
    "name": "<?php echo $name5; ?>",
    "telephone": "<?php echo $phone5 ; ?>",
    "image": "<?php echo $image_link5; ?>",
    "url": "<?php echo $profile_link5; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo sprintf('%.1f',$reviews); ?>",
      "ratingCount": "<?php echo $ratings ; ?>"
    }
    }
  </script>