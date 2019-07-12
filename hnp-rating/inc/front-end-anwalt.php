<?php


  if (!function_exists('curl_download_anwalt'))   {
  function curl_download_anwalt($Url){

    if (!function_exists('curl_init')){

    die('cURL is not installed. Install and try again.');

    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $Url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Language: en']);

    $output = curl_exec($ch);

    curl_close($ch);

    $start = strpos($output, '"ratingCount": "')+16;

    $end = strpos($output, '"', $start);

    $length = $end-$start;

    $output = substr($output, $start, $length);
    return $output;

   }
}


   $val = curl_download_anwalt($profile_link4);

   ?>

  <p class="prof_reviews"><?php echo $val ; ?> Bewertungen auf <a href="<?php echo $profile_link4; ?>" target="_blank">Anwalt.de</a> </p>
 <?php

 if (!function_exists('curl_download_anwalt2'))   {
  function curl_download_anwalt2($Url){

    if (!function_exists('curl_init')){

    die('cURL is not installed. Install and try again.');

    header('content-type:text/plain');

    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $Url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Language: en']);

    $output = curl_exec($ch);

    curl_close($ch);

    $start = strpos($output, '"ratingValue": "')+16;

    $end = strpos($output, '",', $start);

    $length = $end-$start;

    $output = substr($output, $start, $length);

    return $output;

   }
}


   $ratings = curl_download_anwalt2($profile_link4);



   ?>
  <p class="prof_ratings"><?php echo  $ratings; ?> von 5 Sternen </p>











  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address4; ?>",
      "postalCode":"<?php echo $postal_code4; ?>",
      "addressLocality": "<?php echo $address4; ?>",
      "addressCountry": "<?php echo $country4; ?>"
    },
    "name": "<?php echo $name4; ?>",
    "telephone": "<?php echo $phone4 ; ?>",
    "image": "<?php echo $image_link4; ?>",
    "url": "<?php echo $profile_link4; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo $ratings; ?>",
      "ratingCount": "<?php echo $val ; ?>"
    }
    }
  </script>
