<?php get_header(); ?>

<div class="hero-section">


  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
    
<!---  slide --->

    <div class="swiper-slide hero-slide" style="background: url('/wordpress/wp-content/themes/bootscore-child-main/assets/Video.png');">
    
    <div class="slide-content">

    <h1 class="hero-slide-title"> Lorem ipsum </h1>

    <span class="hero-slide-content"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. </span>

    <a href="#" class="link-slide"> Lorem </a>

    </div>
    
    </div>

    <!--- End slide --->

    <!---  slide --->

    <div class="swiper-slide hero-slide" style="background: url('/wordpress/wp-content/themes/bootscore-child-main/assets/Video.png');">
    
    <div class="slide-content">

    <h1 class="hero-slide-title"> Lorem ipsum </h1>

    <span class="hero-slide-content"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. </span>

    <a href="#" class="link-slide"> Lorem </a>

    </div>
    
    </div>

    <!--- End slide --->

    <!---  slide --->

    <div class="swiper-slide hero-slide" style="background: url('/wordpress/wp-content/themes/bootscore-child-main/assets/Video.png');">
    
    <div class="slide-content">

    <h1 class="hero-slide-title"> Lorem ipsum </h1>

    <span class="hero-slide-content"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. </span>

    <a href="#" class="link-slide"> Lorem </a>

    </div>
    
    </div>

    <!--- End slide --->

    <!---  slide --->

    <div class="swiper-slide hero-slide" style="background: url('/wordpress/wp-content/themes/bootscore-child-main/assets/Video.png');">
    
    <div class="slide-content">

    <h1 class="hero-slide-title"> Lorem ipsum </h1>

    <span class="hero-slide-content"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. </span>

    <a href="#" class="link-slide"> Lorem </a>

    </div>
    
    </div>

    <!--- End slide --->
    
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>


<!--- END HERO SECTION --->
</div>


<!--- social icon --->

<div class="social-icon-box">

<div class="social-icon-item">
    <img src="/wordpress/wp-content/themes/bootscore-child-main/assets/Instagram.png">
</div>


<div class="social-icon-item">
    <img src="/wordpress/wp-content/themes/bootscore-child-main/assets/Twitter.png">
</div>


<div class="social-icon-item">
    <img src="/wordpress/wp-content/themes/bootscore-child-main/assets/Facebook.png">
</div>


<div class="social-icon-item">
    <img src="/wordpress/wp-content/themes/bootscore-child-main/assets/web.png">
</div>

</div>

<!--- End social icon --->

<div class="scroll-down">
    <img src="/wordpress/wp-content/themes/bootscore-child-main/assets/icon-down.png">
</div>

<div class="about-section"> 

<img class="about-image" src="<?php echo carbon_get_the_post_meta( 'about_us_image' );?>">

<div id="about" class="about-content">

    <h1> <?php echo _('O nas'); ?> </h1>

    <span class="desc-content"> 
        <?php echo carbon_get_the_post_meta( 'about_us' );?>"
    </span>
        

</div>

</div>

<!--- END ABOUT SECTION --->


<div id="service" class="service-section"> 

<div class="service-content">
<h1> <?php echo _('Oferta'); ?> </h1>

<div class="service_carousel">

  <!-- Swiper -->
  <div class="swiper service-swipe">
      <div class="swiper-wrapper">

<?php
 $services = new WP_Query(array(
    'post_type' => 'service',
    'paged' => 1
));

while($services->have_posts()): $services->the_post();		

get_template_part( 'template-parts/service-loop' );

endwhile;
?>
  
  </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper2 = new Swiper('.swiper-container', {
  slidesPerView: 1,
  effect: 'slide',
  mousewheel: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});
      var swiper = new Swiper(".service-swipe", {
        slidesPerView: 5,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>


<!-- END SERVICE CAROUSEL --->
</div>

</div>
</div>


<!-- END SERVICE SECTION -->
<div class="seprator-polygon"></div>
<div class="separator-section"></div>


<div id="news" class="news-section"> 

<h1> <?php echo _('Aktualności') ?> </h1>

<div class="posts-loop"> 

<div class="latest_posts_wrapper">
   <?php
      $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
      $latests = new WP_Query(array(
      	'post_type' => 'post',
      	'posts_per_page' => 4,
      	'paged' => $paged
      ));
      
      while($latests->have_posts()): $latests->the_post();		

      get_template_part( 'template-parts/post-loop' );

      endwhile;
      ?>
</div>
<script>
   var limit = 4,
       page = 1,
       type = 'latest',
       category = '',
       max_pages_latest = <?php echo $latests->max_num_pages ?>
</script>
<?php if ( $latests->max_num_pages > 1 ){
   echo '<div class="load_more text-center">
                    <a href="#" class="btn btn-circle btn-inverse btn-load-more">Pokaż wiecej</a> 
                </div>';
        }else{?>
<article>
   <p><?php _e('Brak postów do wyświetlenia !'); ?></p>
</article>
<?php }
   wp_reset_query();
   ?>


<!-- end posts loop --->

</div>

</div>

<!-- END POST BLOG SECTION --->



<div class="news-section cars-section"> 

<h1> <?php echo _('Samochody') ?> </h1>

<div class="posts-loop car-loop"> 

<div class="latest_car_wrapper">
   <?php
      $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
      $cars = new WP_Query(array(
      	'post_type' => 'cars',
          'posts_per_page' => 4,
          'paged' => 1,
      ));
      
      while($cars->have_posts()): $cars->the_post();		

      get_template_part( 'template-parts/car-loop' );

      endwhile;
      ?>
</div>
<?php 
   wp_reset_query();
   ?>


<!-- end car loop --->

</div>

</div>




<?php get_footer(); ?>