<!-- Create a header in the default WordPress 'wrap' container -->
<div class="wrap">
   <div id="icon-themes" class="icon32"></div>
   <h2>Profil</h2>
   <?php settings_errors(); ?>
   <?php
      if( isset( $_GET[ 'tab' ] ) ) {
          $active_tab = $_GET[ 'tab' ];
      }else{
        $active_tab = 'profile_1';
      }
      ?>
   <h2 class="nav-tab-wrapper">
      <a href="?page=hnp_rating_options&tab=profile_1" class="nav-tab <?php echo $active_tab == 'profile_1' ? 'nav-tab-active' : ''; ?>">Facebook</a>
      <a href="?page=hnp_rating_options&tab=profile_2" class="nav-tab <?php echo $active_tab == 'profile_2' ? 'nav-tab-active' : ''; ?>">Google</a>
      <a href="?page=hnp_rating_options&tab=profile_3" class="nav-tab <?php echo $active_tab == 'profile_3' ? 'nav-tab-active' : ''; ?>">Amazon</a>
      <a href="?page=hnp_rating_options&tab=profile_4" class="nav-tab <?php echo $active_tab == 'profile_4' ? 'nav-tab-active' : ''; ?>">eBay</a>
      <a href="?page=hnp_rating_options&tab=profile_5" class="nav-tab <?php echo $active_tab == 'profile_5' ? 'nav-tab-active' : ''; ?>">Anwalt</a>
      <a href="?page=hnp_rating_options&tab=profile_6" class="nav-tab <?php echo $active_tab == 'profile_6' ? 'nav-tab-active' : ''; ?>">Ärzte</a>
      <a href="?page=hnp_rating_options&tab=profile_7" class="nav-tab <?php echo $active_tab == 'profile_7' ? 'nav-tab-active' : ''; ?>">Jameda</a>
      <a href="?page=hnp_rating_options&tab=profile_8" class="nav-tab <?php echo $active_tab == 'profile_8' ? 'nav-tab-active' : ''; ?>">TripAdvisor</a>
      <a href="?page=hnp_rating_options&tab=profile_9" class="nav-tab <?php echo $active_tab == 'profile_9' ? 'nav-tab-active' : ''; ?>">All Profiles</a>
      <a href="?page=hnp_rating_options&tab=styles" class="nav-tab <?php echo $active_tab == 'styles' ? 'nav-tab-active' : ''; ?>">Styles</a>
   </h2>
   <form id="featured_upload" method="post" action="">
      <?php
         if( $active_tab == 'profile_1' ) { ?>
      <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name" id="name" type="text" value="<?php echo $name; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone" id="phone" type="number" value="<?php echo $phone; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address" id="street_address" type="text" value="<?php echo $street_address; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address" id="address" type="text" value="<?php echo $address; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country" id="country">
         
            <option value="DE" <?php if($country=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link" id="image_link" type="text" value="<?php if(isset($image_link)) {echo $image_link;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code" id="postal_code" type="number" value="<?php echo $postal_code; ?>" class="all-options" required/><br><br>
         Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link" id="profile_link" type="text" value="<?php echo $profile_link; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_facebook" value="Update" />
      </p>
      <p><b>Mit [hnp-facebook-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>
      <?php  }else if($active_tab == 'profile_2'){ ?>

       <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name1" id="name1" type="text" value="<?php echo $name1; ?>" class="all-options" required/><br><br>
         Google<br>Adresszeile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="google_address1" id="google_address1" type="text" value="<?php echo $google_address1; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone1" id="phone1" type="number" value="<?php echo $phone1; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address1" id="street_address1" type="text" value="<?php echo $street_address1; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address1" id="address1" type="text" value="<?php echo $address1; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country1" id="country1">
         
            <option value="DE" <?php if($country1=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country1=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country1=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link1" id="image_link1" type="text" value="<?php if(isset($image_link1)) {echo $image_link1;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code1" id="postal_code1" type="number" value="<?php echo $postal_code1; ?>" class="all-options" required/><br><br>
        
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_google" value="Update" />
      </p>
      <p><b>Mit [hnp-google-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>


        <?php }else if($active_tab == 'profile_3'){ ?>

         <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name2" id="name2" type="text" value="<?php echo $name2; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone2" id="phone2" type="number" value="<?php echo $phone2; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address2" id="street_address2" type="text" value="<?php echo $street_address2; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address2" id="address2" type="text" value="<?php echo $address2; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country2" id="country2">
         
            <option value="DE" <?php if($country2=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country2=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country2=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link2" id="image_link2" type="text" value="<?php if(isset($image_link2)) {echo $image_link2;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code2" id="postal_code2" type="number" value="<?php echo $postal_code2; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link2" id="profile_link2" type="text" value="<?php echo $profile_link2; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_amazon" value="Update" />
      </p>
      <p><b>Mit [hnp-amazon-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>

         <?php }else if($active_tab == 'profile_4'){ ?>

                     <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name3" id="name3" type="text" value="<?php echo $name3; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone3" id="phone3" type="number" value="<?php echo $phone3; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address3" id="street_address3" type="text" value="<?php echo $street_address3; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address3" id="address3" type="text" value="<?php echo $address3; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country3" id="country3">
         
            <option value="DE" <?php if($country3=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country3=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country3=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link3" id="image_link3" type="text" value="<?php if(isset($image_link3)) {echo $image_link3;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code3" id="postal_code3" type="number" value="<?php echo $postal_code3; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link3" id="profile_link3" type="text" value="<?php echo $profile_link3; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_ebay" value="Update" />
      </p>
      <p><b>Mit [hnp-ebay-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>

         <?php } else if($active_tab == 'profile_5'){ ?>

                <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name4" id="name4" type="text" value="<?php echo $name4; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone4" id="phone4" type="number" value="<?php echo $phone4; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address4" id="street_address4" type="text" value="<?php echo $street_address4; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address4" id="address4" type="text" value="<?php echo $address4; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country4" id="country4">
         
            <option value="DE" <?php if($country4=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country4=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country4=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link4" id="image_link4" type="text" value="<?php if(isset($image_link4)) {echo $image_link4;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code4" id="postal_code4" type="number" value="<?php echo $postal_code4; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link4" id="profile_link4" type="text" value="<?php echo $profile_link4; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_anwalt" value="Update" />
      </p>
      <p><b>Mit [hnp-anwalt-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>

         <?php } else if($active_tab == 'profile_6'){ ?>


                <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name5" id="name5" type="text" value="<?php echo $name5; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone5" id="phone5" type="number" value="<?php echo $phone5; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address5" id="street_address5" type="text" value="<?php echo $street_address5; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address5" id="address5" type="text" value="<?php echo $address5; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country5" id="country5">
         
            <option value="DE" <?php if($country5=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country5=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country5=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link5" id="image_link5" type="text" value="<?php if(isset($image_link5)) {echo $image_link5;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code5" id="postal_code5" type="number" value="<?php echo $postal_code5; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link5" id="profile_link5" type="text" value="<?php echo $profile_link5; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_aertz" value="Update" />
      </p>
      <p><b>Mit [hnp-aerzte-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>
 
        <?php } else if($active_tab == 'profile_7'){ ?>

                        <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name6" id="name6" type="text" value="<?php echo $name6; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone6" id="phone6" type="number" value="<?php echo $phone6; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address6" id="street_address6" type="text" value="<?php echo $street_address6; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address6" id="address6" type="text" value="<?php echo $address6; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country6" id="country6">
         
            <option value="DE" <?php if($country6=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country6=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country6=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link6" id="image_link6" type="text" value="<?php if(isset($image_link6)) {echo $image_link6;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code6" id="postal_code6" type="number" value="<?php echo $postal_code6; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link6" id="profile_link6" type="text" value="<?php echo $profile_link6; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_jameda" value="Update" />
      </p>
      <p><b>Mit [hnp-jameda-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>

         <?php }else if($active_tab == 'profile_8'){ ?>


                                        <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name8" id="name8" type="text" value="<?php echo $name8; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone8" id="phone8" type="number" value="<?php echo $phone8; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address8" id="street_address8" type="text" value="<?php echo $street_address8; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address8" id="address8" type="text" value="<?php echo $address8; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country8" id="country8">
         
            <option value="DE" <?php if($country8=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country8=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country8=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link8" id="image_link8" type="text" value="<?php if(isset($image_link8)) {echo $image_link8;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code8" id="postal_code8" type="number" value="<?php echo $postal_code8; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link8" id="profile_link8" type="text" value="<?php echo $profile_link8; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_tripadvisor" value="Update" />
      </p>
      <p><b>Mit [hnp-tripadvisor-bewertung] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>


         <?php } else if($active_tab == 'profile_9'){ ?>

                         <input type="hidden" name="pgnyt_form_submitted" value="Y">
      <p>
         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="name7" id="name7" type="text" value="<?php echo $name7; ?>" class="all-options" required/><br><br>
         Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="phone7" id="phone7" type="number" value="<?php echo $phone7; ?>" class="all-options" required/><br><br>
         Strasse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="street_address7" id="street_address7" type="text" value="<?php echo $street_address7; ?>" class="all-options" required/><br><br>
         Stadtname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="address7" id="address7" type="text" value="<?php echo $address7; ?>" class="all-options" required/><br><br>
         Land &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
         <select name="country7" id="country7">
         
            <option value="DE" <?php if($country7=='DE'){ echo 'selected'; } ?> >Deutschland</option>
            <option value="AT" <?php if($country7=='AT'){ echo 'selected'; } ?> >Österreich</option>
            <option value="CH" <?php if($country7=='CH'){ echo 'selected'; } ?> >Schweiz</option>
          
         </select>
         <br><br>
         Bild-URL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="image_link7" id="image_link7" type="text" value="<?php if(isset($image_link7)) {echo $image_link7;} ?>" class="all-options" required/><br><br>
         Postleitzahl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="postal_code7" id="postal_code7" type="number" value="<?php echo $postal_code7; ?>" class="all-options" required/><br><br>
        Profil Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input name="profile_link7" id="profile_link7" type="text" value="<?php echo $profile_link7; ?>" class="all-options" required/><br><br>
      </p>
      <p>
         <input class="button-primary" type="submit" name="form_submit_all" value="Update" />
      </p>
      <p><b>Mit [hnp-rating-all] kannst Du die Rich-Snippets/ Sterne Bewertung<br> des Profils auf einer Seite Deiner Wahl einfügen</b></p>

       <?php }


          else{ ?>

            <input type="hidden" name="pgnyt_form_submitted2" value="Y">
      <p>
          CSS for class : <b>profil</b></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <textarea name="css1" id="css1" type="text" class="all-options" rows="4" cols="50" ><?php

          if(isset($css1)){
            echo $css1;
          }

          


           ?> </textarea></p><br>
      </p> 
      <p class="description">Default css: <b>.prof_reviews{color:black;}   
.prof_reviews a{color:black;} .prof_ratings{color:black;}
    </b></p> 
      <p>
         <input class="button-primary" type="submit" name="form_submit_hnp_rating_css" value="Update" />
      </p>

      <?php } ?>
   </form>
</div>
<!-- /.wrap -->