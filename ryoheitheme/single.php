<?php

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="single-contents">
	<div class="single-flexbox">
		<div class="single-left">
			<div class="single-title">
				<?php the_title(); ?>
			</div>
			<div class="flexbox align-item news-data">
				<?php $cat = get_the_category(); ?>
				<?php
					$cat_length = count($cat);
					for($i = 0; $i < $cat_length; $i++){
						echo '<div class="category-tag">'.get_cat_name($cat[$i]->term_id).'</div>';
					}
				?>
			</div>
			<br />
			<div class="single-left-contents">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div id="prev_next" class="clearfix flexbox align-item justify-between">
	<?php
	$prevpost = get_adjacent_post(false, '', true); //前の記事
	$nextpost = get_adjacent_post(false, '', false); //次の記事
	if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
	?>
	<?php
	if ( $prevpost ) { //前の記事が存在しているとき
	echo '<a href="' . get_permalink($prevpost->ID) . '" title="' . get_the_title($prevpost->ID) . '" id="prev" class="clearfix prevnext">
	<div id="prev_title">< PREV</div>
	' . get_the_post_thumbnail($prevpost->ID, array(300, 168)) . '
	<p>' . get_the_title($prevpost->ID) . '</p></a>';
	} else { //前の記事が存在しないとき
	echo  '<div id="prev_no"><a href="' .home_url('/'). '"><div id="prev_next_home"><i class="fa fa-home"></i>
	</div></a></div>';
	}
	if ( $nextpost ) { //次の記事が存在しているとき
	echo '<a href="' . get_permalink($nextpost->ID) . '" title="'. get_the_title($nextpost->ID) . '" id="next" class="clearfix prevnext">
	<div id="next_title" style="text-align:right;">NEXT ></div>
	' . get_the_post_thumbnail($nextpost->ID, array(300, 168)) . '
	<p>'. get_the_title($nextpost->ID) . '</p></a>';
	} else { //次の記事が存在しないとき
	echo '<div id="next_no"><a href="' .home_url('/'). '"><div id="prev_next_home"><i class="fa fa-home"></i>
	</div></a></div>';
	}
	?>
	<?php } ?>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer("2"); ?>