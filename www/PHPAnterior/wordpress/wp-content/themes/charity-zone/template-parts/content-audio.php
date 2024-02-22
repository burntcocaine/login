<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity Zone
 */

$charity_zone_post_page_title =  get_theme_mod( 'charity_zone_post_page_title', 1 );
$charity_zone_post_page_meta =  get_theme_mod( 'charity_zone_post_page_meta', 1 );
$charity_zone_post_page_cat = get_theme_mod( 'charity_zone_post_page_cat', 1 );

?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <header class="entry-header pb-3">
        <?php if ($charity_zone_post_page_title == 1 ) {?>
          <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');?>
          <hr>
        <?php }?>
        <?php if ('post' === get_post_type()) : ?>
          <?php if ($charity_zone_post_page_meta == 1 ) {?>
            <div class="entry-meta">
              <?php
              charity_zone_posted_on();
              ?>
            </div>
          <?php }?>
        <?php endif; ?>
      </header>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
      <div class="entry-summary">
        <?php
          the_excerpt();

          wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'charity-zone'),
            'after' => '</div>',
          ));
        ?>
      </div>
      <?php if ($charity_zone_post_page_cat == 1 ) {?>
        <footer class="entry-footer">
          <?php charity_zone_entry_footer(); ?>
        </footer>
      <?php }?>
    </article>
  </div>