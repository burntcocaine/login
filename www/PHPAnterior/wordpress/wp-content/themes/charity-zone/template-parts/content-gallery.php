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

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <header class="entry-header">
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
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
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