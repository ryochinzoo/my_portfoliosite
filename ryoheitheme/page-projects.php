<?php

get_header(); ?>

<div class="page-contents page-left">
	<h1> Projects</h1>
	<div class="center">
		<?php $projectlist = get_posts(); ?>
		<?php foreach( $projectlist as $post ): ?>
			<div class="project-article floatleft">
				<div class="project-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<div class="hover-title"><div class="caption"><?php the_title();?></div></div>
					    <?php the_post_thumbnail(array(300, 168)); ?>
					</a>
				</div>
				<div class="flexbox justify-center">
					<?php $cat = get_the_category(); ?>
					<?php
						$cat_length = count($cat);
						for($i = 0; $i < $cat_length; $i++){
							echo '<div class="category-tag">'.get_cat_name($cat[$i]->term_id).'</div>';
						}
					?>
				</div>
			</div>
		<?php
			endforeach;
			wp_reset_postdata();
		?>
	</div>
	<div style="clear: both;"></div>
	<div class="center">
		<div class="button-margin">For more samples of my work please <br class="sponly"><a href="mailto:h.ryohei.titech@gmail.com">contact me</a></div>
	</div>
</div>

 <?php get_footer(); ?>