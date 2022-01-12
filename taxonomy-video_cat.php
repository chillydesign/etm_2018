<?php get_header(); ?>

<main role="main">
    <!-- section -->
    <section class="pagetitle">
        <div class="wrapper">

            <h1><?php single_cat_title() ?></h1>

        </div>
    </section>

    <?php if (have_posts()) : ?>


        <section class="video">
            <div class="wrapper">
                <div class="row">
                    <?php $i = 1; ?>
                    <?php while (have_posts()) : the_post();  ?>
                        <?php $post_id = get_the_ID(); ?>
                        <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>

                        <div class="col-sm-6" style="margin-bottom:40px;">
                            <?php the_content(); ?>
                            <h5><?php the_title(); ?></h5>
                        </div>
                        <?php if ($i % 2 == 0) { ?>
                </div>
                <div class="row"> <?php } ?>
                <?php $i++; ?>
            <?php endwhile; ?>
                </div>
        </section>



        <?php get_template_part('pagination'); ?>
    <?php endif; ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>