
<div class="card">
    <p>List of Daily Foreman Reports Here.</p>

    <?php
    $reports = new WP_Query(array(
	    'post_type' => 'daily-reports'
    ));

    while ( $reports->have_posts() ) {
        $reports->the_post();
        echo the_content();
    }
    wp_reset_postdata();
    //    $reports = [];
//
//    foreach ( $posts as $post ) {
//
//	    $reports[] = get_post_meta($post, 'daily_report_form');
//
//    }

    //var_dump($posts);
    ?>
</div>