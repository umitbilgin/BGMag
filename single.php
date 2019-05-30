<?php setPostViews(get_the_ID()); ?>
<?php get_header(); ?>
		<div id="icerikh">
			<div class="row">
				<div class="col-md-8" id="ileft">
				<div id="sonyazilar">
					<div id="baslik">
						<h2 class="hred singlebaslik"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp; <?php the_category(', ') ?></h2>
					</div>
					<div id="sosyal">
						<div class="row">
							<div class="col-md-4 col-xs-4">
							<div class="socialfb" onclick="location.href='https://fb.com/share.php?u=<?php the_permalink() ?>'"><center><i class="fa fa-facebook" aria-hidden="true"></i></center></div>
							</div>
							<div class="col-md-4 col-xs-4">
							<div class="socialtw" onclick="location.href='https://twitter.com/intent/tweet?text=<?php the_permalink() ?>'"><center><i class="fa fa-twitter" aria-hidden="true"></i></center></div>
							</div>
							<div class="col-md-4 col-xs-4" onclick="location.href='https://plus.google.com/share?url=<?php the_permalink() ?>'">
							<div class="socialgp"><center><i class="fa fa-google-plus" aria-hidden="true"></i></center></div>
							</div>
						</div>
					</div>
					<div id="single">
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>

									<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<div class="yazibilgi">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php the_category(', ') ?> &nbsp;&nbsp; <?php the_time('j F Y') ?>
									<div class="pull-right"><?php comments_number('Yorum Yok', '1 Yorum', '% Yorum' );?></div>
									</div>
										<?php if (of_get_option('bgm_yazicireklam') == "" ) { ?>
										<?php } else { ?>
											<div id="yazicireklam">
											<div>
											<?php echo of_get_option('bgm_yazicireklam');?>
											</div>
											<div style="clear:both;"></div>
											</div>
										<?php } ?>
									<?php echo the_content();?>
						<div id="bokunma"><?php echo getPostViews(get_the_ID()); ?></div>
									<hr>
									<span style="font-size: 12px;"><?php the_tags( 'Etiketler : ', ', ', ''); ?></span>
									<hr>
									<?php echo of_get_option('bgm_yareklam');?>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
					<div class="col-md-4 pull-left onson">
					<center><?php previous_post_link('<strong>%link</strong>'); ?></center>
					</div>
					<div class="col-md-4 pull-right onson">
					<center><?php next_post_link('<strong>%link</strong>'); ?></center>
					</div><br>
					<div style="clear:both;"></div>
					<div id="baslik">
						<h2 class="hblue singlebaslik"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Benzer Yazılar</h2>
					</div>
					<div class="row">
<?php
$categories = get_the_category($post->ID);
if ($categories) {
   $category_ids = array();
   foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
 
   $args=array(
      'category__in' => $category_ids,
      'post__not_in' => array($post->ID),
      'showposts'=>3,
      'caller_get_posts'=>1
   );
         
        $my_query = new wp_query($args);
   if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) {
         $my_query->the_post();
      ?>
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
      <?php
      }
   }
wp_reset_query();
}
?>
					</div>
					<div style="clear:both;"></div><br>
					<div id="baslik">
						<h2 class="hgreen singlebaslik"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Yorumlar</h2>
					</div>
					<?php comments_template(); ?>
				</div>
				</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>