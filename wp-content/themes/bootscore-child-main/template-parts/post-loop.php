<article class="box-post-loop" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
<div class="content-post-loop">
<div class="thumbnail">
		<?php the_post_thumbnail('full'); ?>
	</div>
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
    <a class="read-more" href="<?php the_permalink();?>"> Czytaj dalej </a>
</div>
</article>