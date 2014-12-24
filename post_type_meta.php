<?php

// Function that adds a profil pasien meta box to 'WP Dental'
function wp_dental_profil() {
    add_meta_box( 'wp_dental_profil', 'Profil Pasien', 'wp_dental_profil_functions', 'wp_dental', 'advanced', 'high' );
}

function wp_dental_profil_functions() {

    global $post;

    wp_nonce_field( plugin_basename( __FILE__ ), 'wp_dental_profil_functions_nonce' ); 

    // If meta exists, get it
    $nama = get_post_meta($post->ID, '_nama', true);
    $jenis_kelamin = get_post_meta($post->ID, '_jenis_kelamin', true);
    $umur = get_post_meta($post->ID, '_umur', true);
    $alamat = get_post_meta($post->ID, '_alamat', true);
    $telepon = get_post_meta($post->ID, '_telepon', true);
    $pekerjaan = get_post_meta($post->ID, '_pekerjaan', true);

?>

<table class="form-table">
<tr>
<th scope="row"><label for="nama">Nama Pasien</label></th>
<td><input type="text" name="_nama" id="nama" value="<?php
        if(isset($nama)) {
            echo $nama;
        }
        ?>" class="regular-text" /></td>
</tr>
<tr>
<th scope="row"><label for="jenis_kelamin">Jenis Kelamin</label></th>

<td><label for="jenis_kelamin_laki_laki">
        <input type="radio" name="_jenis_kelamin" id="jenis_kelamin_laki_laki" value="Laki-Laki" <?php if ( isset ( $jenis_kelamin) ) checked( $jenis_kelamin, 'Laki-Laki' ); ?>>
        Laki-Laki
    </label>
    <label for="jenis_kelamin_perempuan">
        <input type="radio" name="_jenis_kelamin" id="jenis_kelamin_perempuan" value="Perempuan" <?php if ( isset ( $jenis_kelamin) ) checked( $jenis_kelamin, 'Perempuan' ); ?>>
        Perempuan
    </label></td>
</tr>
<tr>
<th scope="row"><label for="umur">Umur</label></th>
<td><input type="text" name="_umur" id="umur" value="<?php
        if(isset($umur)) {
            echo $umur;
        }
        ?>" class="small-text" /> Tahun</td>
</tr>
<tr>
<th scope="row"><label for="alamat">Alamat</label></th>
<td><input type="text" name="_alamat" id="alamat" value="<?php
        if(isset($alamat)) {
            echo $alamat;
        }
        ?>" class="widefat" /></td>
</tr>
<tr>
<th scope="row"><label for="telepon">Nomor Telepon</label></th>
<td><input type="text" name="_telepon" id="telepon" value="<?php
        if(isset($telepon)) {
            echo $telepon;
        }
        ?>" class="regular-text" /></td>
</tr>
<tr>
<th scope="row"><label for="pekerjaan">Pekerjaan</label></th>
<td><input type="text" name="_pekerjaan" id="pekerjaan" value="<?php
        if(isset($pekerjaan)) {
            echo $pekerjaan;
        }
        ?>" class="regular-text" /></td>
</tr>
</table>

<?php
}

function wp_dental_profil_save($post_id, $post) {
    global $post;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return false;

    if ( !current_user_can( 'edit_post', $post->ID ) ) {
        return $post->ID;
    }

    if (!wp_verify_nonce( $_POST['wp_dental_profil_functions_nonce'], plugin_basename( __FILE__ ) ) ) {

    } else {
        if($_POST['_nama']) {
            update_post_meta($post->ID, '_nama', $_POST['_nama']);
        } else {
            update_post_meta($post->ID, '_nama', '');
        }
        if($_POST['_jenis_kelamin']) {
            update_post_meta($post->ID, '_jenis_kelamin', $_POST['_jenis_kelamin']);
        } else {
            update_post_meta($post->ID, '_jenis_kelamin', '');
        }
        if($_POST['_umur']) {
            update_post_meta($post->ID, '_umur', $_POST['_umur']);
        } else {
            update_post_meta($post->ID, '_umur', '');
        }
        if($_POST['_alamat']) {
            update_post_meta($post->ID, '_alamat', $_POST['_alamat']);
        } else {
            update_post_meta($post->ID, '_alamat', '');
        }
        if($_POST['_telepon']) {
            update_post_meta($post->ID, '_telepon', $_POST['_telepon']);
        } else {
            update_post_meta($post->ID, '_telepon', '');
        }
        if($_POST['_pekerjaan']) {
            update_post_meta($post->ID, '_pekerjaan', $_POST['_pekerjaan']);
        } else {
            update_post_meta($post->ID, '_pekerjaan', '');
        }
    }

    return false;
}

add_action( 'admin_menu', 'wp_dental_profil' );
add_action( 'save_post', 'wp_dental_profil_save', 1, 2);

// Function that adds a keadaan umum meta box to 'WP Dental'
function wp_dental_keadaan_umum() {
    add_meta_box( 'wp_dental_keadaan_umum', 'Keadaan Umum Pasien', 'wp_dental_keadaan_umum_functions', 'wp_dental', 'advanced', 'high' );
}

function wp_dental_keadaan_umum_functions() {

    global $post;

    wp_nonce_field( plugin_basename( __FILE__ ), 'wp_dental_keadaan_umum_functions_nonce' ); 

    // If meta exists, get it
    $keluhan_utama = get_post_meta($post->ID, '_keluhan_utama', true);
    $ps_hipertensi = get_post_meta($post->ID, '_ps_hipertensi', true);
    $ps_diabetes = get_post_meta($post->ID, '_ps_diabetes', true);
    $ps_jantung = get_post_meta($post->ID, '_ps_jantung', true);
    $ps_ginjal = get_post_meta($post->ID, '_ps_ginjal', true);
    $ps_hepatitis = get_post_meta($post->ID, '_ps_hepatitis', true);
    $ps_tbc = get_post_meta($post->ID, '_ps_tbc', true);
    $ps_aids = get_post_meta($post->ID, '_ps_aids', true);
    $ps_pms = get_post_meta($post->ID, '_ps_pms', true);
    $ps_hamil = get_post_meta($post->ID, '_ps_hamil', true);
    $ps_lain_lain = get_post_meta($post->ID, '_ps_lain_lain', true);
    $alergi_obat = get_post_meta($post->ID, '_alergi_obat', true);
    $tekanan_darah = get_post_meta($post->ID, '_tekanan_darah', true);
    $denyut_nadi = get_post_meta($post->ID, '_denyut_nadi', true);
    $riwayat_cabut_gigi = get_post_meta($post->ID, '_riwayat_cabut_gigi', true);

?>

<table class="form-table">
<tr>
<th scope="row"><label for="keluhan_utama">Keluhan Utama</label></th>
<td><textarea rows="5" name="_keluhan_utama" id="keluhan_utama" class="large-text code" /><?php
        if(isset($keluhan_utama)) {
            echo $keluhan_utama;
        }
        ?></textarea></td>
</tr>
<tr>
<th scope="row"><label for="penyakit_sistemik">Penyakit Sistemik</label></th>
<td><label for="hipertensi">
        <input type="checkbox" name="_ps_hipertensi" id="ps_hipertensi" value="Hipertensi" <?php if ( isset ( $ps_hipertensi ) ) checked( $ps_hipertensi, 'Hipertensi' ); ?> />Hipertensi
    </label><br />
    <label for="diabetes">
        <input type="checkbox" name="_ps_diabetes" id="ps_diabetes" value="Diabetes" <?php if ( isset ( $ps_diabetes ) ) checked( $ps_diabetes, 'Diabetes' ); ?> />Diabetes
    </label><br />
    <label for="jantung">
        <input type="checkbox" name="_ps_jantung" id="ps_jantung" value="Jantung" <?php if ( isset ( $ps_jantung ) ) checked( $ps_jantung, 'Jantung' ); ?> />Jantung
    </label><br />
    <label for="ginjal">
        <input type="checkbox" name="_ps_ginjal" id="ps_ginjal" value="Ginjal" <?php if ( isset ( $ps_ginjal ) ) checked( $ps_ginjal, 'Ginjal' ); ?> />Ginjal
    </label><br />
    <label for="hepatitis">
        <input type="checkbox" name="_ps_hepatitis" id="ps_hepatitis" value="Hepatitis" <?php if ( isset ( $ps_hepatitis ) ) checked( $ps_hepatitis, 'Hepatitis' ); ?> />Hepatitis
    </label><br />
    <label for="tbc">
        <input type="checkbox" name="_ps_tbc" id="ps_tbc" value="TBC" <?php if ( isset ( $ps_tbc ) ) checked( $ps_tbc, 'TBC' ); ?> />TBC
    </label><br />
    <label for="aids">
        <input type="checkbox" name="_ps_aids" id="ps_aids" value="AIDS" <?php if ( isset ( $ps_aids ) ) checked( $ps_aids, 'AIDS' ); ?> />AIDS
    </label><br />
    <label for="pms">
        <input type="checkbox" name="_ps_pms" id="ps_pms" value="PMS" <?php if ( isset ( $ps_pms ) ) checked( $ps_pms, 'PMS' ); ?> />PMS
    </label><br />
    <label for="hamil">
        <input type="checkbox" name="_ps_hamil" id="ps_hamil" value="Hamil" <?php if ( isset ( $ps_hamil ) ) checked( $ps_hamil, 'Hamil' ); ?> />Hamil
    </label><br />
    <label for="etc">
        <input type="checkbox" name="_ps_lain_lain" id="ps_lain_lain" value="Lain-Lain" <?php if ( isset ( $ps_lain_lain ) ) checked( $ps_lain_lain, 'Lain-Lain' ); ?> />Lain-lain
    </label></td>
</tr>
<tr>
<th scope="row"><label for="alergi_obat">Alergi Obat</label></th>
<td><textarea rows="3" name="_alergi_obat" id="alergi_obat" class="large-text code" /><?php
        if(isset($alergi_obat)) {
            echo $alergi_obat;
        }
        ?></textarea></td>
</tr>
<tr>
<th scope="row"><label for="tekanan_darah">Tekanan Darah</label></th>
<td><input type="text" name="_tekanan_darah" id="tekanan_darah" value="<?php
        if(isset($tekanan_darah)) {
            echo $tekanan_darah;
        }
        ?>" class="small-text" /> mmHG</td>
</tr>
<tr>
<th scope="row"><label for="denyut_nadi">Denyut Nadi</label></th>
<td><input type="text" name="_denyut_nadi" id="denyut_nadi" value="<?php
        if(isset($denyut_nadi)) {
            echo $denyut_nadi;
        }
        ?>" class="small-text" /> kali per menit</td>
</tr>
<tr>
<th scope="row"><label for="riwayat_cabut_gigi">Riwayat Cabut Gigi</label></th>
<td><label for="riwayat_cabut_gigi_pernah">
        <input type="radio" name="_riwayat_cabut_gigi" id="riwayat_cabut_gigi_pernah" value="Pernah" <?php if ( isset ( $riwayat_cabut_gigi) ) checked( $riwayat_cabut_gigi, 'Pernah' ); ?>>
        Pernah
    </label>
    <label for="riwayat_cabut_gigi_tidak_pernah">
        <input type="radio" name="_riwayat_cabut_gigi" id="riwayat_cabut_gigi_tidak_pernah" value="Tidak Pernah" <?php if ( isset ( $riwayat_cabut_gigi) ) checked( $riwayat_cabut_gigi, 'Tidak Pernah' ); ?>>
        Tidak Pernah
    </label></td>
</tr>
</table>

<?php
}

function wp_dental_keadaan_umum_save($post_id, $post) {
    global $post;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return false;

    if ( !current_user_can( 'edit_post', $post->ID ) ) {
        return $post->ID;
    }

    if (!wp_verify_nonce( $_POST['wp_dental_keadaan_umum_functions_nonce'], plugin_basename( __FILE__ ) ) ) {

    } else {
        if($_POST['_keluhan_utama']) {
            update_post_meta($post->ID, '_keluhan_utama', $_POST['_keluhan_utama']);
        } else {
            update_post_meta($post->ID, '_keluhan_utama', '');
        }
        if($_POST['_ps_hipertensi']) {
            update_post_meta($post->ID, '_ps_hipertensi', $_POST['_ps_hipertensi']);
        } else {
            update_post_meta($post->ID, '_ps_hipertensi', '');
        }
        if($_POST['_ps_diabetes']) {
            update_post_meta($post->ID, '_ps_diabetes', $_POST['_ps_diabetes']);
        } else {
            update_post_meta($post->ID, '_ps_diabetes', '');
        }
        if($_POST['_ps_jantung']) {
            update_post_meta($post->ID, '_ps_jantung', $_POST['_ps_jantung']);
        } else {
            update_post_meta($post->ID, '_ps_jantung', '');
        }
        if($_POST['_ps_ginjal']) {
            update_post_meta($post->ID, '_ps_ginjal', $_POST['_ps_ginjal']);
        } else {
            update_post_meta($post->ID, '_ps_ginjal', '');
        }
        if($_POST['_ps_hepatitis']) {
            update_post_meta($post->ID, '_ps_hepatitis', $_POST['_ps_hepatitis']);
        } else {
            update_post_meta($post->ID, '_ps_hepatitis', '');
        }
        if($_POST['_ps_tbc']) {
            update_post_meta($post->ID, '_ps_tbc', $_POST['_ps_tbc']);
        } else {
            update_post_meta($post->ID, '_ps_tbc', '');
        }
        if($_POST['_ps_aids']) {
            update_post_meta($post->ID, '_ps_aids', $_POST['_ps_aids']);
        } else {
            update_post_meta($post->ID, '_ps_aids', '');
        }
        if($_POST['_ps_hamil']) {
            update_post_meta($post->ID, '_ps_hamil', $_POST['_ps_hamil']);
        } else {
            update_post_meta($post->ID, '_ps_hamil', '');
        }
        if($_POST['_ps_lain_lain']) {
            update_post_meta($post->ID, '_ps_lain_lain', $_POST['_ps_lain_lain']);
        } else {
            update_post_meta($post->ID, '_ps_lain_lain', '');
        }
        if($_POST['_alergi_obat']) {
            update_post_meta($post->ID, '_alergi_obat', $_POST['_alergi_obat']);
        } else {
            update_post_meta($post->ID, '_alergi_obat', '');
        }
        if($_POST['_tekanan_darah']) {
            update_post_meta($post->ID, '_tekanan_darah', $_POST['_tekanan_darah']);
        } else {
            update_post_meta($post->ID, '_tekanan_darah', '');
        }
        if($_POST['_denyut_nadi']) {
            update_post_meta($post->ID, '_denyut_nadi', $_POST['_denyut_nadi']);
        } else {
            update_post_meta($post->ID, '_denyut_nadi', '');
        }
        if($_POST['_riwayat_cabut_gigi']) {
            update_post_meta($post->ID, '_riwayat_cabut_gigi', $_POST['_riwayat_cabut_gigi']);
        } else {
            update_post_meta($post->ID, '_riwayat_cabut_gigi', '');
        }
    }

    return false;
}

add_action( 'admin_menu', 'wp_dental_keadaan_umum' );
add_action( 'save_post', 'wp_dental_keadaan_umum_save', 1, 2);

// Function that adds a kondisi rongga mulut meta box to 'WP Dental'
function wp_dental_kondisi_rongga_mulut() {
    add_meta_box( 'wp_dental_kondisi_rongga_mulut', 'Kondisi Rongga Mulut', 'wp_dental_kondisi_rongga_mulut_functions', 'wp_dental', 'advanced', 'high' );
}

function wp_dental_kondisi_rongga_mulut_functions() {

    global $post;

    wp_nonce_field( plugin_basename( __FILE__ ), 'wp_dental_kondisi_rongga_mulut_functions_nonce' ); 

    // If meta exists, get it
    // Gigi Dewasa
    $gg_18 = get_post_meta($post->ID, '_gg_18', true);
    $gg_17 = get_post_meta($post->ID, '_gg_17', true);
    $gg_16 = get_post_meta($post->ID, '_gg_16', true);
    $gg_15 = get_post_meta($post->ID, '_gg_15', true);
    $gg_14 = get_post_meta($post->ID, '_gg_14', true);
    $gg_13 = get_post_meta($post->ID, '_gg_13', true);
    $gg_12 = get_post_meta($post->ID, '_gg_12', true);
    $gg_11 = get_post_meta($post->ID, '_gg_11', true);

    $gg_21 = get_post_meta($post->ID, '_gg_21', true);
    $gg_22 = get_post_meta($post->ID, '_gg_22', true);
    $gg_23 = get_post_meta($post->ID, '_gg_23', true);
    $gg_24 = get_post_meta($post->ID, '_gg_24', true);
    $gg_25 = get_post_meta($post->ID, '_gg_25', true);
    $gg_26 = get_post_meta($post->ID, '_gg_26', true);
    $gg_27 = get_post_meta($post->ID, '_gg_27', true);
    $gg_28 = get_post_meta($post->ID, '_gg_28', true);

    $gg_48 = get_post_meta($post->ID, '_gg_48', true);
    $gg_47 = get_post_meta($post->ID, '_gg_47', true);
    $gg_46 = get_post_meta($post->ID, '_gg_46', true);
    $gg_45 = get_post_meta($post->ID, '_gg_45', true);
    $gg_44 = get_post_meta($post->ID, '_gg_44', true);
    $gg_43 = get_post_meta($post->ID, '_gg_43', true);
    $gg_42 = get_post_meta($post->ID, '_gg_42', true);
    $gg_41 = get_post_meta($post->ID, '_gg_41', true);

    $gg_31 = get_post_meta($post->ID, '_gg_31', true);
    $gg_32 = get_post_meta($post->ID, '_gg_32', true);
    $gg_33 = get_post_meta($post->ID, '_gg_33', true);
    $gg_34 = get_post_meta($post->ID, '_gg_34', true);
    $gg_35 = get_post_meta($post->ID, '_gg_35', true);
    $gg_36 = get_post_meta($post->ID, '_gg_36', true);
    $gg_37 = get_post_meta($post->ID, '_gg_37', true);
    $gg_38 = get_post_meta($post->ID, '_gg_38', true);

    // Gigi Anak
    $gg_55 = get_post_meta($post->ID, '_gg_55', true);
    $gg_54 = get_post_meta($post->ID, '_gg_54', true);
    $gg_53 = get_post_meta($post->ID, '_gg_53', true);
    $gg_52 = get_post_meta($post->ID, '_gg_52', true);
    $gg_51 = get_post_meta($post->ID, '_gg_51', true);

    $gg_61 = get_post_meta($post->ID, '_gg_61', true);
    $gg_62 = get_post_meta($post->ID, '_gg_62', true);
    $gg_63 = get_post_meta($post->ID, '_gg_63', true);
    $gg_64 = get_post_meta($post->ID, '_gg_64', true);
    $gg_65 = get_post_meta($post->ID, '_gg_65', true);

    $gg_85 = get_post_meta($post->ID, '_gg_85', true);
    $gg_84 = get_post_meta($post->ID, '_gg_84', true);
    $gg_83 = get_post_meta($post->ID, '_gg_83', true);
    $gg_82 = get_post_meta($post->ID, '_gg_82', true);
    $gg_81 = get_post_meta($post->ID, '_gg_81', true);

    $gg_71 = get_post_meta($post->ID, '_gg_71', true);
    $gg_72 = get_post_meta($post->ID, '_gg_72', true);
    $gg_73 = get_post_meta($post->ID, '_gg_73', true);
    $gg_74 = get_post_meta($post->ID, '_gg_74', true);
    $gg_75 = get_post_meta($post->ID, '_gg_75', true);

?>

<table class="form-table">
<tr>
<td>
<label for="gigi_dewasa"><strong>Gigi Dewasa</strong></label>
</td>
</tr>
<tr>
<td>
	<input type="text" name="_gg_18" id="gg_18" value="<?php if(isset($gg_18)) { echo $gg_18; } ?>" class="krm_input" placeholder="18" />
	<input type="text" name="_gg_17" id="gg_17" value="<?php if(isset($gg_17)) { echo $gg_17; } ?>" class="krm_input" placeholder="17" />
	<input type="text" name="_gg_16" id="gg_16" value="<?php if(isset($gg_16)) { echo $gg_16; } ?>" class="krm_input" placeholder="16" />
	<input type="text" name="_gg_15" id="gg_15" value="<?php if(isset($gg_15)) { echo $gg_15; } ?>" class="krm_input" placeholder="15" />
	<input type="text" name="_gg_14" id="gg_14" value="<?php if(isset($gg_14)) { echo $gg_14; } ?>" class="krm_input" placeholder="14" />
	<input type="text" name="_gg_13" id="gg_13" value="<?php if(isset($gg_13)) { echo $gg_13; } ?>" class="krm_input" placeholder="13" />
	<input type="text" name="_gg_12" id="gg_12" value="<?php if(isset($gg_12)) { echo $gg_12; } ?>" class="krm_input" placeholder="12" />
	<input type="text" name="_gg_11" id="gg_11" value="<?php if(isset($gg_11)) { echo $gg_11; } ?>" class="krm_input" placeholder="11" />

	<input type="text" name="_gg_21" id="gg_21" value="<?php if(isset($gg_21)) { echo $gg_21; } ?>" class="krm_input" placeholder="21" />
	<input type="text" name="_gg_22" id="gg_22" value="<?php if(isset($gg_22)) { echo $gg_22; } ?>" class="krm_input" placeholder="22" />
	<input type="text" name="_gg_23" id="gg_23" value="<?php if(isset($gg_23)) { echo $gg_23; } ?>" class="krm_input" placeholder="23" />
	<input type="text" name="_gg_24" id="gg_24" value="<?php if(isset($gg_24)) { echo $gg_24; } ?>" class="krm_input" placeholder="24" />
	<input type="text" name="_gg_25" id="gg_25" value="<?php if(isset($gg_25)) { echo $gg_25; } ?>" class="krm_input" placeholder="25" />
	<input type="text" name="_gg_26" id="gg_26" value="<?php if(isset($gg_26)) { echo $gg_26; } ?>" class="krm_input" placeholder="26" />
	<input type="text" name="_gg_27" id="gg_27" value="<?php if(isset($gg_27)) { echo $gg_27; } ?>" class="krm_input" placeholder="27" />
	<input type="text" name="_gg_28" id="gg_28" value="<?php if(isset($gg_28)) { echo $gg_28; } ?>" class="krm_input" placeholder="28" />
</td>
</tr>

<tr>
<td>
	<input type="text" name="_gg_48" id="gg_48" value="<?php if(isset($gg_48)) { echo $gg_48; } ?>" class="krm_input" placeholder="48" />
	<input type="text" name="_gg_47" id="gg_47" value="<?php if(isset($gg_47)) { echo $gg_47; } ?>" class="krm_input" placeholder="47" />
	<input type="text" name="_gg_46" id="gg_46" value="<?php if(isset($gg_46)) { echo $gg_46; } ?>" class="krm_input" placeholder="46" />
	<input type="text" name="_gg_45" id="gg_45" value="<?php if(isset($gg_45)) { echo $gg_45; } ?>" class="krm_input" placeholder="45" />
	<input type="text" name="_gg_44" id="gg_44" value="<?php if(isset($gg_44)) { echo $gg_44; } ?>" class="krm_input" placeholder="44" />
	<input type="text" name="_gg_43" id="gg_43" value="<?php if(isset($gg_43)) { echo $gg_43; } ?>" class="krm_input" placeholder="43" />
	<input type="text" name="_gg_42" id="gg_42" value="<?php if(isset($gg_42)) { echo $gg_42; } ?>" class="krm_input" placeholder="42" />
	<input type="text" name="_gg_41" id="gg_41" value="<?php if(isset($gg_41)) { echo $gg_41; } ?>" class="krm_input" placeholder="41" />

	<input type="text" name="_gg_31" id="gg_31" value="<?php if(isset($gg_31)) { echo $gg_31; } ?>" class="krm_input" placeholder="31" />
	<input type="text" name="_gg_32" id="gg_32" value="<?php if(isset($gg_32)) { echo $gg_32; } ?>" class="krm_input" placeholder="32" />
	<input type="text" name="_gg_33" id="gg_33" value="<?php if(isset($gg_33)) { echo $gg_33; } ?>" class="krm_input" placeholder="33" />
	<input type="text" name="_gg_34" id="gg_34" value="<?php if(isset($gg_34)) { echo $gg_34; } ?>" class="krm_input" placeholder="34" />
	<input type="text" name="_gg_35" id="gg_35" value="<?php if(isset($gg_35)) { echo $gg_35; } ?>" class="krm_input" placeholder="35" />
	<input type="text" name="_gg_36" id="gg_36" value="<?php if(isset($gg_36)) { echo $gg_36; } ?>" class="krm_input" placeholder="36" />
	<input type="text" name="_gg_37" id="gg_37" value="<?php if(isset($gg_37)) { echo $gg_37; } ?>" class="krm_input" placeholder="37" />
	<input type="text" name="_gg_38" id="gg_38" value="<?php if(isset($gg_38)) { echo $gg_38; } ?>" class="krm_input" placeholder="38" />
</td>
</tr>

<tr>
<td>
<label for="gigi_anak"><strong>Gigi Anak</strong></label>
</td>
</tr>
<tr>
<td>
	<input type="text" name="_gg_55" id="gg_55" value="<?php if(isset($gg_55)) { echo $gg_55; } ?>" class="krm_input" placeholder="55" />
	<input type="text" name="_gg_54" id="gg_54" value="<?php if(isset($gg_54)) { echo $gg_54; } ?>" class="krm_input" placeholder="54" />
	<input type="text" name="_gg_53" id="gg_53" value="<?php if(isset($gg_53)) { echo $gg_53; } ?>" class="krm_input" placeholder="53" />
	<input type="text" name="_gg_52" id="gg_52" value="<?php if(isset($gg_52)) { echo $gg_52; } ?>" class="krm_input" placeholder="52" />
	<input type="text" name="_gg_51" id="gg_51" value="<?php if(isset($gg_51)) { echo $gg_51; } ?>" class="krm_input" placeholder="51" />

	<input type="text" name="_gg_61" id="gg_61" value="<?php if(isset($gg_61)) { echo $gg_61; } ?>" class="krm_input" placeholder="61" />
	<input type="text" name="_gg_62" id="gg_62" value="<?php if(isset($gg_62)) { echo $gg_62; } ?>" class="krm_input" placeholder="62" />
	<input type="text" name="_gg_63" id="gg_63" value="<?php if(isset($gg_63)) { echo $gg_63; } ?>" class="krm_input" placeholder="63" />
	<input type="text" name="_gg_64" id="gg_64" value="<?php if(isset($gg_64)) { echo $gg_64; } ?>" class="krm_input" placeholder="64" />
	<input type="text" name="_gg_65" id="gg_65" value="<?php if(isset($gg_65)) { echo $gg_65; } ?>" class="krm_input" placeholder="65" />
</td>
</tr>

<tr>
<td>
	<input type="text" name="_gg_85" id="gg_85" value="<?php if(isset($gg_85)) { echo $gg_85; } ?>" class="krm_input" placeholder="85" />
	<input type="text" name="_gg_84" id="gg_84" value="<?php if(isset($gg_84)) { echo $gg_84; } ?>" class="krm_input" placeholder="84" />
	<input type="text" name="_gg_83" id="gg_83" value="<?php if(isset($gg_83)) { echo $gg_83; } ?>" class="krm_input" placeholder="83" />
	<input type="text" name="_gg_82" id="gg_82" value="<?php if(isset($gg_82)) { echo $gg_82; } ?>" class="krm_input" placeholder="82" />
	<input type="text" name="_gg_81" id="gg_81" value="<?php if(isset($gg_81)) { echo $gg_81; } ?>" class="krm_input" placeholder="81" />

	<input type="text" name="_gg_71" id="gg_71" value="<?php if(isset($gg_71)) { echo $gg_71; } ?>" class="krm_input" placeholder="71" />
	<input type="text" name="_gg_72" id="gg_72" value="<?php if(isset($gg_72)) { echo $gg_72; } ?>" class="krm_input" placeholder="72" />
	<input type="text" name="_gg_73" id="gg_73" value="<?php if(isset($gg_73)) { echo $gg_73; } ?>" class="krm_input" placeholder="73" />
	<input type="text" name="_gg_74" id="gg_74" value="<?php if(isset($gg_74)) { echo $gg_74; } ?>" class="krm_input" placeholder="74" />
	<input type="text" name="_gg_75" id="gg_75" value="<?php if(isset($gg_75)) { echo $gg_75; } ?>" class="krm_input" placeholder="75" />
</td>
</tr>

<tr>
<td>
<label for="keterangan"><strong>Keterangan</strong></label><br />
<strong>x</strong> = Dicabut <br />
<strong>m</strong> = Hilang <br />
<strong>o</strong> = Karies <br />
<strong>v</strong> = Sisa Akar <br />
<strong>t</strong> = Tambalan <br />
<strong>g</strong> = Gigi Palsu <br />
<strong>s</strong> = Gigi Goyang
</td>
</tr>

</table>

<?php
}

function wp_dental_kondisi_rongga_mulut_save($post_id, $post) {
    global $post;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return false;

    if ( !current_user_can( 'edit_post', $post->ID ) ) {
        return $post->ID;
    }

    if (!wp_verify_nonce( $_POST['wp_dental_kondisi_rongga_mulut_functions_nonce'], plugin_basename( __FILE__ ) ) ) {

    } else {

	// Gigi Dewasa
        if($_POST['_gg_18']) {
            update_post_meta($post->ID, '_gg_18', $_POST['_gg_18']);
        } else {
            update_post_meta($post->ID, '_gg_18', '');
        }
        if($_POST['_gg_17']) {
            update_post_meta($post->ID, '_gg_17', $_POST['_gg_17']);
        } else {
            update_post_meta($post->ID, '_gg_17', '');
        }
        if($_POST['_gg_16']) {
            update_post_meta($post->ID, '_gg_16', $_POST['_gg_16']);
        } else {
            update_post_meta($post->ID, '_gg_16', '');
        }
        if($_POST['_gg_15']) {
            update_post_meta($post->ID, '_gg_15', $_POST['_gg_15']);
        } else {
            update_post_meta($post->ID, '_gg_15', '');
        }
        if($_POST['_gg_14']) {
            update_post_meta($post->ID, '_gg_14', $_POST['_gg_14']);
        } else {
            update_post_meta($post->ID, '_gg_14', '');
        }
        if($_POST['_gg_13']) {
            update_post_meta($post->ID, '_gg_13', $_POST['_gg_13']);
        } else {
            update_post_meta($post->ID, '_gg_13', '');
        }
        if($_POST['_gg_12']) {
            update_post_meta($post->ID, '_gg_12', $_POST['_gg_12']);
        } else {
            update_post_meta($post->ID, '_gg_12', '');
        }
        if($_POST['_gg_11']) {
            update_post_meta($post->ID, '_gg_11', $_POST['_gg_11']);
        } else {
            update_post_meta($post->ID, '_gg_11', '');
        }
        if($_POST['_gg_21']) {
            update_post_meta($post->ID, '_gg_21', $_POST['_gg_21']);
        } else {
            update_post_meta($post->ID, '_gg_21', '');
        }
        if($_POST['_gg_22']) {
            update_post_meta($post->ID, '_gg_22', $_POST['_gg_22']);
        } else {
            update_post_meta($post->ID, '_gg_22', '');
        }
        if($_POST['_gg_23']) {
            update_post_meta($post->ID, '_gg_23', $_POST['_gg_23']);
        } else {
            update_post_meta($post->ID, '_gg_23', '');
        }
        if($_POST['_gg_24']) {
            update_post_meta($post->ID, '_gg_24', $_POST['_gg_24']);
        } else {
            update_post_meta($post->ID, '_gg_24', '');
        }
        if($_POST['_gg_25']) {
            update_post_meta($post->ID, '_gg_25', $_POST['_gg_25']);
        } else {
            update_post_meta($post->ID, '_gg_25', '');
        }
        if($_POST['_gg_26']) {
            update_post_meta($post->ID, '_gg_26', $_POST['_gg_26']);
        } else {
            update_post_meta($post->ID, '_gg_26', '');
        }
        if($_POST['_gg_27']) {
            update_post_meta($post->ID, '_gg_27', $_POST['_gg_27']);
        } else {
            update_post_meta($post->ID, '_gg_27', '');
        }
        if($_POST['_gg_28']) {
            update_post_meta($post->ID, '_gg_28', $_POST['_gg_28']);
        } else {
            update_post_meta($post->ID, '_gg_28', '');
        }
        if($_POST['_gg_48']) {
            update_post_meta($post->ID, '_gg_48', $_POST['_gg_48']);
        } else {
            update_post_meta($post->ID, '_gg_48', '');
        }
        if($_POST['_gg_47']) {
            update_post_meta($post->ID, '_gg_47', $_POST['_gg_47']);
        } else {
            update_post_meta($post->ID, '_gg_47', '');
        }
        if($_POST['_gg_46']) {
            update_post_meta($post->ID, '_gg_46', $_POST['_gg_46']);
        } else {
            update_post_meta($post->ID, '_gg_46', '');
        }
        if($_POST['_gg_45']) {
            update_post_meta($post->ID, '_gg_45', $_POST['_gg_45']);
        } else {
            update_post_meta($post->ID, '_gg_45', '');
        }
        if($_POST['_gg_44']) {
            update_post_meta($post->ID, '_gg_44', $_POST['_gg_44']);
        } else {
            update_post_meta($post->ID, '_gg_44', '');
        }
        if($_POST['_gg_43']) {
            update_post_meta($post->ID, '_gg_43', $_POST['_gg_43']);
        } else {
            update_post_meta($post->ID, '_gg_43', '');
        }
        if($_POST['_gg_42']) {
            update_post_meta($post->ID, '_gg_42', $_POST['_gg_42']);
        } else {
            update_post_meta($post->ID, '_gg_42', '');
        }
        if($_POST['_gg_41']) {
            update_post_meta($post->ID, '_gg_41', $_POST['_gg_41']);
        } else {
            update_post_meta($post->ID, '_gg_41', '');
        }
        if($_POST['_gg_31']) {
            update_post_meta($post->ID, '_gg_31', $_POST['_gg_31']);
        } else {
            update_post_meta($post->ID, '_gg_31', '');
        }
        if($_POST['_gg_32']) {
            update_post_meta($post->ID, '_gg_32', $_POST['_gg_32']);
        } else {
            update_post_meta($post->ID, '_gg_32', '');
        }
        if($_POST['_gg_33']) {
            update_post_meta($post->ID, '_gg_33', $_POST['_gg_33']);
        } else {
            update_post_meta($post->ID, '_gg_33', '');
        }
        if($_POST['_gg_34']) {
            update_post_meta($post->ID, '_gg_34', $_POST['_gg_34']);
        } else {
            update_post_meta($post->ID, '_gg_34', '');
        }
        if($_POST['_gg_35']) {
            update_post_meta($post->ID, '_gg_35', $_POST['_gg_35']);
        } else {
            update_post_meta($post->ID, '_gg_35', '');
        }
        if($_POST['_gg_36']) {
            update_post_meta($post->ID, '_gg_36', $_POST['_gg_36']);
        } else {
            update_post_meta($post->ID, '_gg_36', '');
        }
        if($_POST['_gg_37']) {
            update_post_meta($post->ID, '_gg_37', $_POST['_gg_37']);
        } else {
            update_post_meta($post->ID, '_gg_37', '');
        }
        if($_POST['_gg_38']) {
            update_post_meta($post->ID, '_gg_38', $_POST['_gg_38']);
        } else {
            update_post_meta($post->ID, '_gg_38', '');
        }

	// Gigi Anak
        if($_POST['_gg_55']) {
            update_post_meta($post->ID, '_gg_55', $_POST['_gg_55']);
        } else {
            update_post_meta($post->ID, '_gg_55', '');
        }
        if($_POST['_gg_54']) {
            update_post_meta($post->ID, '_gg_54', $_POST['_gg_54']);
        } else {
            update_post_meta($post->ID, '_gg_54', '');
        }
        if($_POST['_gg_53']) {
            update_post_meta($post->ID, '_gg_53', $_POST['_gg_53']);
        } else {
            update_post_meta($post->ID, '_gg_53', '');
        }
        if($_POST['_gg_52']) {
            update_post_meta($post->ID, '_gg_52', $_POST['_gg_52']);
        } else {
            update_post_meta($post->ID, '_gg_52', '');
        }
        if($_POST['_gg_51']) {
            update_post_meta($post->ID, '_gg_51', $_POST['_gg_51']);
        } else {
            update_post_meta($post->ID, '_gg_51', '');
        }
        if($_POST['_gg_61']) {
            update_post_meta($post->ID, '_gg_61', $_POST['_gg_61']);
        } else {
            update_post_meta($post->ID, '_gg_61', '');
        }
        if($_POST['_gg_62']) {
            update_post_meta($post->ID, '_gg_62', $_POST['_gg_62']);
        } else {
            update_post_meta($post->ID, '_gg_62', '');
        }
        if($_POST['_gg_63']) {
            update_post_meta($post->ID, '_gg_63', $_POST['_gg_63']);
        } else {
            update_post_meta($post->ID, '_gg_63', '');
        }
        if($_POST['_gg_64']) {
            update_post_meta($post->ID, '_gg_64', $_POST['_gg_64']);
        } else {
            update_post_meta($post->ID, '_gg_64', '');
        }
        if($_POST['_gg_65']) {
            update_post_meta($post->ID, '_gg_65', $_POST['_gg_65']);
        } else {
            update_post_meta($post->ID, '_gg_65', '');
        }
        if($_POST['_gg_85']) {
            update_post_meta($post->ID, '_gg_85', $_POST['_gg_85']);
        } else {
            update_post_meta($post->ID, '_gg_85', '');
        }
        if($_POST['_gg_84']) {
            update_post_meta($post->ID, '_gg_84', $_POST['_gg_84']);
        } else {
            update_post_meta($post->ID, '_gg_84', '');
        }
        if($_POST['_gg_83']) {
            update_post_meta($post->ID, '_gg_83', $_POST['_gg_83']);
        } else {
            update_post_meta($post->ID, '_gg_83', '');
        }
        if($_POST['_gg_82']) {
            update_post_meta($post->ID, '_gg_82', $_POST['_gg_82']);
        } else {
            update_post_meta($post->ID, '_gg_82', '');
        }
        if($_POST['_gg_81']) {
            update_post_meta($post->ID, '_gg_81', $_POST['_gg_81']);
        } else {
            update_post_meta($post->ID, '_gg_81', '');
        }
        if($_POST['_gg_71']) {
            update_post_meta($post->ID, '_gg_71', $_POST['_gg_71']);
        } else {
            update_post_meta($post->ID, '_gg_71', '');
        }
        if($_POST['_gg_72']) {
            update_post_meta($post->ID, '_gg_72', $_POST['_gg_72']);
        } else {
            update_post_meta($post->ID, '_gg_72', '');
        }
        if($_POST['_gg_73']) {
            update_post_meta($post->ID, '_gg_73', $_POST['_gg_73']);
        } else {
            update_post_meta($post->ID, '_gg_73', '');
        }
        if($_POST['_gg_74']) {
            update_post_meta($post->ID, '_gg_74', $_POST['_gg_74']);
        } else {
            update_post_meta($post->ID, '_gg_74', '');
        }
        if($_POST['_gg_75']) {
            update_post_meta($post->ID, '_gg_75', $_POST['_gg_75']);
        } else {
            update_post_meta($post->ID, '_gg_75', '');
        }

    }

    return false;
}

add_action( 'admin_menu', 'wp_dental_kondisi_rongga_mulut' );
add_action( 'save_post', 'wp_dental_kondisi_rongga_mulut_save', 1, 2);

?>
