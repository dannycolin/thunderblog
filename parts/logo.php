<?php
/**
 * Displays the linked logo brand.
 *
 * @package WordPress
 * @subpackage Thunderblog
 * @since 0.0.1
 */

?>
<a class="logo" href="<?= site_url() ?>">
	<img src="<?= esc_url(get_template_directory_uri()); ?>/assets/thunderbird_logo.svg" alt="Logo" />
</a>
