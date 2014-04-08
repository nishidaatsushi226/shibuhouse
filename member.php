<?php
/*
Template Name: member
*/
?>
<?php get_header(); ?>



      <div id="member_profile">
      <?php
$agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($agent, 'iPhone') !== false){
   $browser = 'iphone';
}else if (strpos($agent, 'Android') !== false){
   $browser = 'Android';
}
?>

<?php if($browser == 'iphone'){ ?>
        <div id="iphone_nav" class="midashi">
	<a href="<?php site_url(); ?>/about">
	  <div id="iphone_about" class="iphone_parts">
 	    <!-- あばうとだよー -->
	    <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_about.png">
	  </div>
	</a>	
	<a href="<?php site_url(); ?>/bio">
	  <div id="iphone_bio" class="iphone_parts">
	    <!-- ばいおだよ -->
	    <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_bio.png">
	  </div>
 	</a>
	<a href="<?php site_url(); ?>/life">
	  <div id="iphone_life" class="iphone_parts">
 	    <!-- らいふだよー工事中だyとー -->
            <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_life.png">
	  </div>
	</a>
	<a href="<?php site_url(); ?>/member">
	  <div id="iphone_member" class="iphone_parts">
	    <!-- メンバーだよ＾　-->
            <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_member.png">
	  </div>
	  <div style="clear:both;">
	  </div>
	</div>
	</a>
<?php }else if($browser == 'Android'){ ?>
        <div id="iphone_nav" class="midashi">
	<a href="<?php site_url(); ?>/about">
	  <div id="iphone_about" class="iphone_parts">
 	    <!-- あばうとだよー -->
	    <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_about.png">
	  </div>
	</a>	
	<a href="<?php site_url(); ?>/bio">
	  <div id="iphone_bio" class="iphone_parts">
	    <!-- ばいおだよ -->
	    <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_bio.png">
	  </div>
 	</a>
	<a href="<?php site_url(); ?>/life">
	  <div id="iphone_life" class="iphone_parts">
 	    <!-- らいふだよー工事中だyとー -->
            <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_life.png">
	  </div>
	</a>
	<a href="<?php site_url(); ?>/member">
	  <div id="iphone_member" class="iphone_parts">
	    <!-- メンバーだよ＾　-->
            <img src="<?php bloginfo('template_url'); ?>/img/iphone/iphone_member.png">
	  </div>
	  <div style="clear:both;">
	  </div>
	</div>
	</a>


<?php }else{ ?>
<?php } ?>
        <div id="inner_member_profile">
        <?php query_posts('category_name=member&orderby=rand');
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
