<?php
if (!defined('ABSPATH'))
    exit;

function disable_right_click_for_wp_settings() {
    $flag = 0;
//    echo "<pre>";print_r($_POST);echo "</pre>";
    if (isset($_POST['amm_drcfw_submit_btn']) && isset($_POST['amm_drcfw_show_msg'])) {
        if (esc_html(get_option('amm_drcfw_show_msg')) === sanitize_text_field($_POST['amm_drcfw_show_msg']) || update_option('amm_drcfw_show_msg', sanitize_text_field($_POST['amm_drcfw_show_msg']))) {
            $flag = 1;
        } else {
            $flag = -1;
        }
    }

    $show_msg_on_off = esc_html(get_option('amm_drcfw_show_msg'));
    ?>
    <div class="wrap">
        <h1><?php echo AMM_DRCFW_NAME ?></h1>
        <i><?php echo AMM_DRCFW_DESC ?></i><br>
        <i style="color: red"><?php echo 'This plugin does not work when administrator or a site editor is logged in. Other than Admin or Site Editor, everyone is blocked' ?></i><br>
        
        <?php if ($flag != 0) { ?>
            <div class="error notice" style="<?php echo ($flag == -1) ? 'display:block' : 'display:none' ?>">
                <p><?php _e('There is some problem, please try again later', AMM_DRCFW_SLUG); ?></p>
            </div>
            <div class="updated notice" style="<?php echo ($flag == 1) ? 'display:block' : 'display:none' ?>">
                <p><?php _e('Settings successfully saved.', AMM_DRCFW_SLUG); ?></p>
            </div>
        <?php } ?>
        <div>
            <form method="post">
                <div>
                    <?php echo "<h2>" . __('General Settings', AMM_DRCFW_SLUG) . "</h2>"; ?>   
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row" style="padding-top: 0"><label for="amm_drcfw_show_msg"><?php _e("Show messages on Disable Events"); ?></label></th>
                                <td style="padding-top: 0">
                                    <label>
                                        <input type="radio" <?php echo ($show_msg_on_off) ? 'checked="checked"' : '' ?> value="1" name="amm_drcfw_show_msg">
                                        <abbr title="This will show default message on right click">Yes</abbr>
                                    </label>
                                    <label>
                                        <input type="radio" <?php echo ($show_msg_on_off == 0) ? 'checked="checked"' : '' ?>  value="0" name="amm_drcfw_show_msg">
                                        No
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <input name="amm_drcfw_submit_btn" type="submit" class="button button-primary" name="Submit" value="<?php _e('Save Settings', AMM_DRCFW_SLUG) ?>" />
                    </div>
                </div>
            </form>
        </div>
        
        <span style="clear: both;"></span>
    </div>
    <?php
}
?>