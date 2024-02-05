<article class="car-post-loop" id="car-<?php the_ID(); ?>" <?php post_class(); ?>>	
<div class="content-car-loop">
<div class="thumbnail">
 <img class="car-image" src="<?php echo carbon_get_the_post_meta( 'car_image' );?>">
	</div>
    <div class="entry-content">
        <strong> Marka: </strong> <?php echo carbon_get_the_post_meta( 'car_mark' );?>
        <strong> Cena: </strong> <?php echo carbon_get_the_post_meta( 'car_price' );?>
        <strong> Pojemność: </strong> <?php echo carbon_get_the_post_meta( 'car_engine' );?>
        <strong> Przebieg: </strong> <?php echo carbon_get_the_post_meta( 'car_total_km' );?>
    </div>
</div>
</article>