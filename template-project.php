<?php
/* Template Name:  Project */
?>

<?php get_header(); ?>

<div class='container-fluid projectPage'>

    <div class='heroImage'>
        <?php $heroImage = get_field('hero_image') ?>
        <img class='hero' src='<?php echo $heroImage['url'] ?>' />
    </div>

    <div class='container'>

        <h1> <?php the_field('project_title') ?> </h1>

        <h2>
            <?php $fields = get_field('project_type') ?>
            <?php if( $fields ): ?>
                <?php echo implode(' | ', $fields); ?>
            <?php endif; ?>

        </h2>

        <div class='row'>
            <div class='overview col-md-6'><?php the_field('project_overview') ?> </div>
        </div>

        <div class='basicInfo row'>
            <div class='smallInfo col-md-2'>

                <div class='timeframe'>
                    <span class='title'>Timeframe</span>
                    <span class='info'><?php the_field('timeframe') ?></span>
                </div>

                <!--Adding your roles-->
                <div class='roles'>
                    <span class='title'>Roles</span>
                <?php if( have_rows('roles') ): ?>
                    <?php while ( have_rows('roles') ) : the_row(); ?>
                        <span class='info'>
                            <?php the_sub_field('role'); ?>
                        </span>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!--// no rows found-->
                <?php endif; ?>
                </div>

                <!--Adding your skills-->
                <div class='skills'>
                    <span class='title'>Skills</span>
                <?php if( have_rows('skills') ): ?>
                    <?php while ( have_rows('skills') ) : the_row(); ?>
                        <span class='info'>
                            <?php the_sub_field('skill'); ?>
                        </span>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!--// no rows found-->
                <?php endif; ?>
                </div>


                <!--Adding your collaborators-->
                <div class='collaborators'>
                    <span class='title'>Collaborators</span>
                <?php if( have_rows('collaborators') ): ?>
                    <?php while ( have_rows('collaborators') ) : the_row(); ?>
                        <span class='info'>
                            <a href="<?php the_sub_field('their_site'); ?>"><?php the_sub_field('person'); ?></a>
                        </span>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!--// no rows found-->
                <?php endif; ?>
                </div>
            </div>
            <div class='col-md-1'></div>
            <div class='largeInfo col-md-6'>
                <div class='problem'>
                    <span class='title'>Problem</span>
                    <span class='info'><?php the_field('problem') ?></span>
                </div>
                <div class='goal'>
                    <span class='title'>Goal</span>
                    <span class='info'><?php the_field('goal') ?></span>
                </div>
                <div class='solution'>
                    <span class='title'>Solution</span>
                    <span class='info'><?php the_field('solution') ?></span>
                </div>
            </div>
        </div>
    </div>


    <!-- Sections -->
    <div class='section'>
    <?php if( have_rows('sections') ): ?>
        <?php while ( have_rows('sections') ) : the_row(); ?>
            <?php if( get_row_layout() == 'section' ): ?>

                <div class='container'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <span class='sectionTitle'><?php the_sub_field('section_title') ?></span>
                        </div>
                    </div>
                </div>

                <!-- BEGIN INDIVIDUAL SECTION -->
                <?php if( have_rows('section_fields') ): ?>
                    <?php while ( have_rows('section_fields') ) : the_row(); ?>
                        <?php if( get_row_layout() == 'text_block' ): ?>

                            <div class='container'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <span class='textBlock'><?php the_sub_field('text_block') ?>
                                    </div>
                                </div>
                            </div>


                        <?php elseif( get_row_layout() == 'image' ): ?>
                            <div class='container'>
                                    <img class='image' src='<?php echo the_sub_field('image') ?>' />
                            </div>

                        <?php elseif( get_row_layout() == 'quote' ): ?>
                            <div class='container-fluid'>
                                <div class='row quoteRow'>
                                        <span class='quote'><?php the_sub_field('quote') ?></span>
                                </div>
                            </div>

                        <?php elseif( get_row_layout() == 'subhead' ): ?>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <span class='subhead'><?php the_sub_field('subhead') ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php elseif( get_row_layout() == 'subhead' ): ?>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <span class='subhead'><?php the_sub_field('subhead') ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                <!-- nothing found -->
                <?php endif; ?>


            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
       <!-- nothing found -->
    <?php endif; ?>
    </div>


</div>

<?php get_footer(); ?>
