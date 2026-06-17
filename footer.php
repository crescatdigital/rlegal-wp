<?php
/**
 * The footer for the theme
 * 
 * @package RI_Legal_Theme
 */
?>

    </main>

    <footer class="bg-[#6D3B69] pt-0 pb-8 min-h-[650px] md:min-h-[400px] box">
        <div class="mx-auto max-w-7xl px-6 h-full">
            <div class="flex flex-col items-center text-center min-h-full justify-between md:flex-row md:items-start md:justify-between md:text-left">
                
                <!-- CONTACT DETAILS -->
                <div class="text-white text-[18px] md:text-[22px] leading-relaxed pt-8 md:pt-12">
                    <p>
                        Third Floor, Linen Hall,<br>
                        162-168 Regent Street,<br>
                        London W1B 5TD
                    </p>
                    <div class="mt-4">
                        <p>+44 (0)20 7038 3980</p>
                        <p>
                            <a href="mailto:info@rlegal.com" class="hover:underline">
                                info@rlegal.com
                            </a>
                        </p>
                    </div>
                </div>

                <div class="footer-menu">
                    <div class="footer-menu-columns">

                        <!-- LEFT COLUMN -->
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/fees">Fees</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/our-people">Our People</a></li>
                            <li><a href="/services">Services</a></li>
                            <li><a href="/news">News & Insights</a></li>
                        </ul>

                        <ul>
                            <li><a href="/contact-us/">Contact Us</a></li>
                            <li><a href="/faq/">FAQs</a></li>
                            <li><a href="/how-to-instruct/">How To Instruct</a></li>
                            <li><a href="/complaints-procedure/">Complaints Procedure</a></li>
                            <li><a href="/privacy-policy/">Privacy Policy</a></li>
                            <li><a href="/equality-policy/">Equality Policy</a></li>
                            <li><a href="/sitemap/">Sitemap</a></li>
                        </ul>

                    </div>
                </div>


                <!-- SRA BADGE — dynamic Yoshki embed (clickable, always reflects current regulator status) -->
                <div class="md:mt-12 flex flex-col items-center md:items-end gap-3 text-white">
                    <div class="bg-white p-2 w-[200px] md:w-[235px]">
                        <div style="position: relative; padding-bottom: 59.1%; height: auto; overflow: hidden;">
                            <iframe frameborder="0" scrolling="no" allowtransparency="true" src="https://cdn.yoshki.com/iframe/55847r.html" title="Solicitors Regulation Authority" style="border: 0px; margin: 0px; padding: 0px; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; position: absolute;"></iframe>
                        </div>
                    </div>
                    <p class="text-[14px] md:text-[18px] leading-tight md:text-right">
                        Regulated by the SRA.<br>
                        Reg No: 00380691
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
