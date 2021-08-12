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

if (!class_exists('menuIcon')) {
    class menuIcon
    {


        public function __construct()
        {
            add_action('wp_nav_menu_item_custom_fields', array($this, 'add_custom_menu_item'), 10, 1);
            add_action('wp_update_nav_menu_item', array($this, 'save_menu_item_desc'), 10, 2);
            add_filter('nav_menu_item_title', array($this, 'my_nav_menu_item_title'), 10, 2);
            add_action('wp_enqueue_scripts', array($this, 'load_dashicons'));
            add_action('admin_enqueue_scripts', array($this, 'style_main_icon'));
        }

        // Add inputs in appreance>nav-menu
        public function add_custom_menu_item($item_id)
        {
            $menu_item_name = 'select_menu_icon_' . $item_id;
            $menu_item_ID = 'menu-item-' . $item_id;
            $valuPostMeta = get_post_meta($item_id, "select_menu_icon_" . $item_id, true);
?>


            <div class="sectionCustomField">
                <label for="<?php echo $menu_item_ID ?>">انتخاب آیکون</label>
                <input type="input" id="<?php echo $menu_item_ID ?>" value="<?php if ($valuPostMeta) {
                                                                                echo $valuPostMeta;
                                                                            } ?>" name="<?php echo $menu_item_name ?>">
                <ul class="menuIconUlist">
                    <?php
                    $array = [
                        "menu",
                        "admin-site",
                        "dashboard",
                        "admin-media",
                        "admin-page",
                        "admin-comments",
                        "admin-appearance",
                        "admin-plugins",
                        "admin-users",
                        "admin-tools",
                        "admin-settings",
                        "admin-network",
                        "admin-generic",
                        "admin-home",
                        "admin-collapse",
                        "admin-links",
                        "format-links",
                        "admin-post",
                        "format-standard",
                        "format-image",
                        "format-gallery",
                        "format-audio",
                        "format-video",
                        "format-chat",
                        "format-status",
                        "format-aside",
                        "format-quote",
                        "welcome-write-blog",
                        "welcome-edit-page",
                        "welcome-add-page",
                        "welcome-view-site",
                        "welcome-widgets-menus",
                        "welcome-comments",
                        "welcome-learn-more",
                        "image-crop",
                        "image-rotate-left",
                        "image-rotate-right",
                        "image-flip-vertical",
                        "image-flip-horizontal",
                        "undo",
                        "redo",
                        "editor-bold",
                        "editor-italic",
                        "editor-ul",
                        "editor-ol",
                        "editor-quote",
                        "editor-alignleft",
                        "editor-aligncenter",
                        "editor-alignright",
                        "editor-insertmore",
                        "editor-spellcheck",
                        "editor-distractionfree",
                        "editor-kitchensink",
                        "editor-underline",
                        "editor-justify",
                        "editor-textcolor",
                        "editor-paste-word",
                        "editor-paste-text",
                        "editor-removeformatting",
                        "editor-video",
                        "editor-customchar",
                        "editor-outdent",
                        "editor-indent",
                        "editor-help",
                        "editor-strikethrough",
                        "editor-unlink",
                        "editor-rtl",
                        "align-left",
                        "align-right",
                        "align-center",
                        "align-none",
                        "lock",
                        "calendar",
                        "visibility",
                        "post-status",
                        "post-trash",
                        "edit",
                        "trash",
                        "arrow-up",
                        "arrow-down",
                        "arrow-left",
                        "arrow-right",
                        "arrow-up-alt",
                        "arrow-down-alt",
                        "arrow-left-alt",
                        "arrow-right-alt",
                        "arrow-up-alt2",
                        "arrow-down-alt2",
                        "arrow-left-alt2",
                        "arrow-right-alt2",
                        "leftright",
                        "sort",
                        "list-view",
                        "exerpt-view",
                        "share",
                        "share1",
                        "share-alt",
                        "share-alt2",
                        "twitter",
                        "rss",
                        "facebook",
                        "facebook-alt",
                        "networking",
                        "googleplus",
                        "hammer",
                        "art",
                        "migrate",
                        "performance",
                        "wordpress",
                        "wordpress-alt",
                        "pressthis",
                        "update",
                        "screenoptions",
                        "info",
                        "cart",
                        "feedback",
                        "cloud",
                        "translation",
                        "tag",
                        "category",
                        "yes",
                        "no",
                        "no-alt",
                        "plus",
                        "minus",
                        "dismiss",
                        "marker",
                        "star-filled",
                        "star-half",
                        "star-empty",
                        "flag",
                        "location",
                        "location-alt",
                        "camera",
                        "images-alt",
                        "images-alt2",
                        "video-alt",
                        "video-alt2",
                        "video-alt3",
                        "vault",
                        "shield",
                        "shield-alt",
                        "search",
                        "slides",
                        "analytics",
                        "chart-pie",
                        "chart-bar",
                        "chart-line",
                        "chart-area",
                        "groups",
                        "businessman",
                        "id",
                        "id-alt",
                        "products",
                        "awards",
                        "forms",
                        "portfolio",
                        "book",
                        "book-alt",
                        "download",
                        "upload",
                        "backup",
                        "lightbulb",
                        "smiley"
                    ];

                    foreach ($array as $key) {

                        echo "<li class=\"iconPicker\" menuID=\"" . $item_id . "\" name=" . $key . "> <span class=\"dashicons dashicons-" . $key . "\"></span> </li>";
                    }
                    ?>
                </ul>
            </div>

<?php
        }

        // Save values with "wp_update_nav_menu_item" hook
        public function save_menu_item_desc($menu_id, $menu_item_db_id)
        {
            $menuItem = $_POST["select_menu_icon_{$menu_item_db_id}"];
            if (isset($menuItem)) {
                update_post_meta($menu_item_db_id, 'select_menu_icon_' . $menu_item_db_id, $menuItem);
            }
        }

        // Edit and show icon on page before menu items
        public function my_nav_menu_item_title($title, $item)
        {

            // all level
            // global $menu_item_name;
            $menuValu = get_post_meta($item->ID, "select_menu_icon_" . $item->ID, true);
            if ($menuValu) {
                return '<span class="CustomMenuIcon dashicons dashicons-' . $menuValu . ' ">' . '</span>' . '<span>' . $title . '</span>';
            } else {
                return $title;
            }
        }

        //load dash icons and custom style in index
        public function load_dashicons()
        {
            wp_enqueue_style('dashicons');
            wp_enqueue_style('icon_main_style', plugin_dir_url(__FILE__) . 'css/style.css');
            wp_enqueue_script('mainCustomJs', plugin_dir_url(__FILE__) . 'js/custom.js', array('jQuery'));
        }

        public function style_main_icon()
        {
            wp_enqueue_style('icon_main_style', plugin_dir_url(__FILE__) . 'css/style.css');
            wp_enqueue_script('mainCustomJs', plugin_dir_url(__FILE__) . 'js/custom.js');
        }
    }
}


new menuIcon();



// Refrences
// https://developer.wordpress.org/reference/functions/add_action/
// https://gist.github.com/parsakafi/473c88328eb83a7c425ec3e4d7dcfef2
// https://wordpress.stackexchange.com/questions/70055/best-way-to-initiate-a-class-in-a-wp-plugin
