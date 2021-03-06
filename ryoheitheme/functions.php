<?php
	add_theme_support('post-thumbnails');
	add_filter( 'show_admin_bar', '__return_false' );

	function motionbase_widgets_init() {
		register_sidebar( array(
			'name' => 'ウィジェット',
			'id' => 'sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="title">',
			'after_title' => '</h2>',
		));
	}
	add_action( 'widgets_init', 'motionbase_widgets_init' );
	function breadcrumbs( $args = array() ){
	global $post;
	$str ='';
	$defaults = array(
		'id' => "breadcrumbs",
		'home' => "TOP",
		'search' => "で検索した結果",
		'tag' => "タグ",
		'author' => "投稿者",
		'notfound' => "404 Not found",
		'separator' => '&nbsp; > &nbsp;'
	);

	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
		if( is_home() ) {
		echo  '<div id="'. $id .'" >'.'<ul><li>'. $home .'</li></ul></div>';
		}

		if( !is_home() && !is_admin() ){
			$str.= '<div id="'. $id .'" >';
			$str.= '<ul>';
			$str.= '<li class="breadcrumb-top" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. home_url() .'/" itemprop="url"><span itemprop="title">'. $home .'</span></a></li>';
			$str.= '<li>'.$separator.'</li>';
			$my_taxonomy = get_query_var( 'taxonomy' );
			$cpt = get_query_var( 'post_type' );

		if( $my_taxonomy && is_tax( $my_taxonomy ) ) {
			$my_tax = get_queried_object();
			$post_types = get_taxonomy( $my_taxonomy )->object_type;
			$cpt = $post_types[0];
			$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' .get_post_type_archive_link( $cpt ).'" itemprop="url"><span itemprop="title">'. get_post_type_object( $cpt )->label.'</span></a></li>';
			$str.='<li>'.$separator.'</li>';

		if( $my_tax -> parent != 0 ) {
			$ancestors = array_reverse( get_ancestors( $my_tax -> term_id, $my_tax->taxonomy ) );

			foreach( $ancestors as $ancestor ){
				$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_term_link( $ancestor, $my_tax->taxonomy ) .'" itemprop="url"><span itemprop="title">'. get_term( $ancestor, $my_tax->taxonomy )->name .'</span></a></li>';
				$str.='<li>'.$separator.'</li>';
			}
		}
			$str.='<li>'. $my_tax -> name . '</li>';
		}

		elseif( is_category() ) {
			$cat = get_queried_object();
			if( $cat -> parent != 0 ){
				$ancestors = array_reverse( get_ancestors( $cat -> cat_ID, 'category' ));
				foreach( $ancestors as $ancestor ){
					$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link( $ancestor ) .'" itemprop="url"><span itemprop="title">'. get_cat_name( $ancestor ) .'</span></a></li>';
					$str.='<li>'.$separator.'</li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		}

		elseif( is_post_type_archive() ) {
			$cpt = get_query_var( 'post_type' );
			$str.='<li>'. get_post_type_object( $cpt )->label . '</li>';
		}

		elseif( $cpt && is_singular( $cpt ) ){
			$taxes = get_object_taxonomies( $cpt );
			$mytax = $taxes[0];
			$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' .get_post_type_archive_link( $cpt ).'" itemprop="url"><span itemprop="title">'. get_post_type_object( $cpt )->label.'</span></a></li>';
			$str.='<li>'.$separator.'</li>';
			$taxes = get_the_terms( $post->ID, $mytax );
			$tax = get_youngest_tax( $taxes, $mytax );

		if( $tax -> parent != 0 ){
			$ancestors = array_reverse( get_ancestors( $tax -> term_id, $mytax ) );
			foreach( $ancestors as $ancestor ){
				$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_term_link( $ancestor, $mytax ).'" itemprop="url"><span itemprop="title">'. get_term( $ancestor, $mytax )->name . '</span></a></li>';
				$str.='<li>'.$separator.'</li>';
			}
		}
			$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_term_link( $tax, $mytax ).'" itemprop="url"><span itemprop="title">'. $tax -> name . '</span></a></li>';
			$str.='<li>'.$separator.'</li>';
			$str.= '<li>'. $post -> post_title .'</li>';
		}

		elseif( is_single() ){
			$categories = get_the_category( $post->ID );
			$cat = get_youngest_cat( $categories );
			if( $cat -> parent != 0 ){
				$ancestors = array_reverse( get_ancestors( $cat -> cat_ID, 'category' ) );
			foreach( $ancestors as $ancestor ){
				$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link( $ancestor ).'" itemprop="url"><span itemprop="title">'. get_cat_name( $ancestor ). '</span></a></li>';
				$str.='<li>'.$separator.'</li>';
			}
		}
			$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.home_url().'/news/" itemprop="url"><span itemprop="title">お知らせ</span></a></li>';
			$str.='<li>'.$separator.'</li>';
			$str.= '<li>'. $post -> post_title .'</li>';
        }

		elseif( is_page() ){
			if( $post -> post_parent != 0 ){
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				foreach( $ancestors as $ancestor ){
					$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink( $ancestor ).'" itemprop="url"><span itemprop="title">'. get_the_title( $ancestor ) .'</span></a></li>';
					$str.='<li>'.$separator.'</li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		}

		elseif( is_date() ){
			if( get_query_var( 'day' ) != 0){
				$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_year_link(get_query_var('year')). '" itemprop="url"><span itemprop="title">' . get_query_var( 'year' ). '年</span></a></li>';
				$str.='<li>'.$separator.'</li>';
				$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_month_link(get_query_var( 'year' ), get_query_var( 'monthnum' ) ). '" itemprop="url"><span itemprop="title">'. get_query_var( 'monthnum' ) .'月</span></a></li>';
				$str.='<li>'.$separator.'</li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
		}

		elseif( get_query_var('monthnum' ) != 0){
			$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_year_link( get_query_var('year') ) .'" itemprop="url"><span itemprop="title">'. get_query_var( 'year' ) .'年</span></a></li>';
			$str.='<li>'.$separator.'</li>';
			$str.='<li>'. get_query_var( 'monthnum' ). '月</li>';
		}

		else {
			$str.='<li>'. get_query_var( 'year' ) .'年</li>';
		}
		}

		elseif( is_search() ) {
			$str.='<li>「'. get_search_query() .'」'. $search .'</li>';
		}

		elseif( is_author() ){
			$str .='<li>'. $author .' : '. get_the_author_meta('display_name', get_query_var( 'author' )).'</li>';
		}

		elseif( is_tag() ){
			$str.='<li>'. $tag .' : '. single_tag_title( '' , false ). '</li>';
		}

		elseif( is_attachment() ){
			$str.= '<li>'. $post -> post_title .'</li>';
		}

		elseif( is_404() ){
			$str.='<li>'.$notfound.'</li>';
		}

		else{
			$str.='<li>'. wp_title( '', true ) .'</li>';
		}

			$str.='</ul>';
			$str.='</div>';
		}
	echo $str;
}

function get_youngest_cat( $categories ){
	global $post;
	if(count( $categories ) == 1 ){
		$youngest = $categories[0];
	}
	else{
		$count = 0;
		foreach( $categories as $category ){
			$children = get_term_children( $category -> term_id, 'category' );
			if($children){
				if ( $count < count( $children ) ){
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ){
						if( in_category( $child, $post -> ID ) ){
							$youngest = get_category( $child );
						}
					}
				}
			}
			else{
				$youngest = $category;
			}
		}
	}
	return $youngest;
}

function get_youngest_tax( $taxes, $mytaxonomy ){
	global $post;
	if( count( $taxes ) == 1 ){
		$youngest = $taxes[ key( $taxes )];
	}
	else{
		$count = 0;
		foreach( $taxes as $tax ){
			$children = get_term_children( $tax -> term_id, $mytaxonomy );
			if($children){
				if ( $count < count($children) ){
					$count = count($children);
					$lot_children = $children;
					foreach($lot_children as $child){
						if( is_object_in_term( $post -> ID, $mytaxonomy ) ){
							$youngest = get_term($child, $mytaxonomy);
						}
					}
				}
			}
			else{
				$youngest = $tax;
			}
		}
	}
	return $youngest;
}
function custom_previous_post_link( $maxlen = -1, $format = '&laquo; %link', $link = '%title', $in_same_cat = false, $excluded_categories = '') {
Custom_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, true, $maxlen);
}
function custom_next_post_link( $maxlen = -1, $format = '%link &raquo;', $link = '%title', $in_same_cat = false, $excluded_categories = '') {
Custom_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, false);
}

function Custom_adjacent_post_link( $maxlen = -1, $format = '&laquo; %link', $link = '%title', $in_same_cat = false, $excluded_categories = '', $previous = true) {

	if ( $previous && is_attachment() )
		$post = & get_post($GLOBALS['post']->post_parent);
	else
		$post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

	if ( !$post ) {
		return;
	} else {
		$tCnt = mb_strlen( $post->post_title, get_bloginfo('charset') );

		if(($maxlen > 0) && ($tCnt > $maxlen)) {
			$title = mb_substr( $post->post_title, 0, $maxlen, get_bloginfo('charset') ) . '…';
		} else {
			$title = $post->post_title;
		}

		if ( empty($post->post_title) )
			$title = $previous ? __('Previous Post') : __('Next Post');

		$title = apply_filters('the_title', $title, $post->ID);
		$date = mysql2date(get_option('date_format'), $post->post_date);
		$rel = $previous ? 'prev' : 'next';

		$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'">';
		$link = str_replace('%title', $title, $link);
		$link = str_replace('%date', $date, $link);
		$link = $string . $link . '</a>';

		$format = str_replace('%link', $link, $format);
		echo $format;
	}
}
?>