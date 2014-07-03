<?php

// Create wp_dental post type
function register_wp_dental() {
    register_post_type( 'wp_dental',
        array(
            'labels' => array(
                'name' => __( 'Rekam Medik' ),
                'singular_name' => __( 'Pasien' ),
                'menu_name' => __( 'Rekam Medik' ),
                'all_items' => __( 'Data Pasien' ),
                'add_new' => __( 'Pasien Baru' ),
                'add_new_item' => __( 'Pasien Baru' ),
                'edit_item' => __( 'Ubah Detail' ),
                'new_item' => __( 'Pasien Baru' ),
                'view_item' => __( 'Lihat Pasien' ),
                'search_items' => __( 'Cari Pasien' ),
                'not_found' => __( 'Pasien Tidak Ditemukan' ),
                'not_found_in_trash' => __( 'Catatan Pasien Tidak Ada Di Kotak Sampah' ),
                'parent_item_colon' => __( 'Catatan Induk' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'comments', 'thumbnail'),
            'menu_icon' => 'dashicons-portfolio',
        )
    );
}

add_action( 'init', 'register_wp_dental' );

?>
