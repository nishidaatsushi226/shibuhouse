<?php get_header(); ?>
            <div id="slide">
        <div class="flexslider">
          <ul class="slides">
<?php $args = array(
     'category_name' => 'topimage',
     'posts_per_page' => 3, 
); ?>
<?php $loop = new WP_Query( $args ); ?>
  <?php if($loop -> have_posts()): ?>
  <?php while($loop -> have_posts()): $loop->the_post(); ?>

  <?php $top_images = get_post_meta($id, 'top_image', false);
          foreach($top_images as $file){
	    $top_image = wp_get_attachment_url($file);
          } ?>
  <?php $top_link = get_post_meta($id, 'top_link', true); ?>
<li><a target="_blank" href="<?php echo $top_link; ?>" ><img src="<?php echo $top_image; ?>"></a></li>
  <?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>

  
           </ul>
        </div>
      </div><!-- #slide -->
      <div id="text_information">
<?php $args = array(
     'category_name' => 'topinformation',
     'posts_per_page' => 1, 
); ?>
<?php $loop = new WP_Query( $args ); ?>
  <?php if($loop -> have_posts()): ?>
  <?php while($loop -> have_posts()): $loop->the_post(); ?>
  <?php $top_information = get_post_meta($id, 'top_information', true); ?>
  <?php echo $top_information ?>
  <?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>

      </div>
      <div id="ios_info">080-3310-4083 shibuhouseinfo@gmail.com</div>
      <div id="hot_topics">
        <div id="hot_topics_text">
          <ul>

<?php
query_posts('showposts=10&category_name=hottopics');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $hottopics_text = get_post_meta($post -> ID, 'hottopics_text', true); ?>
<?php $hottopics_link = get_post_meta($post -> ID, 'hottopics_link', true); ?>
<?php $hottopics_date = get_post_meta($post -> ID, 'hottopics_date', true); ?>
<?php $art_event_media = get_post_meta($post -> ID, 'art_event_media', true); ?>

<?php
$date = $hottopics_date;
$week = array("日", "月", "火", "水", "木", "金", "土");
$time = strtotime($date);
$w = date("w", $time);
?>

<?php
$expiration_date = $hottopics_date;
$unix_expiration = strtotime($expiration_date);
$now = strtotime('now');
 
$date_interval = round(($unix_expiration - $now) / (60*60*24));
 
if ($date_interval > 0) {
    #$date_counter = '['.$date_interval.' DAYS LATER!]';
} elseif ($date_interval == 0) {
    #$date_counter = '（TODAY!）';
} elseif ($date_interval < 1) {
    #$date_counter = '（ '.-$date_interval.' DAYS AGO!）';
} else {
    #$date_counter = '(エラー：日数計算に失敗)';
}
 
?>

<li class="topics_<?php echo $art_event_media ?>"><sep class="topics_date">

<?php if($date_interval < 7 and $date_interval > 0) { ?>
[COMING SOON!! <?php echo $date_counter ?>] 
<?php } else { ?>
<?php echo $date_counter ?>
<?php } ?>
</sep><img class="arrow" src="<?php bloginfo('template_url'); ?>/img/arrow.png"><sep class="topics_date">[<?php echo $art_event_media ?>] <a href="<?php echo $hottopics_link ?>" target="_blank"><?php echo $hottopics_date ?>（<?php echo $week[$w] ?>）<?php echo $hottopics_text ?></a></sep></li>
<?php
endwhile; else:
// No posts.
endif;
wp_reset_query();
?>
          </ul>
        </div><!-- hot_topics_text -->
      </div><!-- #hot_topics -->
      <div id="content">
        <div id="what" class="midashi">
          <div style="padding-top:28px; padding-bottom:26px;" class="inner_midashi">
            <img  style="margin-bottom:47px" src="<?php bloginfo('template_url'); ?>/img/whats_shibuhouse.png">
          <div class="midashi_text">
            <?php require 'wp-content/themes/shibuhouse/text/what.php' ?>
          </div>
          <a style="margin:0 auto; display: block;" href="./about" id="midashi_about"></a>
        <img style="margin:0 auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/hatena_midashi.png">
          <img style="margin:0 auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/about_midahsi.png">
          </div><!-- .inner_midashi -->
        </div><!-- #what -->

        <div id="bio" class="midashi">
          <div style="padding-top:28px; padding-bottom:26px;" class="inner_midashi">
            <img style="margin-bottom:47px" src="<?php bloginfo('template_url'); ?>/img/bio_midashi.png">
            <div class="midashi_text">
            <?php require 'wp-content/themes/shibuhouse/text/bio.php' ?>
            </div>
            <a href="./bio" id="bio_art"></a>
            <a href="./bio" id="bio_event"></a>
            <a href="./bio" id="bio_media"></a>
            <img style="margin:0 auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/hovers/bio_midashi.png">
            <div style="clear:both;"></div>
            <!--<img style="margin:0 auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/bio_images.png">-->
          </div><!-- .inner_midashi -->
        </div><!-- #bio -->

        <div id="member" class="midashi">
          <div style="padding-top:28px; padding-bottom:26px;" class="inner_midashi">
            <img style="margin-bottom:47px" src="<?php bloginfo('template_url'); ?>/img/member_midashi.png">
            <div class="midashi_text">
            <?php require 'wp-content/themes/shibuhouse/text/member.php' ?>
            </div>        

            <a href="./member" id="picture_member"></a>  
           <!-- <img style="margin:0 auto 30px auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/midashi_smile.png">-->
           <!-- <img style="margin:0 auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/midashi_member.png">-->
          </div><!-- .inner_midashi -->
        </div><!-- member -->

        <div id="information" class="midashi">
          <div style="padding-top:28px; padding-bottom:26px;" class="inner_midashi">
            <img style="margin-bottom:47px" src="<?php bloginfo('template_url'); ?>/img/information.png">
            <div class="midashi_text">
            <?php require 'wp-content/themes/shibuhouse/text/information.php' ?>  
            </div>          
            <img style="margin:0 auto 30px auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/midashi_mail.png">
   <!--         <p style="margin: 0 auto;
display: block;
width: 260px;
font-size: 32px;
font-family: monospace;">
------->
<div style="text-align:center; display:block; width:100%; font-size:34px;">080-3310-4083</div>
           <!--- <p style="margin:0 auto;
width: 420px;
font-size: 34px;
font-family: monospace;
display: block;">--------->
<div style="text-align:center; display:block; width:100%; font-size:34px;">
shibuhouseinfo@gmail.com</div>
            <!--<img style="margin:0 auto 16px auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/call_number.png">-->
            <!--<img style="margin:0 auto; display: block;" src="<?php bloginfo('template_url'); ?>/img/mailadd.png">-->
          </div><!-- .inner_midashi -->
        </div><!-- #information -->
      </div><!-- #content -->
    </div><!-- #wrap -->
    <?php get_footer(); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scroll_top.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
    </script>
  </body>
</html>
