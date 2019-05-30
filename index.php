<?php get_header(); ?>
<div id="icerikl">
			<div class="row">
			<?php
			query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=4');
			if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-md-3 col-sm-6">
					<div id="tamamla">
						<a href="<?php the_permalink() ?>">
						  <?php if(has_post_thumbnail()) { the_post_thumbnail(); } 
						  elseif( $thumbnail = get_post_meta($post->ID, 'resim', true) ){?> 
						  <img src="<?php echo $thumbnail;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="100%"/><?php } ?>
						</a>
						<div id="bilgiler" onclick="location.href='<?php the_permalink(); ?>'"></div>
						<div id="byazi">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						</div>
						<div id="byorum">
						<i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number('0', '1', '%' );?>
						</div>
						<div id="bcat"><?php the_category(', ') ?></div>
					</div>
				</div>
			    <?php endwhile;else : endif; ?>
				<div class="hidden-md hidden-lg"><br></div>
			</div>
		</div>
		<div id="icerikh">
			<div class="row">
				<div class="col-md-8" id="ileft">
				<div id="sonyazilar">
					<div id="baslik">
						<h2 class="hred"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp; Son Yazılar</h2>
					</div>
					<?php query_posts("showposts&paged=$paged"); ?>
					<?php while (have_posts()) : the_post(); ?>
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
					<?php endwhile;?>
					<?php sayfalama(); ?>
				</div>
				<div id="mag1">
					<div id="baslik">
						<h2 class="hblack">
						<?php if (of_get_option('bgm_mag1icon') == "" ) { ?>
						<i class="fa fa-laptop" aria-hidden="true"></i>
						<?php } else { ?>
						<?php echo of_get_option('bgm_mag1icon');?>
						<?php } ?>
						&nbsp; 
						<?php if (of_get_option('bgm_mag1adi') == "" ) { ?>
						Teknoloji
						<?php } else { ?>
						<?php echo of_get_option('bgm_mag1adi'); ?>
						<?php } ?>

						</h2>
					</div>
					<div class="row">
					<?php if (of_get_option('bgm_mag1id') == "" ) { ?>
					<?php
					$mag1id = 0;
					?>
					<?php } else { ?>
					<?php
					$mag1id = of_get_option('bgm_mag1id');
					?>
					<?php } ?>
					<?php query_posts("showposts=3&orderby=date&cat=0$mag1id"); ?> <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="col-md-4 col-sm-12">
							<div id="tamamla" class="mag1post">
								<a href="<?php the_permalink() ?>">
								  <?php if(has_post_thumbnail()) { the_post_thumbnail(); } 
								  elseif( $thumbnail = get_post_meta($post->ID, 'resim', true) ){?> 
								  <img src="<?php echo $thumbnail;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="100%"/><?php } ?>
								</a>
								<div id="bilgiler"></div>
								<div id="byazi">
								<h2><a href="<?php the_permalink() ?>" class="mag1a"><?php the_title() ?></a></h2>
								</div>
								<div id="byorum">
								<i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number('0', '1', '%' );?>
								</div>
								<div id="bcat"><?php the_category(', ') ?></div>
							</div>
						</div>
					<?php endwhile;else : endif; ?>
					</div>
				</div>
				<div id="mag2">
				<div class="row">
				<div class="col-md-6">
					<div id="baslik">
						<h2 class="hgreen">
						<?php if (of_get_option('bgm_mag2sicon') == "" ) { ?>
						<i class="fa fa-android" aria-hidden="true"></i>
						<?php } else { ?>
						<?php echo of_get_option('bgm_mag2sicon');?>
						<?php } ?>
						&nbsp; 
						<?php if (of_get_option('bgm_mag2sadi') == "" ) { ?>
						Android
						<?php } else { ?>
						<?php echo of_get_option('bgm_mag2sadi'); ?>
						<?php } ?>
						</h2>
					</div>
					<?php if (of_get_option('bgm_mag2sid') == "" ) { ?>
					<?php
					$mag2sid = 0;
					?>
					<?php } else { ?>
					<?php
					$mag2sid = of_get_option('bgm_mag2sid');
					?>
					<?php } ?>
					<?php query_posts("showposts=3&orderby=date&cat=0$mag2sid"); ?> <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="sony" style="padding-bottom: 10px; margin-bottom: 10px;">
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
									<h3 class="msony"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php the_category(', ') ?> &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('0 Yorum', '1 Yorum', '% Yorum' );?></div>
									</div>
								</div>
							</div>
							<div class="col-md-8 hidden-sm hidden-md hidden-lg">
							<br>
									<h3 class="msony"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php the_category(', ') ?> &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('0 Yorum', '1 Yorum', '% Yorum' );?></div>
									</div>
							</div>
						</div>
					</div>
					<?php endwhile;else : endif; ?>
				</div>
				<div class="col-md-6">
					<div id="baslik">
						<h2 class="hblue">
						<?php if (of_get_option('bgm_mag2saicon') == "" ) { ?>
						<i class="fa fa-ios" aria-hidden="true"></i>
						<?php } else { ?>
						<?php echo of_get_option('bgm_mag2saicon');?>
						<?php } ?>
						&nbsp; 
						<?php if (of_get_option('bgm_mag2saadi') == "" ) { ?>
						iOS
						<?php } else { ?>
						<?php echo of_get_option('bgm_mag2saadi'); ?>
						<?php } ?>
						</h2>
					</div>
					<?php if (of_get_option('bgm_mag2said') == "" ) { ?>
					<?php
					$mag2said = 0;
					?>
					<?php } else { ?>
					<?php
					$mag2said = of_get_option('bgm_mag2said');
					?>
					<?php } ?>
					<?php query_posts("showposts=3&orderby=date&cat=0$mag2said"); ?> <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="sony" style="padding-bottom: 10px; margin-bottom: 10px;">
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
									<h3 class="msony"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php the_category(', ') ?> &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('0 Yorum', '1 Yorum', '% Yorum' );?></div>
									</div>
								</div>
							</div>
							<div class="col-md-8 hidden-sm hidden-md hidden-lg">
							<br>
									<h3 class="msony"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php the_category(', ') ?> &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('0 Yorum', '1 Yorum', '% Yorum' );?></div>
									</div>
							</div>
						</div>
					</div>
					<?php endwhile;else : endif; ?>
				</div>
				</div>
				</div>
				</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>