<?php
/**
 * @package WordPress
 * @subpackage ryoheitheme
 * @since ryoheitheme 1.0
 */

get_header(); ?>
<div class="contents">
	<div id="first-view" class="fv-color">
		<div class="fv-centering">
			<div id="logo-cover" class="pconly flexbox justify-center">
				<div id="fv-logo">
					<a class="button_key arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>about/">more about me</a>
				</div>
				<div id="fv-tag" class="font-size-30">
					Freelance UX/UI/WEB<br />
					Designer & Developer<br />
					Based in Berlin
				</div>
			</div>
			<div id="logo-cover" class="sponly">
				<div id="fv-tag-sp">
					Freelance UX/UI/WEB<br />
					Designer & Developer<br />
					Based in Berlin
				</div>
				<div id="fv-logo-sp" class="button-margin">
					<a class="button_key arrow" href="https://www.dropbox.com/s/szu175fl1t5jf8x/CV_Ryohei%20Hara.pdf?dl=0" target="_blank">more about me</a>
				</div>
			</div>
		</div>
	</div>
	<div id="intro" class="p_tb_80">
		<div class="intro-padding">
			<div class="font-rubik tag main-lt-color">Projects</div>
			<div id="intro-top">
				<div class="center flexbox align-item justify-center">
					<?php query_posts('posts_per_page=3'); ?>
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="project-article">
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
					<?php endwhile; endif; ?>
				</div>
				<div class="center">
					<a class="button_blue lt_white weight-bold arrow button-margin" href="<?php echo esc_url( home_url( '/' ) ); ?>projects/">All Projects</a>
					<div class="button-margin">For more samples of my work please <br class="sponly"><a href="mailto:h.ryohei.titech@gmail.com">contact me</a></div>
				</div>
			</div>
		</div>
	</div>
	<div id="cnt-process" class="main-color p_tb_80">
		<div class="intro-padding">
			<div class="font-rubik tag lt_white">Process</div>
			<div class="boxes-margin">
				<div class="flexbox justify-center">
					<div class="process-box bg-white">
						<div class="process-icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-strategy.png" width="125" /></div>
						<div class="process-title">Definition / Strategy</div>
						<div class="process-detail">
							Defining requiments and needs and identifying best strategies to your goal.
						</div>
					</div>
					<div class="process-box bg-white">
						<div class="process-icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-research.png" width="100" /></div>
						<div class="process-title">Research / Analysis</div>
						<div class="process-detail">
							Conducting design and user research and analysis based on definition and strategy.
						</div>
					</div>
					<div class="process-box bg-white">
						<div class="process-icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-conception.png" width="90" /></div>
						<div class="process-title">Conception</div>
						<div class="process-detail">
							Creating the concept of your product and/or solutions; idealization etc and setting concrete tactics for your product.
						</div>
					</div>
				</div>
				<div class="flexbox justify-center">
					<div class="process-box bg-white">
						<div class="process-icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-ux.png" width="125" /></div>
						<div class="process-title">UX Design</div>
						<div class="process-detail">
							Creating wireframes prototypes and suggesting an effective hypothesis from concept.
						</div>
					</div>
					<div class="process-box bg-white">
						<div class="process-icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-ui.png" width="125" /></div>
						<div class="process-title">UI Design</div>
						<div class="process-detail">
							Designing user interface and defining user interaction.
						</div>
					</div>
					<div class="process-box bg-white">
						<div class="process-icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-dev.png" width="100" /></div>
						<div class="process-title">Development</div>
						<div class="process-detail">
							Realizing your product with CMS or from scratch and acquiring feedbacks and improving it after deployment.
						</div>
					</div>
				</div>
			</div>
		<!--
			<div id="out-of-box">
				<div class="center">
					<a class="button_blue lt_white font-size-12 weight-bold arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>">More Details</a>
				</div>
			</div>
		-->
		</div>

	</div>
	<div id="cnt-info" class="p_tb_80 spacing bg-gray">
		<div class="font-rubik tag main-lt-color">About</div>
		<div class="sp-about">
			<div class="about-topic">Name: Ryohei Hara</div>
			<div class="about-topic"><u>Summary</u></div>
			<div class="about-detail">I am a Berlin-based UX Designer and Web Developer, with several years experience in each role.<br />
			I am passionate about developing websites with user-friendly aspects. So I always consider how people feel from websites. This is why I am doing also UX Design with interdisciplinary educational backgrounds</div>
			<div class="flexbox align-item about-photo">
				<div class="sp-photo"><img src="<?php bloginfo('template_url'); ?>/img/about-me.png" /></div>
				<div>
					<ul class="points">
						<li>Working permission as a freelancer in Berlin</li>
						<li>3 years experience UX Research and Design</li>
						<li>3 years experience in Frontend and Backend development</li>
						<li>Skills in wireframing, UX documentation, and concept ideation</li>
						<li>Good level of English (between B2 and C1) and German (B1)</li>
						<li>17 years of experience in the realm of IT.</li>
						<li>Interdisciplinary backgrounds among Tech, Design (UX/UI), Pedagogy and Psychology.</li>
					</ul>
				</div>
			</div>
			<hr />
			<div class="about-topic"><u>Skills & Tools</u></div>
			<div class="about-detail">
				<table>
					<tbody>
						<tr>
							<td>Design</td>
							<td>Adobe Creative Suite, Wireframes, Prototypes</td>
						</tr>
						<tr>
							<td>Frontend Side</td>
							<td>HTML5/CSS3, Javascript, jQuery, Wordpress</td>
						</tr>
						<tr>
							<td>Backend Side</td>
							<td>Python, Node.js, Flask (DJango), PHP</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr />
			<div class="about-topic"><u>SNS & CV</u></div>
			<div class="about-detail">
				<table>
					<tbody>
						<tr>
							<td>Linked In</td>
							<td><a href="https://www.linkedin.com/in/ryohei-hara-6b160553/">https://www.linkedin.com/in/ryohei-hara-6b160553/</a></td>
						</tr>
						<tr>
							<td>Xing</td>
							<td><a href="https://www.xing.com/profile/Ryohei_Hara/cv">https://www.xing.com/profile/Ryohei_Hara/cv</a></td>
						</tr>
					<!--
						<tr>
							<td colspan="2"><a>Resume</a></td>
						</tr>
					-->
					</tbody>
				</table>
			</div>
		</div>
		<br />
		<div class="center">
			<a class="button_yellow arrow button-margin" href="<?php echo esc_url( home_url( '/' ) ); ?>about/">more about me</a>
		</div>
	</div>
</div>


<?php
get_footer();