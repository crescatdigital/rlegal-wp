<?php
/**
 * The template for displaying 404 (not found) pages.
 *
 * @package RI_Legal_Theme
 */

get_header();
?>

<main class="flex-grow">

    <section class="relative bg-white overflow-hidden">
        <div class="mx-auto max-w-[1440px] px-6 py-16 lg:py-24">
            <div class="mx-auto max-w-2xl text-center">

                <!-- 404 Number -->
                <p class="text-[120px] lg:text-[180px] font-bold leading-none text-[#884A83]">
                    404
                </p>

                <!-- Eyebrow -->
                <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                    Page Not Found
                </p>

                <!-- Heading -->
                <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-6">
                    Sorry, we couldn't find that page
                </h1>

                <!-- Body -->
                <p class="text-[16px] lg:text-[18px] text-[#333333] mb-8 leading-[1.7]">
                    The page you are looking for may have been moved, removed, renamed, or might never have existed.
                    Try one of the links below, or get in touch with our team for direct help.
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        class="inline-flex items-center gap-2 rounded-lg bg-[#884A83] px-5 py-2.5 text-[16px] lg:text-[18px] font-semibold text-white hover:bg-[#7a4275] transition">
                        Back to Homepage
                    </a>

                    <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>"
                        class="inline-flex items-center gap-2 rounded-lg bg-[#4A884F] px-5 py-2.5 text-[16px] lg:text-[18px] font-semibold text-white hover:bg-[#3d7242] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-messages-square h-4 w-4 stroke-white">
                            <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                        </svg>
                        Contact Us
                    </a>
                </div>

                <!-- Search -->
                <div class="mx-auto max-w-md">
                    <p class="text-[16px] text-[#333333] mb-3">Or try searching our site:</p>
                    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"
                        class="flex items-stretch gap-2">
                        <label for="s-404" class="sr-only">Search for:</label>
                        <input type="search" id="s-404" name="s"
                            value="<?php echo esc_attr( get_search_query() ); ?>"
                            placeholder="Search…"
                            class="flex-1 rounded-lg border border-gray-300 px-4 py-2 text-[16px] focus:border-[#884A83] focus:outline-none">
                        <button type="submit"
                            class="rounded-lg bg-[#884A83] px-5 py-2 text-[16px] font-semibold text-white hover:bg-[#7a4275] transition">
                            Search
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/callout' ); ?>
    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>
