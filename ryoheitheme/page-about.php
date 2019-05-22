<?php

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-contents page-left">
	<div class="sp-about">
			<h2>Name: Ryohei Hara</h2>
			<h1 class="about-topic">Summary</h1>
			<p class="about-detail">I am a Berlin-based UX Designer and Web Developer, with several years experience in each role.<br />
			I am passionate about developing websites with user-friendly aspects. So I always consider how people feel from websites. This is why I am doing also UX Design with interdisciplinary educational backgrounds</p>
			<div class="flexbox align-item about-photo">
				<div class="sp-photo"><img src="<?php bloginfo('template_url'); ?>/img/about-me.png" /></div>
				<div>
					<ul class="points">
						<li>Working permission as a freelancer in Berlin</li>
						<li>3 years experience UX Research and Design</li>
						<li>3 years experience in Frontend and Backend development</li>
						<li>Skills in wireframing, UX documentation, and concept ideation</li>
						<li>Good level of English (between B2 and C1) and German (B1)</li>
						<li>17 years of experience in the realm of IT</li>
						<li>Interdisciplinary backgrounds among Tech, Design (UX/UI), Pedagogy and Psychology.</li>
					</ul>
				</div>
			</div>
			<h1 class="about-topic">Skills & Tools</h1>
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
			<h1 class="about-topic">SNS & CV</h1>
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
					</tbody>
				</table>
			</div>
		</div>
	<?php the_content(); ?>
	<div class="center"><a class="button_yellow arrow button-margin" href="https://www.dropbox.com/s/szu175fl1t5jf8x/CV_Ryohei%20Hara.pdf?dl=0" target="_blank">Read Resume</a></div>
</div>
<?php endwhile; ?>
<?php endif; ?>

 <?php get_footer(); ?>