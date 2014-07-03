<?php

function wp_dental_move_metabox() {

    global $post, $wp_meta_boxes;
    do_meta_boxes(get_current_screen(), 'advanced', $post);
    unset($wp_meta_boxes['wp_dental']['advanced']);

}

add_action('edit_form_after_title', 'wp_dental_move_metabox');

function wp_dental_move_publish_metabox(){
    remove_meta_box( 'submitdiv', 'wp_dental', 'side' ); 
    add_meta_box('submitdiv', __('Publish'), 'post_submit_meta_box', 'wp_dental', 'side', 'low');
} 

add_action('do_meta_boxes', 'wp_dental_move_publish_metabox');

function wp_dental_change_publish_button( $translation, $text ) {

    if ( 'wp_dental' == get_post_type())
      if ( $text == 'Publish' )
      return 'Input Data';

   return $translation;
}

add_filter( 'gettext', 'wp_dental_change_publish_button', 10, 2 );

function wp_dental_change_set_featured_image( $translation, $text ) {

    if ( 'wp_dental' == get_post_type())
      if ( $text == 'Set featured image' )
      return 'Sesuaikan Gambar Profil';

   return $translation;
}

add_filter( 'gettext', 'wp_dental_change_set_featured_image', 10, 2 );

function wp_dental_change_remove_featured_image( $translation, $text ) {

    if ( 'wp_dental' == get_post_type())
      if ( $text == 'Remove featured image' )
      return 'Hapus Gambar Profil';

   return $translation;
}

add_filter( 'gettext', 'wp_dental_change_remove_featured_image', 10, 2 );

function wp_dental_change_add_media_button( $translation, $text ) {

    if ( 'wp_dental' == get_post_type())
      if ( $text == 'Add Media' )
      return 'Tambahkan Media Gambar';

   return $translation;
}

add_filter( 'gettext', 'wp_dental_change_add_media_button', 10, 2 );


function wp_dental_change_default_title( $title ){ 
     $screen = get_current_screen();

     if  ( $screen->post_type == 'wp_dental' ) {
          return 'Nomer Registrasi Pasien';
     }
}

add_filter( 'enter_title_here', 'wp_dental_change_default_title' );

function wp_dental_change_featured_image( $translation, $text ) {

    if ( 'wp_dental' == get_post_type())
      if ( $text == 'Featured Image' )
      return 'Gambar Profil';

   return $translation;
}

add_filter( 'gettext', 'wp_dental_change_featured_image', 10, 2 );

function wp_dental_hide_minor_publishing() {
    $screen = get_current_screen();

    if( in_array( $screen->id, array( 'wp_dental' ) ) ) {
        echo '<style>#minor-publishing { display: none; }</style>';
    }
}

add_action( 'admin_head', 'wp_dental_hide_minor_publishing' );

function my_custom_css() {
  echo '<style>
	#dashboard_right_now a.post_type-count:before,
	#dashboard_right_now span.post_type-count:before {
  	content: "\f109";
	}
  </style>';
}

add_action('admin_head', 'my_custom_css');

function wp_dental_admin_head_stuff() {
        global $post_type;
    ?>
    <?php if (($_GET['post_type'] == 'wp_dental') || ($post_type == 'wp_dental')) : ?>
	<style>
	td.name { font-weight: bold; font-size: 14px; }
	input.krm_input {
	width: 30px;
	padding: 6px 6px;
	font-weight: bold; 
	font-size: 14px;
	text-align: center;
	}
	</style>
    <?php endif; ?>
<?php
}

add_action('admin_head', 'wp_dental_admin_head_stuff');

function wp_dental_general_setting_nama()
{
    register_setting('general', 'wp_dental_setting_nama', 'esc_attr');
    add_settings_field('wp_dental_setting_nama', '<label for="wp_dental_setting_nama">'.__('Nama Praktek' , 'wp_dental_setting_nama' ).'</label>' , 'wp_dental_general_setting_nama_html', 'general');
}
 
function wp_dental_general_setting_nama_html()
{
    $wp_dental_nama = get_option( 'wp_dental_setting_nama', '' );
    echo '<input type="text" id="wp_dental_setting_nama" name="wp_dental_setting_nama" value="' . $wp_dental_nama . '" class="regular-text" />';
}

add_filter('admin_init', 'wp_dental_general_setting_nama');

function wp_dental_general_setting_alamat()
{
    register_setting('general', 'wp_dental_setting_alamat', 'esc_attr');
    add_settings_field('wp_dental_setting_alamat', '<label for="wp_dental_setting_alamat">'.__('Alamat Praktek' , 'wp_dental_setting_alamat' ).'</label>' , 'wp_dental_general_setting_alamat_html', 'general');
}
 
function wp_dental_general_setting_alamat_html()
{
    $wp_dental_alamat = get_option( 'wp_dental_setting_alamat', '' );
    echo '<input type="text" id="wp_dental_setting_alamat" name="wp_dental_setting_alamat" value="' . $wp_dental_alamat . '" class="widefat" />';
}

add_filter('admin_init', 'wp_dental_general_setting_alamat');

function custom_glance_items( $items = array() ) {
    $post_types = array( 'wp_dental' );
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ) continue;
        $num_posts = wp_count_posts( $type );
        if( $num_posts ) {
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
                echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
            } else {
            $output = '<span>' . $text . '</span>';
                echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
            }
        }
    }
    return $items;
}

add_filter( 'dashboard_glance_items', 'custom_glance_items', 10, 1 );

?>
