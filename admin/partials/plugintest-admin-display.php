<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.jeffreylroberts.com
 * @since      1.0.0
 *
 * @package    Plugintest
 * @subpackage Plugintest/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1>Wordpress Plugin Test AJAX Example</h1>

<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "ajax": "/wp-admin/admin-ajax.php?action=my_action"
        });
    } );
</script>