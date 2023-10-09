			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="footer-top" style="padding-left:15px; padding-right:15px;">
					<div style="float:left; margin-bottom:10px;">
						<?php _e('eMa, Ecole des Musiques Actuelles', 'webfactor'); ?><br>
						Passage Marie-Claude Leburgue 2 (anciennement Passage de la Radio 2), 1205 Genève, Suisse | +41 (0)22 344 44 22 | <a href="mailto:info@ema.school">info@ema.school</a><br>

						<div style="margin-top: 0px;">
							<?php _e('Certified by the DIP, with the support of the Republic and Canton of Geneva', 'webfactor'); ?></div>
					</div>
					<div class="socialmedia">
						<a target="_blank" href="https://www.youtube.com/channel/UCvwJprSEMiebZqfYamLsYTQ">
							<div class="socialicon youtube"></div>
						</a>
						<a target="_blank" href="https://www.facebook.com/eMaGeneve/">
							<div class="socialicon facebook"></div>
						</a>
						<a target="_blank" href="https://www.instagram.com/ema_ecoledesmusiquesactuelles/">
							<div class="socialicon instagram"></div>
						</a>
						<a target="_blank" href="https://soundcloud.com/ema_geneve">
							<div class="socialicon cloud"></div>
						</a>
					</div>
					<div class="clear"></div>
				</div>
				<div class="footer-middle" style="padding-left:15px; padding-right:15px;"><?php html5blank_nav(); ?></div>
				<div class="footer-bottom" style="padding-left:15px; padding-right:15px;"><?php _e('Website by', 'webfactor'); ?> <a target="_blank" href="http://www.lunic.ch">LUNIC</a> <?php _e('et', 'webfactor'); ?> <a target="_blank" href="http://www.webfactor.ch"><span style="font-weight:bold">Web</span>Factor</a></div>

			</footer>
			<!-- /footer -->

			</div>
			<!-- /wrapper -->



			<?php if (defined('ICL_LANGUAGE_CODE')) : ?>
				<script>
					var site_lang = '<?php echo ICL_LANGUAGE_CODE; ?>';
				</script>
			<?php endif; ?>

			<?php wp_footer(); ?>

			<!-- analytics -->
			<script>
				(function(i, s, o, g, r, a, m) {
					i['GoogleAnalyticsObject'] = r;
					i[r] = i[r] || function() {
						(i[r].q = i[r].q || []).push(arguments)
					}, i[r].l = 1 * new Date();
					a = s.createElement(o),
						m = s.getElementsByTagName(o)[0];
					a.async = 1;
					a.src = g;
					m.parentNode.insertBefore(a, m)
				})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

				ga('create', 'UA-65615352-2', 'auto');
				ga('send', 'pageview');
			</script>

			</body>

			</html>