<section class="booking-form">
    <div class="container">
        <h2 class="title text-center"><?php _e('Request a booking', ELIXIR_TEXT_DOMAIN); ?></h2>
        <?php echo do_shortcode($booking_form_shortcode); ?>
        <a class="button" href="/request-a-booking"><?php _e('Book an appointment', ELIXIR_TEXT_DOMAIN); ?></a>
    </div>
</section>