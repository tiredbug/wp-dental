<?php
// Custom column Display
add_filter( 'manage_edit-wp_dental_columns', 'edit_wp_dental_columns' ) ;

function edit_wp_dental_columns( $columns ) {
    $columns = array(
        'nama' => __( 'Nama Pasien' ),
        'alamat' => __('Alamat' ),
        'telepon' => __('Telepon'),
        'edit' => __('Edit')
    );
    return $columns;
}

// What to display in each list column
add_action( 'manage_wp_dental_posts_custom_column', 'manage_wp_dental_columns', 10, 2 );

function manage_wp_dental_columns( $column, $post_id ) {

    // Get meta if exists
    $nama = get_post_meta( $post_id, '_nama', true );
    $alamat = get_post_meta( $post_id, '_alamat', true );
    $telepon = get_post_meta( $post_id, '_telepon', true );

    switch( $column ) {

        case 'nama' :
            if ( empty( $nama ) ) {
                echo __( 'Unknown' );
            } else {
                echo '<a href="'; ?> <?php the_permalink(); ?> <?php echo '">' . $nama . '</a>';
            }
            break;

        case 'alamat' :
            if ( empty( $alamat ) ) {
                echo __( 'Unknown' );
            } else {
                echo $alamat;
            }
            break;

        case 'telepon' :
            if ( empty( $telepon ) ) {
                echo __( 'Unknown' );
            } else {
                echo $telepon;
            }
            break;
        case 'edit' :
            echo '<a href="/wp-admin/post.php?post='.$post_id.'&action=edit">EDIT</a>';
            break;
    }

}

// Which columns are filterable
add_filter( 'manage_edit-wp_dental_sortable_columns', 'wp_dental_sortable_columns' );

function wp_dental_sortable_columns( $columns ) {
    $columns['nama'] = 'nama';
    $columns['alamat'] = 'alamat';
    $columns['telepon'] = 'telepon';
    return $columns;
}
?>
