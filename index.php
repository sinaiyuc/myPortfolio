<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sinaiyuc_portfolio
 */

get_header(); ?>

<div id="primary" class="content-area">
	<span class='myName'>Cooper Sinai-Yunker</span>
	<span class='myDesc'>UX and Visual Designer</span>
	<?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'posts_per_page' => 100,
            'orderby'        => 'rand'
        );
        $query = new WP_Query($args);
        $featuredimage = get_field_objects();
    ?>

	<div class='container-fluid'>
    <?php if( $query->have_posts() ): ?>
        <div class='row'>
        <?php while ($query->have_posts()) : $query->the_post(); ?>

			<div class="col-lg-4 col-md-12 homepage-item project" >
				<a class='infoLink' href='<?php the_permalink() ?>'>
					<div class='contentCenter projects'>
						<?php $heroImage = get_field('hero_image') ?>
   			         	<img class='projectImage' src='<?php echo $heroImage['url'] ?>' />
						<span class='titleHome'><?php the_title() ?></span>
					</div>
				</a>
			</div>

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
        </div>
    <?php else : ?>
        Hello
    <?php endif; ?>
	</div>
</div><!-- #primary -->

<?php
get_footer();
