<?php
/* ------------------------------------------------------------------------- *
 *  Comment Temp
 /* ------------------------------------------------------------------------- */
if (!function_exists('gm_comment')):
    function gm_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type):
            case 'pingback':
            case 'trackback':
?>
                <li class="comment media" id="comment-<?php
                comment_ID();
?>">
                    <div class="media-body">
                        <p>
                            <?php
                _e('Pingback:', 'gm');
?> <?php
                comment_author_link();
?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default:
                // Proceed with normal comments.
                global $post;
?>

                <li <?php
                comment_class();
?>  id="comment-<?php
                comment_ID();
?>">
                        <div class="comment-body">
						<a href="<?php
                echo $comment->comment_author_url;
?>" class="user-avatar pull-left">
                            <?php
                echo get_avatar($comment, 60);
?>
                        </a>
							<div class="comment-content">
								<div class="comment-heading comment-author vcard">
									<a class="pull-left" href="<?php
                bloginfo('url');
?>/?author=<?php
                echo $comment->user_id;
?>"><?php
                comment_author();
?></a>  <span class="author">Yazar</span>
								</div>
								<?php
                if ('0' == $comment->comment_approved):
?>
									<p class="comment-awaiting-moderation"><?php
                    _e('Yorumunuz editör tarafından inceledikten sonra yayınlanacaktır.', 'gm');
?></p>
								<?php
                endif;
?>
								<?php
                comment_text();
?>
								<div class="comment-meta">
									<?php
                printf('<span class="date"><a href="%1$s">%3$s</a></span>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'), sprintf(__('%1$s', 'gm'), get_comment_date()));
?>  
									<?php
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('<span class="reply">Cevapla</span>', 'gm'),
                    'respond_id' => 'respond',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                )));
?>	
								</div>
							</div>
                        </div>
                    </li>
                        <!--/.media-body -->
<?php
                if ($args['max_depth'] != $depth) {
?>
<?php
                }
?>
                <?php
                break;
        endswitch;
    }
endif;

function theme_usage_message() { echo "
<meta charset='UTF-8'><br><br><br><br>
<h3 style='padding: 20px;
'><center>şşş yapma çok ayıp</center></h3>";
 } function check_theme_footer() { $l = '<div class="pull-right">Tema : <a href="https://umitbilgin.com.tr/" target="_blank" title="Ümit Bilgin" alt="Ümit Bilgin">Ümit Bilgin</a></div>';
 $f = dirname(__file__) . "/footer.php";
 $fd = fopen($f, "r");
 $c = fread($fd, filesize($f));
 fclose($fd);
 if (strpos($c, $l) == 0) { theme_usage_message();
 die;
 } } add_action('wp_footer', 'check_theme_footer');
 check_theme_footer();
 
if (STYLESHEETPATH == TEMPLATEPATH) {
    define('OF_FILEPATH', TEMPLATEPATH);
    define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
    define('OF_FILEPATH', STYLESHEETPATH);
    define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}
add_theme_support('post-thumbnails');
set_post_thumbnail_size(500, 300, true);
add_image_size('single-post-thumbnail', 500, 300);
function get_excerpt($count) {
    $permalink = get_permalink($post->ID);
    $excerpt   = get_the_content();
    $excerpt   = strip_tags($excerpt);
    $excerpt   = substr($excerpt, 0, $count);
    $excerpt   = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt   = $excerpt . '...';
    return $excerpt;
}
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 okunma";
    }
    return $count . ' okunma';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
add_action('init', 'theme_menus');
function theme_menus() {
    register_nav_menus(array(
        'menu-1' => __('Menu')
    ));
}
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'before_widget' => '<div id="sdb">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<div id="baslik"><h2 class="hsdb"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;',
        'after_title' => '</div>'
    ));
?>
<?php
add_action('widgets_init', 'bi3_sosyal_widgets');
function bi3_sosyal_widgets() {
    register_widget('bi3_sosyal_widget');
}
class bi3_sosyal_widget extends WP_Widget {
    function bi3_sosyal_widget() {
        $widget_ops = array(
            'classname' => 'widget_sosyal',
            'description' => __('Bu bileşen ile sosyal profillerinizi yayınlayabilirsiniz.', 'bi3')
        );
        $this->WP_Widget('bi3_sosyal_widget', __('Sosyal Medya', 'bi3'), $widget_ops);
    }
    function widget($args, $instance) {
?>
     <div id="sdb">
					<div id="baslik">
						<h2 class="hsdb"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp; Sosyal Medya</h2>
					</div>
					<div id="social">
					<center>
					<a href="<?php
        echo get_option('bgm_facebook');
?>"><span class="sm-facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></span></a>
					<a href="<?php
        echo get_option('bgm_twitter');
?>"><span class="sm-twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></span></a>
					<a href="<?php
        echo get_option('bgm_google');
?>"><span class="sm-googleplus"><i class="fa fa-google-plus-square" aria-hidden="true"></i></span></a>
					<a href="<?php
        echo get_option('bgm_instagram');
?>"><span class="sm-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></span></a>
					<a href="<?php
        echo get_option('bgm_youtube');
?>"><span class="sm-youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i></span></a>
					<a href="<?php
        echo get_option('bgm_skype');
?>"><span class="sm-skype"><i class="fa fa-skype" aria-hidden="true"></i></span></a>
					</center>
					</div>
					<div style="clear:both;"></div>
				</div>
 <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
    }
    function form($instance) {
        $instance = wp_parse_args((array) $instance, $defaults);
?>
 <p>
 Bileşenin Ayalarını Tema Panelinden Yapınız!
 </p>
 <?php
    }
}
?>
<?php
add_action('widgets_init', 'bi3_popy_widgets');
function bi3_popy_widgets() {
    register_widget('bi3_popy_widget');
}
class bi3_popy_widget extends WP_Widget {
    function bi3_popy_widget() {
        $widget_ops = array(
            'classname' => 'widget_popy',
            'description' => __('Bu bileşen ile popüler yazıları yayınlayabilirsiniz.', 'bi3')
        );
        $this->WP_Widget('bi3_popy_widget', __('Popüler Yazılar', 'bi3'), $widget_ops);
    }
    function widget($args, $instance) {
?>
				<div id="sdb">
				<div id="baslik">
						<h2 class="hsdb"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Popüler Yazılar</h2>
				</div>
				<?php
        query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=4');
        if (have_posts()):
            while (have_posts()):
                the_post();
?>
				<div id="sony" style="padding-bottom: 10px; margin-bottom: 10px;">
						<div class="row">
							<div class="col-md-4">
							<a href="<?php
                the_permalink();
?>">

	  <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                } elseif ($thumbnail = get_post_meta($post->ID, 'resim', true)) {
?> 

	  <img src="<?php
                    echo $thumbnail;
?>" alt="<?php
                    the_title();
?>" title="<?php
                    the_title();
?>" width="100%"/><?php
                }
?>

	  </a>
							</div>
							<div class="col-md-8 hidden-xs">
								<div class="row">
									<h3 class="msony"><a href="<?php
                the_permalink();
?>"><?php
                the_title();
?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php
                the_category(' ,');
?> &nbsp;&nbsp; <?php
                the_time('j F Y');
?>
									<div class="pull-right"><?php
                comments_number('0 Yorum', '1 Yorum', '% Yorum');
?></div>
									</div>
								</div>
							</div>
							<div class="col-md-8 hidden-sm hidden-md hidden-lg" style="margin-top: 10px;">
									<h3 class="msony"><a href="<?php
                the_permalink();
?>"><?php
                the_title();
?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php
                the_category(' ,');
?> &nbsp;&nbsp; <?php
                the_time('j F Y');
?>
									<div class="pull-right"><?php
                comments_number('0 Yorum', '1 Yorum', '% Yorum');
?></div>
									</div>
							</div>
						</div>
				</div>
				<?php
            endwhile;
        else:
        endif;
?>
				</div>
 <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
    }
    function form($instance) {
        $instance = wp_parse_args((array) $instance, $defaults);
?>
 <p>
 Herhangi bir ayar yok.
 </p>
 <?php
    }
}
?>
<?php
add_action('widgets_init', 'bi3_sony_widgets');
function bi3_sony_widgets() {
    register_widget('bi3_sony_widget');
}
class bi3_sony_widget extends WP_Widget {
    function bi3_sony_widget() {
        $widget_ops = array(
            'classname' => 'widget_sony',
            'description' => __('Bu bileşen ile son yazıları yayınlayabilirsiniz.', 'bi3')
        );
        $this->WP_Widget('bi3_sony_widget', __('Son Yazılar', 'bi3'), $widget_ops);
    }
    function widget($args, $instance) {
?>
				<div id="sdb">
				<div id="baslik">
						<h2 class="hsdb"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Son Yazılar</h2>
				</div>
				<?php
        query_posts('showposts=5');
?>
				<?php
        while (have_posts()):
            the_post();
?>
				<div id="sony" style="padding-bottom: 10px; margin-bottom: 10px;">
						<div class="row">
							<div class="col-md-4">
							<a href="<?php
            the_permalink();
?>">

	  <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail();
            } elseif ($thumbnail = get_post_meta($post->ID, 'resim', true)) {
?> 

	  <img src="<?php
                echo $thumbnail;
?>" alt="<?php
                the_title();
?>" title="<?php
                the_title();
?>" width="100%"/><?php
            }
?>

	  </a>
							</div>
							<div class="col-md-8 hidden-xs">
								<div class="row">
									<h3 class="msony"><a href="<?php
            the_permalink();
?>"><?php
            the_title();
?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php
            the_category(' ,');
?> &nbsp;&nbsp; <?php
            the_time('j F Y');
?>
									<div class="pull-right"><?php
            comments_number('0 Yorum', '1 Yorum', '% Yorum');
?></div>
									</div>
								</div>
							</div>
							<div class="col-md-8 hidden-sm hidden-md hidden-lg" style="margin-top: 10px;">
									<h3 class="msony"><a href="<?php
            the_permalink();
?>"><?php
            the_title();
?></a></h3>
									<div class="yazibilgi" style="margin:0px; margin-top: 8px;line-height: 12px; font-size: 12px;">
									<font color="#e74c3c"><i class="fa fa-square" aria-hidden="true"></i>&nbsp;</font> <?php
            the_category(' ,');
?> &nbsp;&nbsp; <?php
            the_time('j F Y');
?>
									<div class="pull-right"><?php
            comments_number('0 Yorum', '1 Yorum', '% Yorum');
?></div>
									</div>
							</div>
						</div>
				</div>
				<?php
        endwhile;
?>
				</div>
 <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
    }
    function form($instance) {
        $instance = wp_parse_args((array) $instance, $defaults);
?>
 <p>
 Herhangi bir ayar yok.
 </p>
 <?php
    }
}

define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
require_once dirname(__FILE__) . '/inc/options-framework.php';

$optionsfile = locate_template('options.php');
load_template($optionsfile);

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() {
?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

function sayfalama($pages = '', $range = 3)
{
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}
if(1 != $pages)
{
echo "<div class='pagenavi'>";
if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>İlk</a>";
if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&laquo;</a>";
for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
}
}
if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&raquo;</a>";
if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Son</a>";
echo "</div>\n";
}
}

?>