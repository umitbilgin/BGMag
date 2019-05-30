<?php setPostViews(get_the_ID()); ?>
<?php get_header(); ?>
		<div id="icerikh">
			<div class="row">
				<div class="col-md-8" id="ileft">
				<div id="sonyazilar">
					<div id="baslik">
						<h2 class="hred singlebaslik"><?php the_title() ?></h2>
					</div>
					<div id="sosyal">
						<div class="row">
							<div class="col-md-4">
							<div class="socialfb" onclick="location.href='https://fb.com/share.php?u=<?php the_permalink() ?>'"><center><i class="fa fa-facebook" aria-hidden="true"></i></center></div>
							</div>
							<div class="col-md-4">
							<div class="socialtw" onclick="location.href='https://twitter.com/intent/tweet?text=<?php the_permalink() ?>'"><center><i class="fa fa-twitter" aria-hidden="true"></i></center></div>
							</div>
							<div class="col-md-4" onclick="location.href='https://plus.google.com/share?url=<?php the_permalink() ?>'">
							<div class="socialgp"><center><i class="fa fa-google-plus" aria-hidden="true"></i></center></div>
							</div>
						</div>
					</div>
					<div id="single"><br>
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
									<?php echo the_content();?>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
				</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>