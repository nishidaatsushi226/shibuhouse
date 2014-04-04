

<?php
/*
Template Name: member
*/
?>

<!DOCTYPE html>
<?php $theme_root = get_theme_root() . '/shibuhouse_new_web/'; ?>
<html>

  <head>
    <title>渋家 || SHIBUHOUSE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="<?php bloginfo('stylesheet_url') ?>" rel='stylesheet' type='text/css'>  
    <!-- javascript -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
  </head>

  <body>
    <div id="wrap">
      <?php get_header(); ?>
      <div id="member_profile">
        <div id="inner_member_profile">

        <?php query_posts('category_name=member');
          if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php $member_name = get_post_meta($post -> ID, 'member_name', true); ?>
          <?php $member_pos = get_post_meta($post -> ID, 'member_pos', true); ?>
          <?php $member_text = get_post_meta($post -> ID, 'member_text', true); ?>
          <?php $member_fulls = get_post_meta($post->ID, 'member_full', false); ?>
          <?php $link_title = get_post_meta($post ->ID, 'link_title', true); ?>
          <?php $link_url = get_post_meta($post ->ID, 'link_url', true); ?>
          
          <?php foreach($member_fulls as $file){
	    $member_full = wp_get_attachment_url($file);
          } ?>
          <?php
          $member_sums = get_post_meta($post->ID, 'member_sum', false);
          foreach($member_sums as $file){
	    $member_sum = wp_get_attachment_url($file);
          } ?>
          <div class="profile">
            <img class="small_image" src="<?php echo $member_sum ?>">
            <a class="profile_name" name="<?php echo $member_name ?>
            <div class='explain'>
              <h1><?php echo $member_pos ?></h1>
              <div class='explain_text'>
	        <?php echo $member_text ?>
	        <?php
		$post_id = $post->ID;
		$link = get_post_meta($post_id,'link',true);
		?>
		</br>
 		<a href='<?php echo $link_url ?>'><?php echo $link_title; ?></a>


		</div>
	    </div>
            </div>
            " data-lightbox="roadtrip" href='<?php echo $member_full ?>' style="display:block; width:165px; height:247px; position:absolute; top:0px; left:0px;">
            <div>
              <p class="full_name"><?php echo $member_name ?></p>
            </div>
            </a>
          </div>
<?php
endwhile; else:
// No posts.
endif;
wp_reset_query();
?>
          
        </div>
      </div>
    </div><!-- #wrap -->
    <?php get_footer(); ?>
    <script type="text/javascript">
    if (navigator.userAgent.indexOf('iPhone') != -1) {
  	} else {
       $(".profile_name").hide();
      $(".profile").hover(
        function () {
          $(this).children(".profile_name").addClass( "hover" );
          $(".hover").show();
        },
        function () {
          $(".hover").hide();
          $(this).children(".profile_name").removeClass( "hover" );
          
        }
      );
  	}
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scroll_top.js"></script>
    <script type="text/javascript"src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
    </script>
  </body>
</html>
