<?php

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="single-contents single-left	">
	<?php the_content(); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>

 <?php get_footer("2"); ?>