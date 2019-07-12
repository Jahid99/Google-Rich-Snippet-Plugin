<?php

//header('content-type:text/plain');

if (!function_exists('curl_download_tripadvisor'))   {

function curl_download_tripadvisor($Url){

 if (!function_exists('curl_init')){

 die('cURL is not installed. Install and try again.');

 }

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, $Url);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $output = curl_exec($ch);

 curl_close($ch);

 $start = strpos($output, '<div class="rs rating">');

$end = strpos($output, '</div>', $start);

$length = $end-$start;

$output = substr($output, $start, $length);



 return $output;

}
    }




    $string = curl_download_tripadvisor($profile_link8);
     $length = strlen($string);

$flag='';

    for($i=0;$i<$length;$i++){

        if($string[$i]=='a' && $string[$i+1]=='l' && $string[$i+2]=='t' ){
            $flag .= $string[$i+5].$string[$i+6].$string[$i+7];
            
        }

    }
    $flag = explode(" ",$flag);

    $ratings = $flag[0];

    

//     $ratings1 = trim($flag);

    $flag='';


    for($i=0;$i<$length;$i++){

        if($string[$i]=='u' && $string[$i+1]=='n' && $string[$i+2]=='t' ){
            $flag .= $string[$i+5].$string[$i+6].$string[$i+7];
            
        }

    }

    $reviews = (int) filter_var($flag, FILTER_SANITIZE_NUMBER_INT);
    
    echo "<p class='prof_reviews'>".$reviews." Bewertungen auf <a href='".$profile_link8."' target='_blank'> tripadvisor.com</a></p>";

?>


<p class="prof_ratings"><?php echo $ratings; ?> von 5 Sternen </p>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address8; ?>",
      "postalCode":"<?php echo $postal_code8; ?>",
      "addressLocality": "<?php echo $address8; ?>",
      "addressCountry": "<?php echo $country8; ?>"
    },
    "name": "<?php echo $name8; ?>",
    "telephone": "<?php echo $phone8 ; ?>",
    "image": "<?php echo $image_link8; ?>",
    "url": "<?php echo $profile_link8; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo $ratings; ?>",
      "ratingCount": "<?php echo $reviews; ?>"
    }
    }
  </script>



