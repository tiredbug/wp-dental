<?php

/**
 * Add the title to our admin area, for editing, etc
 */
function pmg_comment_tut_add_meta_box()
{
    add_meta_box( 'pmg-comment-title', __( 'Diagnosa dan Tarif' ), 'pmg_comment_tut_meta_box_cb', 'comment', 'normal', 'high' );
}

function pmg_comment_tut_meta_box_cb( $comment )
{
    $diagnosa = get_comment_meta( $comment->comment_ID, '_diagnosa', true );
    $terapi = get_comment_meta( $comment->comment_ID, '_terapi', true );
    wp_nonce_field( 'pmg_comment_update', 'pmg_comment_update', false );
    ?>

<table class="form-table editcomment">
<tbody>
<tr>
	<td class="diagnosa">Diagnosa :</td>
	<td><input type="text" name="_diagnosa" value="<?php echo esc_attr( $diagnosa ); ?>" class="widefat" /></td>
</tr>
<tr>
	<td class="tarif">Terapi :</td>
	<td><input type="text" name="_terapi" value="<?php echo esc_attr( $terapi ); ?>" class="widefat" /></td>
</tr>
</tbody>
</table>

    <?php
}

add_action( 'add_meta_boxes_comment', 'pmg_comment_tut_add_meta_box' );

/**
 * Save our comment (from the admin area)
 */
function pmg_comment_tut_edit_comment( $comment_id )
{
    if( ! isset( $_POST['pmg_comment_update'] ) || ! wp_verify_nonce( $_POST['pmg_comment_update'], 'pmg_comment_update' ) ) return;
    if( isset( $_POST['_diagnosa'] ) )
        update_comment_meta( $comment_id, '_diagnosa', esc_attr( $_POST['_diagnosa'] ) );
    if( isset( $_POST['_terapi'] ) )
        update_comment_meta( $comment_id, '_terapi', esc_attr( $_POST['_terapi'] ) );
}

add_action( 'edit_comment', 'pmg_comment_tut_edit_comment' );

/**
 * Save our title (from the front end)
 */
function pmg_comment_tut_insert_comment( $comment_id )
{
    if( isset( $_POST['_diagnosa'] ) )
        update_comment_meta( $comment_id, '_diagnosa', esc_attr( $_POST['_diagnosa'] ) );
    if( isset( $_POST['_terapi'] ) )
        update_comment_meta( $comment_id, '_terapi', esc_attr( $_POST['_terapi'] ) );
}

add_action( 'comment_post', 'pmg_comment_tut_insert_comment', 10, 1 );

?>
