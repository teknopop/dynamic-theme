<?php global $s; ?>
<div class="search-box">
    <form method="get" class="d-flex" id="searchform" action="<?php echo home_url() ; ?>/">
    <input type="text" value="<?php echo esc_html($s); ?>" name="s" id="s" maxlength="33" placeholder="<?php _e('Search', 'dynamic'); ?>"/>
    <button type="submit" class="btn btn-primary" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>"><span class="txt"><?php echo _e( 'Search', 'dynamic' ); ?></span></button>
    </form>
</div>
