<?php
/**
 * Swagger Theme Functions
 *
 * @author Jeremy Davis
 * @package WordPress
 */

/**
 * Maximum allowed width of content within the theme.
 */
if (!isset($content_width)) {
    $content_width = 980;
}

/**
 * Setup Theme Functions
 *
 */
if (!function_exists('swag_theme_setup')):
    function swag_theme_setup() {

        //load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ));

        register_nav_menus(
            array(
                'main-menu' => __('Main Menu', 'swag'),
            ));
        // load custom walker menu class file
        require 'incl/class-swag_walker_nav_menu.php';
    }
endif;
add_action('after_setup_theme', 'swag_theme_setup');

/**
 * Define post thumbnail size.
 * Add two additional image sizes.
 *
 */
function swag_images() {

    set_post_thumbnail_size(260, 180); // 260px wide x 180px high
    add_image_size('swag-small', 300, 200); // 300px wide x 200px high
    add_image_size('swag-medium', 360, 270); // 360px wide by 270px high
}

/**
 * Load CSS styles for theme.
 *
 */
function swag_styles_loader() {

    wp_enqueue_style('swag-style', get_template_directory_uri() . '/assets/css/base.css', false, '1.0', 'all');
    wp_enqueue_style('swag-sections', get_template_directory_uri() . '/assets/css/sections.css', false, '1.0', 'all');
    wp_enqueue_style('revo-slider', get_template_directory_uri() . '/assets/revslider/rs-plugin/css/settings.css', false, '1.0', 'all');
    wp_enqueue_style('swag-default', get_stylesheet_uri());
    
}
add_action('wp_enqueue_scripts', 'swag_styles_loader');

/**
 * Load JavaScript and jQuery files for theme.
 *
 */
function swag_scripts_loader() {

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');

    }

    // DE-REGISTER JQUERY AND RE REGISTER THE NEWEST VERSION
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, true);
    wp_enqueue_script('jquery');
    
    //The loader script that loads the ajax loader gif until the window graphics are loaded.
    wp_enqueue_script('loader-js', get_template_directory_uri() . '/assets/js/loader.js', array('jquery'), '1', true);


    // Enqueue the modernizr script file and specify that it should be placed in the <head>
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), '2.5.2', false);

    //Google maps
    wp_enqueue_script('maps-lib', 'http://maps.google.com/maps/api/js?sensor=false',array('jquery'),'1',true);
    wp_enqueue_script('maps-scripts', get_template_directory_uri() . '/assets/js/jquery.gmap.min.js',array('jquery'), '1',true);

    wp_enqueue_script('kenburn-slider', get_template_directory_uri() . '/assets/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js', array('jquery'), '1',true);
    wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.pack.js', array('jquery'), '1',true);
    wp_enqueue_script('swag-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1', true);
    wp_enqueue_script('swag-screen', get_template_directory_uri() . '/assets/js/screen.js', array('jquery'), '1', true);
    
}
add_action('wp_enqueue_scripts', 'swag_scripts_loader');

/**
 * Define theme's widget areas.
 *
 */
function swag_widgets_init() {

    register_sidebar(
        array(
            'name'          => __('Page Sidebar', 'swag'),
            'id'            => 'sidebar-page',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Posts Sidebar', 'swag'),
            'id'            => 'sidebar-posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Home Left', 'swag'),
            'id'            => 'home-left',
            'description'   => __('Left textbox on homepage', 'swag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        )
    );

    register_sidebar(
        array(
            'name'          => __('Home Middle', 'swag'),
            'id'            => 'home-middle',
            'description'   => __('Middle textbox on homepage', 'swag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        )
    );

    register_sidebar(
        array(
            'name'          => __('Home Right', 'swag'),
            'id'            => 'home-right',
            'description'   => __('Right textbox on homepage', 'swag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Content', 'swag'),
            'id'            => 'footer-content',
            'description'   => __('Footer text or acknowledgements', 'swag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        )
    );

}
add_action('init', 'swag_widgets_init');


/**
 * Display page next/previous navigation links.
 *
 */
if (!function_exists('swag_content_nav')):
    function swag_content_nav($nav_id) {

        global $wp_query, $post;

        if ($wp_query->max_num_pages > 1) : ?>

        <nav id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
            <h3 class="assistive-text"><?php _e('Post navigation', 'swag'); ?></h3>
            <div class="nav-previous alignleft"><?php next_posts_link(
                __('<span class="meta-nav">&larr;</span> Older posts', 'swag')
            ); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link(
                __('Newer posts <span class="meta-nav">&rarr;</span>', 'swag')
            ); ?></div>
        </nav><!-- #<?php echo $nav_id; ?> .navigation -->

        <?php endif;
    }
endif;

/**
 * Display template for comments and pingbacks.
 *
 */
if (!function_exists('swag_comment')) :
    function swag_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' : ?>

                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                            <?php _e('Pingback:', 'swag'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post; ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                        <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                            <?php echo get_avatar($comment, 64); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading comment-author vcard">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Post author',
                                        'swag'
                                    ) . '</span> ' : ''); ?>
                            </h4>

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e(
                                    'Your comment is awaiting moderation.',
                                    'swag'
                                ); ?></p>
                            <?php endif; ?>

                            <?php comment_text(); ?>
                            <p class="meta">
                                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            sprintf(
                                                __('%1$s at %2$s', 'swag'),
                                                get_comment_date(),
                                                get_comment_time()
                                            )
                                        ); ?>
                            </p>
                            <p class="reply">
                                <?php comment_reply_link( array_merge($args, array(
                                            'reply_text' => __('Reply <span>&darr;</span>', 'swag'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                        )
                                    )); ?>
                            </p>
                        </div>
                        <!--/.media-body -->
                <?php
                break;
        endswitch;
    }
endif;


/**
 * Display template for post meta information.
 *
 */
if (!function_exists('swag_posted_on')) :
    function swag_posted_on()
    {
        printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>','swag'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'swag'), get_the_author())),
            esc_html(get_the_author())
        );
    }
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 */
function swag_body_classes($classes)
{
    if (!is_multi_author()) {
        $classes[] = 'single-author';
    }
    return $classes;
}
add_filter('body_class', 'swag_body_classes');


/**
 * Add post ID attribute to image attachment pages prev/next navigation.
 *
 */
function swag_enhanced_image_navigation($url)
{
    global $post;
    if (wp_attachment_is_image($post->ID)) {
        $url = $url . '#main';
    }
    return $url;
}
add_filter('attachment_link', 'swag_enhanced_image_navigation');


/**
 * Checks if a post thumbnails is already defined.
 *
 */
function swag_is_post_thumbnail_set()
{
    global $post;
    if (get_the_post_thumbnail()) {
        return true;
    } else {
        return false;
    }
}


/**
 * Set post thumbnail as first image from post, if not already defined.
 *
 */
function swag_autoset_featured_img()
{
    global $post;

    $post_thumbnail = swag_is_post_thumbnail_set();
    if ($post_thumbnail == true) {
        return get_the_post_thumbnail();
    }
    $image_args     = array(
        'post_type'      => 'attachment',
        'numberposts'    => 1,
        'post_mime_type' => 'image',
        'post_parent'    => $post->ID,
        'order'          => 'desc'
    );
    $attached_images = get_children($image_args, ARRAY_A);
    $first_image = reset($attached_images);
    if (!$first_image) {
        return false;
    }

    return get_the_post_thumbnail($post->ID, $first_image['ID']);

}


/**
 * Define default page titles.
 *
 */
function swag_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed()) {
        return $title;
    }
    // Add the site name.
    $title .= get_bloginfo('name');
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'swag'), max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'swag_wp_title', 10, 2);

/**
 * Display template for breadcrumbs.
 *
 */
function swag_breadcrumbs()
{
    $home      = 'Home'; // text for the 'Home' link
    $before    = '<li class="active">'; // tag before the current crumb
    $sep       = '<span class="divider">/</span>';
    $after     = '</li>'; // tag after the current crumb

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<ul class="breadcrumb">';

        global $post;
        $homeLink = home_url();
            echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
            if (is_category()) {
                global $wp_query;
                $cat_obj   = $wp_query->get_queried_object();
                $thisCat   = $cat_obj->term_id;
                $thisCat   = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($parentCat, true, $sep);
                }
                echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
            } elseif (is_day()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                    'F'
                ) . '</a></li> ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug      = $post_type->rewrite;
                    echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>'.$sep.'</li> ';
                    echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                    echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat    = get_the_category($parent->ID);
                $cat    = $cat[0];
                echo get_category_parents($cat, true, $sep);
                echo '<li><a href="' . get_permalink(
                    $parent
                ) . '">' . $parent->post_title . '</a></li> ';
                echo $before . get_the_title() . $after;

            } elseif (is_page() && !$post->post_parent) {
                echo $before . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id   = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page          = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
                        $page->ID
                    ) . '</a>' . $sep . '</li>';
                    $parent_id     = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) {
                    echo $crumb;
                }
                echo $before . get_the_title() . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_tag()) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . 'Error 404' . $after;
            }
            // if (get_query_var('paged')) {
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ' (';
            //     }
            //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ')';
            //     }
            // }

        echo '</ul>';

    }
}

/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a bootstrap.
 */
add_filter('show_admin_bar', '__return_false');
