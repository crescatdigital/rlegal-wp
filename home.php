<?php get_header(); ?>

<main class="flex-grow">

    <section class="py-16 bg-[#faf8fa]">
        <div class="mx-auto max-w-6xl px-6">

            <!-- SECTION TITLE -->
            <div class="text-center mb-16">
                <h1 class="text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-4 text-center">R-legal Insights & News</h1>
                <div class="mx-auto mt-6 h-1 w-24 rounded-full bg-[#884A83] opacity-40"></div>
            </div>

            <!-- CARDS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div class="group flex gap-0 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 bg-white border border-[#884A83]/20">

                        <!-- Left accent bar -->
                        <div class="w-2 bg-[#884A83] shrink-0 group-hover:w-3 transition-all duration-300"></div>

                        <div class="flex flex-col w-full">

                            <!-- Heading -->
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="overflow-hidden">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', array(
                                            'class' => 'w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300',
                                        )); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="flex flex-col justify-between p-6 flex-grow">
                                <div>
                                    <!-- Title -->
                                    <h3 class="text-[18px] font-bold text-[#884A83] mb-3 leading-snug">
                                        <a href="<?php the_permalink(); ?>" class="hover:underline">
                                            <?php echo wp_trim_words(get_the_title(), 5, '...'); ?>
                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="text-[14px] text-[#555] leading-relaxed">
                                        <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                    </p>
                                </div>

                                <!-- Footer: date + read more -->
                                <div class="mt-6 flex items-center justify-between">
                                    <span class="text-[12px] text-[#999]"> <?php  echo get_the_date('d M Y'); ?></span>
                                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 bg-[#884A83] text-white text-[13px] font-semibold px-4 py-2 rounded-lg hover:bg-[#6d3a69] transition-colors duration-200">
                                        Read more <span>→</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endwhile; else : ?>
                    <p class="text-[#555] col-span-3 text-center py-12">No articles found.</p>
                <?php endif; ?>

            </div>

            <!-- PAGINATION -->
            <div class="mt-12 flex justify-center py-8">
				<?php
				$links = paginate_links([
					'type'      => 'array',
					'mid_size'  => 2,
					'prev_text' => '← Previous',
					'next_text' => 'Next →',
				]);

				if ($links) :
					foreach ($links as $link) :
						$is_current = strpos($link, 'current') !== false;
						// Base classes (include spacing here ONCE)
						$classes = 'inline-flex items-center justify-center min-w-[40px] h-[40px] px-3 mx-1 rounded-md border transition-all duration-200';

						if ($is_current) {
							$classes .= ' bg-[#884A83] text-white border-[#884A83]';
						} else {
							$classes .= ' text-[#884A83] border-[#884A83]/20 hover:bg-[#884A83]/10';
						}
						echo str_replace('page-numbers', 'page-numbers ' . $classes, $link);
					endforeach;
				endif;
				?>
			</div>
        </div>
    </section>

</main>

<?php get_footer(); ?>