<?php
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5,
         'tax_query' => array(
         	array(
         		'taxonomy' => "category",
         		'field' => 'name',
         		'terms' => "math",
         	)
         ),
        'order' => 'DESC',
    ];

    $blogs = new WP_Query($args);
?>
<div class="container_page container_blog">
    <div class="item list_blogs">
        <div class="title about_title">
            <span class="first-title">Blog</span>
        </div>
        <div class="border_title"></div>
        <div class="content col-sm-12">
            <?php
                while ($blogs->have_posts()) : $blogs->the_post();
            ?>
                    <a href="<?= get_the_permalink()?>">
                        <div class="col-sm-6 item-blog text-center">
                            <div class="feature-image">
                                <?= get_the_post_thumbnail()?>
                            </div>
                            <div class="create-date">
                                <span><?= get_the_date('d.m.Y')?></span>
                            </div>
                            <div class="content-blog">
                                <div class="title"><?= get_the_title()?></div>
                                <div class="des"><?= get_the_content()?></div>
                            </div>
                        </div>
                    </a>
            <?php
                endwhile;
            ?>
        </div>
    </div>
</div>
