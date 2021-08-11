<?php get_header(); ?>
		<div id="icerikh">
			<div class="row">
				<div class="col-md-8" id="ileft">
				<div id="sonyazilar">
					<div id="baslik">
						<h2 class="hred"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp; SONUÇLAR</h2>
					</div>
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<div id="sony">
						<div class="row">
							
							<div class="col-md-4">
							<a href="<?php the_permalink() ?>">
							  <?php if(has_post_thumbnail()) { the_post_thumbnail(); } 
							  elseif( $thumbnail = get_post_meta($post->ID, 'resim', true) ){?> 
							  <img src="<?php echo $thumbnail;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="100%"/><?php } ?>
							</a>
							</div>
							<div class="col-md-8 hidden-xs">
								<div class="row">
									<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<div class="yazibilgi">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php the_category(', ') ?> &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('Yorum Yok', '1 Yorum', '% Yorum' );?></div>
									</div>
									<?php echo get_excerpt(190);?>
								</div>
							</div>
							<div class="col-md-8 hidden-sm hidden-md hidden-lg">
							<br>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="yazibilgi">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> Teknoloji &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('Yorum Yok', '1 Yorum', '% Yorum' );?></div>
									</div>
									<?php echo get_excerpt(190);?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php sayfalama(); ?>
				</div>
				</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>