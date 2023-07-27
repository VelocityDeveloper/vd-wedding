<?php
// register custom post type UCAPAN
add_action('init', function () {
    register_post_type(
        'vdwedd-ucapan',
        array(
            'labels' => array(
                'name' => __('Ucapan'),
                'singular_name' => __('vdwedd-ucapan')
            ),
            'public'        => true,
            'has_archive'   => false,
            'rewrite'       => array('slug' => 'vdwedd-ucapan'),
            'show_in_rest'  => false,
            'publicly_queryable'  => false,
        )
    );
});

add_filter('manage_vdwedd-ucapan_posts_columns', function ($columns) {
    unset($columns['date']);
    $columns['alamat']  = 'Alamat';
    $columns['hubu']    = 'Hubungan';
    $columns['nohp']    = 'HP';
    $columns['email']    = 'Email';
    $columns['tgl']    = 'Tanggal';
    return $columns;
});
add_action('manage_vdwedd-ucapan_posts_custom_column', function ($column_name, $post_id) {
    if ($column_name == 'alamat') {
        echo get_post_meta($post_id, 'alamat', true);
    }
    if ($column_name == 'tgl') {
        echo get_the_date('d/m/Y H:i', $post_id);
    }
    if ($column_name == 'hubu') {
        echo get_post_meta($post_id, 'hubungan', true);
    }
    if ($column_name == 'nohp') {
        echo get_post_meta($post_id, 'nohp', true);
    }
    if ($column_name == 'email') {
        echo get_post_meta($post_id, 'email', true);
    }
}, 10, 2);

///ajax insert new ucapan
add_action('wp_ajax_nopriv_insertucapan', 'insertucapan_ajax');
add_action('wp_ajax_insertucapan', 'insertucapan_ajax');
function insertucapan_ajax()
{
    $data   = isset($_POST['data']) ? $_POST['data'] : '';
    $result = [];
    $result['success'] = false;

    if ($data && $data['vdweddsesi'] == $_SESSION['vdwedd-sesi']) {
        $my_post = array(
            'post_title'    => wp_strip_all_tags($data['nama']),
            'post_content'  => $data['ucapan'],
            'post_type'     => 'vdwedd-ucapan',
            'post_status'   => 'publish',
        );

        //meta array
        unset($data['g-recaptcha-response']);

        $my_post['meta_input'] = $data;

        // Insert the post into the database
        $newpost = wp_insert_post($my_post);
        if (!is_wp_error($newpost)) {
            $result['id']       = $newpost;
            $result['success']  = true;
            $result['message']  = 'Terima kasih ' . $data['nama'] . ' telah memberikan ucapan dan doa';

            //reset sesi
            $_SESSION['vdwedd-sesi'] = md5(uniqid());
        } else {
            $result['message']  = $newpost->get_error_message();
        }
    } else {
        $result['message']  = 'Kesalahan sesi, silahkan coba lagi';
    }

    echo json_encode($result);

    wp_die();
}
