<?php 
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


/*excerpt 'continue reading' link
function twentytwentychild_excerpt_more_add_continue_reading( $more ) {
    return ' ... <div class="read-more-button-wrap"><a href="' . get_permalink( get_the_ID() ) . '" class="more-link"><span class="faux-button">Continue reading</span> <span class="screen-reader-text">�' . get_the_title( get_the_ID() ) . '�</span></a></div>';
}
add_filter('excerpt_more', 'twentytwentychild_excerpt_more_add_continue_reading' );

*/


/* F�gt nach dem Auszug (Excerpt) einen Read more-Link " � weiterlesen" ein  */
function new_excerpt_more($more) {
   global $post;
      return '<div class="read-more-button-wrap"><a class="moretag" href="'. get_permalink($post->ID) . '"> ... weiterlesen</a></div>'; 
 }
 add_filter('excerpt_more', 'new_excerpt_more');
 
/* F�gt nach dem manuellen Auszug (Excerpt) einen Read more-Link " � weiterlesen" ein  */
function manual_excerpt_more( $excerpt ) {
 $excerpt_more = '';
 if( has_excerpt() ) {
     $excerpt_more = '<div class="read-more-button-wrap"><a href="' . get_permalink() . '"> ... weiterlesen</a></div>';
 }
 return $excerpt . $excerpt_more;
}
add_filter( 'get_the_excerpt', 'manual_excerpt_more' ); 


add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Sidebar rechts' ),
            'description'   => __( 'Sidebar, die rechts angezeigt werden kann.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}


?>