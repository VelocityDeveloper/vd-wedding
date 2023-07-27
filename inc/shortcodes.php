<?php
//[vdwedd]
add_shortcode('vdwedd', function ($atts) {
    ob_start();
    $atribut = shortcode_atts(array(
        'key'       => '',
        'default'   => '',
    ), $atts);
    $key        = $atribut['key'];
    $default    = $atribut['default'];

    //kepada
    if ($key == 'kepada') {
        echo isset($_GET['kepada']) ? $_GET['kepada'] : $default;
    }

    //di
    if ($key == 'di') {
        echo isset($_GET['di']) ? $_GET['di'] : $default;
    }

    return ob_get_clean();
});

//[vdwedd-form]
add_shortcode('vdwedd-form', function () {
    ob_start();
    global $post;
    $idform = uniqid();
    $kepada = isset($_GET['kepada']) ? $_GET['kepada'] : '';
    $di     = isset($_GET['di']) ? $_GET['di'] : '';
    if (!isset($_SESSION['vdwedd-sesi'])) {
        $_SESSION['vdwedd-sesi'] = md5(uniqid());
    }
?>
    <div class="vdwedd-form form-<?php echo $idform; ?>">
        <form id="form<?php echo $idform; ?>" data-id="<?php echo $idform; ?>" action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating text-secondary mb-2">
                        <input id="nama" type="text" value="<?php echo $kepada; ?>" class="form-control" name="nama" placeholder="Nama" required>
                        <label for="nama">Tulis nama lengkap anda</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating text-secondary mb-2">
                        <input id="hubungan" type="text" class="form-control" name="hubungan" placeholder="Hubungan">
                        <label for="hubungan">Hubungan anda dengan mempelai (optional)</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating text-secondary mb-2">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                        <label for="email">Tulis alamat email anda (optional)</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating text-secondary mb-2">
                        <input id="nohp" type="text" class="form-control" name="nohp" placeholder="NoHP">
                        <label for="nohp">Tulis nomor handphone anda (optional)</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating text-secondary mb-2">
                        <input id="alamat" type="text" value="<?php echo $di; ?>" class="form-control" name="alamat" placeholder="Alamat" required>
                        <label for="alamat">Tulis alamat anda</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating text-secondary mb-2">
                        <textarea id="ucapan" class="form-control" name="ucapan" style="height: 200px" placeholder="Tuliskan ucapan atau doa untuk kedua mempelai" required></textarea>
                        <label for="ucapan">Tuliskan ucapan atau doa untuk kedua mempelai</label>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <label>Apakah anda akan hadir memenuhi undangan saya?</label>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="ya" name="hadir" id="hadir1">
                                <label class="form-check-label" for="hadir1">
                                    Saya Akan hadir
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="tidak" name="hadir" id="hadir2">
                                <label class="form-check-label" for="hadir2">
                                    Mohon Maaf, belum bisa hadir
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <?php echo do_shortcode('[bws_google_captcha]'); ?>
                    <button type="submit" class="btn btn-success text-white py-3 px-4 rounded-pill">
                        KIRIM DOA DAN UCAPAN
                    </button>
                </div>
            </div>
            <input type="hidden" name="kepada" value="<?php echo $kepada; ?>">
            <input type="hidden" name="di" value="<?php echo $di; ?>">
            <input type="hidden" name="pageid" value="<?php echo $post->ID; ?>">
            <input type="hidden" name="vdweddsesi" value="<?php echo $_SESSION['vdwedd-sesi']; ?>">
        </form>
    </div>
<?php
    return ob_get_clean();
});

//[vdwedd-daftarucapan]
add_shortcode('vdwedd-daftarucapan', function () {
    ob_start();
    // The Query.
    $args = array(
        'post_type'         => 'vdwedd-ucapan',
        'posts_per_page'    => -1
    );
    $the_query = new WP_Query($args);

    echo '<div class="vdwedd-daftarucapan">';
    // The Loop.
    if ($the_query->have_posts()) {
        echo '<div class="row">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $alamat = get_post_meta(get_the_ID(), 'alamat', true);
            $haris  = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            echo '<div class="col-md-6">';
            echo '<div id="ucapan' . get_the_ID() . '" class="text-center px-md-3 pb-5">';
            echo '<a class="mb-2 d-block" href="#ucapan' . get_the_ID() . '">';
            echo '<span class="fw-bold text-uppercase">' . esc_html(get_the_title()) . '</span>';
            if ($alamat) {
                echo '<span class="mx-1">di</span>';
                echo '<span class="text-success">' . esc_html($alamat) . '</span>';
            }
            echo '</a>';
            echo '<div style="text-align: justify;">"' . esc_html(get_the_content()) . '"</div>';
            echo '<div class="fst-italic mt-3 text-start"><small> - ';
            echo $haris[get_the_date('w')] . ', ' . get_the_date('d F Y H:i') . ' WIB';
            echo '</small> </div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        esc_html_e('Sorry, no posts matched your criteria.');
    }
    echo '</div>';
    // Restore original Post Data.
    wp_reset_postdata();

    return ob_get_clean();
});
