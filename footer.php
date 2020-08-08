</main>

<footer>
<!-- functions.phpで設定したウィジェット（フッター用）の読み込み -->
<div id="footerwidget">
<?php dynamic_sidebar('footerwidget'); ?>
</div>

<!-- functions.phpで設定したメニューの読み込み -->
<nav id="menu-footer">
<?php wp_nav_menu(
	array (
		'theme_location' => 'footer'
	)
); ?>
</nav>

<p class="copyright">&copy; 20XX <?php echo get_bloginfo('name');?>.</p>
</footer>


<?php wp_footer(); ?>
</body>
</html>