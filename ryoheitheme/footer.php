<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage ryoheitheme
 * @since ryoheitheme 1.0
 */
?>
			<div id="cnt-faq" class="p_tb_80 spacing">
				<div class="font-rubik tag main-lt-color center">I'm looking for job opportunities</div>
				<div class="center send-message">I am looking for both fulltime employment oppotunites and freelancing projects of Web Design/Development and translation.<br />Feel free to contact me for any work enquiries using email</div>
				<div class="center">
					<a class="button_red arrow font-size-12" href="mailto:h.ryohei.titech@gmail.com">Send Message</a>
				</div>
			</div>
		</div><!-- #main -->

		<footer id="footer" class="footer" role="contentinfo">
			<div class="footer-main center lt_white">
				<div class="copyrights sp-block sp-center" style="word-break: break-all;">
					© Ryohei Hara 2019. All rights reserved.
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<script type="text/javascript">
	var j = jQuery.noConflict();
	j(document).ready(function() {

		var flag = "view";
		var w = j(window).width();
		var h = j(window).height();
		var menuHeight = j(".fix-header").height();
		var headerHeight = j(".header").height();
		var startPos = 0;
		var contentsHeight = j("#page").height();
		var naviHeight = j(".feature-navigation").height();
		var naviSub = j(".feature-navigation");
		var naviScrollStart = headerHeight + j(".page-title").outerHeight() + j("#breadcrumb").outerHeight();
		var naviScrollStop = j("#page").outerHeight() - j("#footer").outerHeight() - j("#feature-spec").outerHeight() - headerHeight;
		j(".category-tag").each(function (index) {
			var text = j(this).text();
			if (text === "UX/UI") {
				j(this).css({"fontSize": "9pt", "backgroundColor": "#00A0E9", "color": "#fff", "margin": "5px", "padding": "5px 10px"});
			} else if (text === "Development") {
				j(this).css({"fontSize": "9pt", "backgroundColor": "#F39800", "color": "#fff", "margin": "5px", "padding": "5px 10px"});
			} else if (text === "Responsive") {
				j(this).css({"fontSize": "9pt", "backgroundColor": "#8FC31F", "color": "#fff", "margin": "5px", "padding": "5px 10px"});
			} else {
				j(this).css({"fontSize": "8pt", "backgroundColor": "#f4f4f4", "color": "#000", "margin": "5px", "padding": "5px 12px"});
			}
		});

		j(window).scroll(function(){
			var currentPos = j(this).scrollTop();

			if (currentPos > startPos) {

				if(j(window).scrollTop() >= 200) {
					j(".fix-header").css("top", "-" + menuHeight + "px");
				}
			} else {
				j(".fix-header").css("top", 0 + "px");
			}
			startPos = currentPos;
			var w = j(window).width();
			if (w > 480) {

				if (naviScrollStart < currentPos && currentPos < naviScrollStop) {
					naviSub.css({"position": "fixed", "top": (naviScrollStart - headerHeight) + "px"});
				} else if (currentPos >= naviScrollStop) {
					naviSub.css({"position": "absolute", "top": (naviScrollStop - naviScrollStart) + "px"});
				} else {
					naviSub.css({"position": "absolute", "top": "-10px"});
				}
			}
		});

		j(window).resize(function(){
			w = j(window).width();
			var naviWidth = 0;
			if (w <= 1024 && w > 768) {
				naviWidth = w * 0.10;
			} else if (w <= 768) {
				naviWidth = 0;
			} else {
				naviWidth = w * 0.15;
			}
			j(".feature-navigation").css({"left": naviWidth + "px"});
		});
	});
</script>
	<?php wp_footer(); ?>
</body>
</html>