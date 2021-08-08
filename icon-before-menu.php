<?php
/*
 * Plugin Name:       Icon Before Menu
 * Plugin URI:        https://ongitbutnot.hit/
 * Description:       افزونه اضافه کردن آیکون به منو های بخش فهرست بالا.
 * Version:           1.0.0
 * Author:            Mehdi Bolourian
 * Author URI:        https://mehdiblr.ir/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       IBM
 * Domain Path:       /languages
 */


// Add inputs in appreance>nav-menu
add_action('wp_nav_menu_item_custom_fields', 'add_custom_menu_item', 10, 2);
function add_custom_menu_item($item_id, $item)
{
    /*
    * $item_id = (int) store the menu item ID
    * $item = (object) describe about menu
    *
    */
    $menu_item_name = 'menu_item_' . $item_id;
    $menu_item_ID = 'menu-item-' . $item_id;

    //Check and get value of selcted
    $getValue = function ($item_id, $menu_item_name) {
        if (get_post_meta($item_id, $menu_item_name)) {
            $menuValu = get_post_meta($item_id, $menu_item_name);
            return "<option value=" . $menuValu[0] . " selcted> $menuValu[0] </option>";
        } else {
            return 0;
        }
    };
?>
    <div class="sectionCustomField">
        <label for="<?php echo $menu_item_ID ?>">انتخاب آیکون</label>
        <select id="<?php echo $menu_item_ID ?>" name="<?php echo $menu_item_name ?>">
            <?php
            if ($value = $getValue($item_id, $menu_item_name)) {
                echo $value;
            }

            require 'options.php' ?>
        </select>

    </div>

<?php
}
// Save values with "wp_update_nav_menu_item" hook
add_action('wp_update_nav_menu_item', 'save_menu_item_desc', 10, 2);
function save_menu_item_desc($menu_id, $menu_item_db_id)
{
    $menuItem = $_POST["menu_item_{$menu_item_db_id}"];
    if (isset($menuItem)) {
        update_post_meta($menu_item_db_id, 'menu_item_' . $menu_item_db_id, $menuItem);
    }
}

// Edit and show icon on page before menu items
add_filter('nav_menu_item_title', 'my_nav_menu_item_title', 10, 4);
function my_nav_menu_item_title($title, $item, $args, $depth)
{

    if ($depth == 0) {
        // first level
        // global $menu_item_name;
        $menuValu = get_post_meta($item->ID, "menu_item_" . $item->ID);

        $title = '<span class="dashicons dashicons-' . $menuValu[0] . ' ">' . '</span>' . '<span>' . $title . '</span>';
    }

    return $title;
}

// Load dashicons in website pages
add_action('wp_enqueue_scripts', 'load_dashicons', 999);
function load_dashicons()
{
    wp_enqueue_style('dashicons');
}

//Add custom style in admin page
add_action('admin_enqueue_scripts', 'style_admin_icon',);
function style_admin_icon()
{
    //Custom Css
    wp_enqueue_style('icon_style', plugin_dir_url(__FILE__) . 'css/style.css',);
}

//Add custom style in website's page
add_action('wp_enqueue_scripts', 'style_main_icon',);
function style_main_icon()
{
    wp_enqueue_style('icon_main_style', plugin_dir_url(__FILE__) . 'css/style.css',);
}
