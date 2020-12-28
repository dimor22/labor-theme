
<?php

/**
 * PROJECT PUBLIC INFO META BOX
 */

$p = get_fields($post->ID);
$t = empty($p['team']) ? [] : get_fields($p['team']->ID);


?>

<table class="app-table">
    <tr>
        <td>Total Points</td>
        <td><?php echo number_format($p['project_points']);?></td>
    </tr>
    <tr>
        <td>Progress</td>
        <td><?php echo $p['project_completed'];?>%</td>
    </tr>
    <tr>
        <td>Lead Foreman</td>
        <td><?php echo $p['labor_project_lead_foreman']['display_name'];?></td>
    </tr>
    <?php if ( ! empty($t) ) : ?>
    <tr>
        <td>Team Name</td>
        <td><?php echo $p['team']->post_title;?></td>
    </tr>
    <tr>
        <td>Team members</td>
        <td>
            <ul>
                <?php
                foreach( $t['labor_select_worker'] as $worker ) : ?>
                    <li><?php echo $worker['display_name'];?></li>
                <?php endforeach;?>
            </ul>
        </td>
    </tr>
    <?php endif;?>
</table>