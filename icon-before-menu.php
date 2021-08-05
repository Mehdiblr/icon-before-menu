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
?>
    <div class="sectionCustomField">
        <label for="menu-item-<?php echo $item_id ?>">آیکون مورد نظر را انتخاب کنید: </label>
        <input type="hidden" class="nav-menu-id" value="<?php echo $item_id; ?>" />
        <input type="text" class="custom-menu-item" name="<?php echo $menu_item_name ?>" id="<?php echo $menu_item_ID ?>" value="<?php if (get_post_meta($item_id,$menu_item_name)) {
            $menuValu = get_post_meta($item_id,$menu_item_name);
            echo $menuValu[0];
                                                                                                                                        
                                                                                                                                    } else {
                                                                                                                                        echo "آیکونی را انتخاب کنید";
                                                                                                                                    } ?>" />
    </div>

<?php
}

add_action('wp_update_nav_menu_item', 'save_menu_item_desc', 10, 2);
function save_menu_item_desc($menu_id, $menu_item_db_id)
{
    $menuItem = $_POST["menu_item_{$menu_item_db_id}"];
    if (isset($menuItem)) {
        update_post_meta($menu_item_db_id,'menu_item_' . $menu_item_db_id, $menuItem);
    }
}
add_filter('nav_menu_item_title', 'my_nav_menu_item_title', 10, 4);
function my_nav_menu_item_title($title, $item, $args, $depth)
{

    if ($depth == 0) {
        // first level
        // global $menu_item_name;

        // $menuItemIconPath = get_option();
        $menuValu = get_post_meta($item->ID,"menu_item_" . $item->ID);
        
        $title = $menuValu[0] . '<span>' . $title . '</span>';
    }

    return $title;
}
function load_dashicons()
{
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons',999);
add_action('admin_enqueue_scripts', 'style_admin_icon',);
function style_admin_icon()
{
    wp_enqueue_style('icon_style', plugin_dir_url(__FILE__) . 'css/style.css',);
}
add_action('wp_enqueue_scripts', 'style_main_icon',);
function style_main_icon()
{
    wp_enqueue_style('icon_main_style', plugin_dir_url(__FILE__) . 'css/style.css',);
}
