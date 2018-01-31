
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
// check if the repeater field has rows of data
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
       <h1><?php the_sub_field('anchor'); ?></h1>
        <?php
           // display a sub field value
        the_sub_field('text');        
      
echo '</div>';
    endwhile;
else :
    // no rows found
endif;
?>

<?php
// check if the repeater field has rows of data
if( have_rows('slider') ): ?>
    
    <div class="section" style="background-color: red;">
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
          $description4 = get_sub_field('description4');
          $link = get_sub_field('link');        
          if( !empty($image) ): 
              $url1 = $image1['url'];
              $url2 = $image2['url'];
              $url3 = $image3['url'];
          endif;       
        
    $slideID++;
       ?>
        <div class="slide" data-anchor="slide<?php echo $slideID; ?>"> 
        
          <a href="<?php echo $link; ?> ">  Slide <?php echo $slideID; ?> </a>
          <div class="slide__brand-container">
            <span class="slide__brand-content-wrapper">
            <img class="slide__brand-logo" src="<?php echo $image1; ?> " alt="">
                  <?php echo $description1 ?>
            </span>
            <span class="slide__brand-content-wrapper">
            <img class="slide__brand-logo" src="<?php echo $image2; ?> " alt="">
                  <?php echo $description2 ?>
            </span>
            <span class="slide__brand-content-wrapper">
            <img class="slide__brand-logo" src="<?php echo $image3; ?> " alt="">
                  <span class="slide__brand-description"></span> <?php echo $description3 ?>
            </span>
          </div>
        </div>
 <?php
    endwhile;
else :
    // no rows found
endif;
?>
      </div>
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

<?php wp_footer(); ?>
</body>
</html>
