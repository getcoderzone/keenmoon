	<!-- Footer -->
	<footer>
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php dynamic_sidebar('keenmoon_footer_one');?>
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar('keenmoon_footer_two');?>
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar('keenmoon_footer_three');?>
					</div>
				</div>
				
			</div>
		</div>
		<div class="container">
			<div class="copyright">
				<p>
					<?php
						$copyright = get_theme_mod('keenmoon_copyright_display');
						if (!empty($copyright)) {
						 	echo $copyright; 
						} 
						else{
						 	echo 'Copyright &copy; Your Website 2015 . Design & Develop By <a rel="nofollow" target="_blank" href="http://shafiqul.info">Shafiqul</a>';
						}
					?>
				</p>
			</div>
		</div>
		<!-- /.row -->
	</footer>
	<div id="back-top"><a href="#top"><i class="fa fa-chevron-up"></i></a></div>
    <!-- jQuery -->
	
	<?php wp_footer();?>
</body>
</html>