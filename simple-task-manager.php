<?php
/**
 * Plugin Name: Simple Task Manager
 * Plugin URI: https://github.com/rookiecoder910/simple-task-manager
 * Description: A lightweight WordPress plugin to manage tasks from admin dashboard.
 * Version: 1.0.0
 * Author: Manas Kumar
 * Author URI: https://github.com/rookiecoder910
 */

if (!defined('ABSPATH')) {
    exit;
}

global $stm_db_version;
$stm_db_version = '1.0';

function stm_create_table() {
    global $wpdb;
    global $stm_db_version;

    $table_name = $wpdb->prefix . 'stm_tasks';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        task_name text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('stm_db_version', $stm_db_version);
}

register_activation_hook(__FILE__, 'stm_create_table');

add_action('admin_menu', 'stm_register_menu');

function stm_register_menu() {
    add_menu_page(
        'Task Manager',
        'Task Manager',
        'manage_options',
        'stm-task-manager',
        'stm_admin_page',
        'dashicons-list-view',
        20
    );
}

function stm_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'stm_tasks';

    // Add Task
    if (isset($_POST['stm_submit'])) {
        check_admin_referer('stm_add_task');

        $task = sanitize_text_field($_POST['task_name']);
        if (!empty($task)) {
            $wpdb->insert($table_name, ['task_name' => $task]);
        }
    }

    // Delete Task
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $wpdb->delete($table_name, ['id' => $id]);
    }

    $tasks = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");
    ?>

    <div class="wrap">
        <h1>Simple Task Manager</h1>

        <form method="post">
            <?php wp_nonce_field('stm_add_task'); ?>
            <input type="text" name="task_name" placeholder="Enter task" required>
            <input type="submit" name="stm_submit" class="button button-primary" value="Add Task">
        </form>

        <table class="widefat fixed striped" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tasks): foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo esc_html($task->task_name); ?></td>
                    <td><?php echo esc_html($task->created_at); ?></td>
                    <td>
                        <a href="?page=stm-task-manager&delete=<?php echo $task->id; ?>" class="button">Delete</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="3">No tasks found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php
}
