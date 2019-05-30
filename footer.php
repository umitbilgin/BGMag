		<div id="footer">
		<?php if (of_get_option('bgm_footer') == "" ) { ?>
		<?php bloginfo("name"); ?> 2018 Tüm Hakları Saklıdır
		<?php } else { ?>
		<?php echo of_get_option('bgm_footer');?>
		<?php } ?>
		<div class="pull-right">Tema : <a href="https://umitbilgin.com.tr/" target="_blank" title="Ümit Bilgin" alt="Ümit Bilgin">Ümit Bilgin</a></div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
</body>
<?php wp_footer(); ?>
</html>