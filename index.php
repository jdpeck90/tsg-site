
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?> 
  <?php wp_head(); ?>   
    <link href="<?php bloginfo('template_directory'); ?>/styles.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

<header class="site-header" >
    <nav class="site-header__nav">
     <a href="#" class="menu-trigger"><i class="fa fa-bars" aria-hidden="true"></i></a>
   <?php 
    wp_nav_menu( array(
    'menu_id' => 'menu', 
    'container' => 'menu_container',
    'theme_location' => 'Primary',
    'fallback_cb' => false, 
    'walker' => new bbird_scroller_walker()   
) );
    
    ?>
    </nav>

</header><!-- .site-header -->

<div id="content" class="site-content">
<div id="fullpage">
    
<?php
// check if the layout repeater field has rows of data
if( have_rows('layout') ):
    
 $sectionID = 0; 
  // loop through the rows of data
    while ( have_rows('layout') ) : the_row();
          $image1 = get_sub_field('image');
          if( !empty($image1) ): 
              $url = $image1['url'];
          endif;       
        
    $sectionID++;
       ?>

    <div id="section<?php echo $sectionID; ?>" class="section" >
    <video data-autoplay loop id="myVideo">
      <source data-src="<?php bloginfo('template_directory'); ?>/videos/video<?php echo $sectionID; ?>.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
    <div class="section__content">
            <div class="section__content--arrow-up"></div>
                <h1 class="section__content--header"><?php the_sub_field('anchor') ?></h1>
                <div class="section__content--wizzy"><?php the_sub_field('text') ?> </div>
            <div class="section__content--arrow-down"></div>
    </div>
    <?php echo '</div>';
    endwhile;
else :
    // no rows found
endif;
?>    

<?php 

// check for rows (parent repeater)
if( have_rows('timeline') ): ?>
  <div id="section" class=" section timeline">
  <?php 
$sectionID = 0; 

// loop through rows (parent repeater)
while( have_rows('timeline') ): the_row(); 

$slideID++;
if( have_rows('date') ): 


?>

  // loop through the rows of data

  
<section id="timeline">
  <ul id="dates">
  <?php   while( have_rows('date') ): the_row(); ?>
  <li id="date" class="tl-item">
    
    <div class="tl-bg" style="background-image: url('<?php the_sub_field('background') ?>')"></div>
    
    <div class="tl-year">
      <p class="f2 heading--sanSerif"> <?php the_sub_field('sub_date') ?> </p>
    </div>
    
    <div class="tl-content">
      
      <h1><?php the_sub_field('event_title') ?></h1>
      <p><?php the_sub_field('event_description') ?></p>
    </div>
    
  </li>
 <?php endwhile; ?> 
  </ul>
    <a href="#" id="" class="timeline__next">

    </a>
    <a href="#" id="" class="timeline__prev">
    </a>
    <?php
else : 
endif; 
endwhile; 
else :
endif; ?>
</section>


/*----------  SLIDER  ----------*/

<?php
  if( have_rows('slider') ):
    // check if the slider repeater field has rows of data
    ?>
    <div class="section horizontal-slider" style="background-color: white;">
      <?php  
    $slideID = 0; 
      // loop through the rows of data
        while ( have_rows('slider') ) : the_row();
              $image1 = get_sub_field('image1');
              $image2 = get_sub_field('image2');
              $image3 = get_sub_field('image3');
              $header = get_sub_field('header');        
              $description1 = get_sub_field('description1');
              $description2 = get_sub_field('description2');
              $description3 = get_sub_field('description3');
              $link = get_sub_field('link');        
              if( !empty($image) ): 
                  $url1 = $image1['url'];
                  $url2 = $image2['url'];
                  $url3 = $image3['url'];
              endif;       
            
        $slideID++;
          ?>
          <div class="brand-description">
            
          </div>
            <div class="slide" data-anchor="slide<?php echo $slideID; ?>">
              <div class="slide__brand-container">
                <span class="slide__brand-content-wrapper">
                  <img class="slide__brand-logo" src="<?php echo $image1; ?> " alt="">
                  <div class="slide__brand-modal" id="brandModal">
                    <span class="close">&times;</span>
                    <div class="slide__brand-description">  <?php echo $description1 ?> </div>
                  </div>
                </span>
                <span class="slide__brand-content-wrapper">
                <img class="slide__brand-logo" src="<?php echo $image2; ?> " alt="">
                  <div class="slide__brand-modal" id="brandModal">
                    <span class="close">&times;</span>
                    <div class="slide__brand-description">  <?php echo $description2 ?> </div>
                  </div>
                </span>
                <span class="slide__brand-content-wrapper">
                  <img class="slide__brand-logo" src="<?php echo $image3; ?> " alt="">
                    <div class="slide__brand-modal" id="brandModal">
                      <span class="close">&times;</span>
                      <div class="slide__brand-description"> <?php echo $description3 ?></div>
                    </div>
                </span>
              </div>
            </div>
    <?php
        endwhile;
      else: 
        //there is no slides
        endif;
    ?>
</div>


/*----------  Footer  ----------*/


<?php
    // check if the footer repeater field has rows of data
    if( have_rows('footer') ): ?>

    <div class="section fp-auto-height section-footer" style="background-color: black;">
    <?php  
    $slideID = 0; 
      // loop through the rows of data
        while ( have_rows('footer') ) : the_row();
        $logo = get_sub_field('logo');
        $footerContent1 = get_sub_field('footer_content_1');
        $footerContent2 = get_sub_field('footer_content_2');
        $footerContent3 = get_sub_field('footer_content_3');
        $footerContent4 = get_sub_field('footer_content_4');
      
        $slideID++;
    ?>
    <div class="section__footer-column">
      <div class="section__footer-content">
        <div class="section__footer-content--wrapper">
          <img src="<?php echo $logo ?>" alt="" class="section__footer-content--logo">
          <div class="section__footer-content--text">
            <p class="section__footer-content--company"> The S Group </p>
            <p class="section__footer-content--address"> 608 SW Alder St, Portland, Oregon. 97205 </p>
          </div>
        </div>
      </div>
    </div>
    <div class="section__footer-column">
      <div class="section__footer-social">
        <?php include('social-icons.php'); ?>
      </div>
    </div>
    <?php
    endwhile;
    else :
        // no rows found
    endif;
?>
      <script>
        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");

        function myFunction() {
          if (video.paused) {
            video.play();
            btn.innerHTML = "Pause";
          } else {
            video.pause();
            btn.innerHTML = "Play";
          }
        }
      </script>


</div> <!-- section -->
</div><!-- .site-content -->

<?php 
wp_footer();
?>

</body>
<script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script> 

</html>