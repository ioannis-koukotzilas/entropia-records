<footer class="site-footer">
	<div class="site-footer__container">

		<div class="brand">
			<div class="brand__container">
				<div class="brand-logo"></div>
				<div class="site-title">
					<h1>Entropia Records</h1>
					<p class="tagline">An aural introduction to chaos</p>
				</div>
			</div>
		</div>

		<div class="nav">
			<div class="nav__container">
			<div class="footer-store-menu">
				<h4>Navigation</h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'store-menu',
						'container' => '',
						'menu_id' => 'store-menu',
					)
				);
				?>
			</div>

			<div class="footer-info-menu">
				<h4>Service</h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'info-menu',
						'container' => '',
						'menu_id' => 'info-menu',
					)
				);
				?>
			</div>

			<div class="footer-physical-store">
				<h4>Psysical Store</h4>
				<p>Entropia Records<br>
					Kypseli Municipal Market<br>
					Fokionos Negri 42<br>
					113 61, Athens, Greece
				</p>
			</div>

			<div class="footer-contact">
				<h4>Contact</h4>
				<a href="mailto:info@entropia-records.com">info@entropia-records.com</a>
				<div class="social-networks">
					<ul>
						<li><a href="http://#" target="_blank" rel="noopener noreferrer">Facebook</a></li>
						<li><a href="http://#" target="_blank" rel="noopener noreferrer">Instagram</a></li>
						<li><a href="http://#" target="_blank" rel="noopener noreferrer">Soundcloud</a></li>
					</ul>
				</div>
			</div>
			</div>
		</div>

		<div class="cc">
			<div class="cc__container">
				<span>© 2022 Entropia — Powered by <a href="http://monoscopic.net" target="_blank" rel="noopener noreferrer">MONOSCOPIC STUDIO</a></span>
			</div>
		</div>

	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>