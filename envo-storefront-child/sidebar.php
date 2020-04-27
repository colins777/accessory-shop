<!--
<?php /*  if (! is_front_page() || ! is_page('72') && is_active_sidebar('envo-storefront-right-sidebar'))  : */?>

                <aside id="sidebar" class="col-md-3">
            <?php /*dynamic_sidebar('envo-storefront-right-sidebar'); */?>
        </aside>
--><?php /*endif;*/?>


<?php if (is_active_sidebar('envo-storefront-right-sidebar')) { ?>

    <aside id="sidebar" class="col-md-3">
        <?php dynamic_sidebar('envo-storefront-right-sidebar'); ?>
    </aside>
<?php } ?>










