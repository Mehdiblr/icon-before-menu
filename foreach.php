<?php
$array = [
    "blank", // there is no "blank" but we need the option
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

foreach($array as $key){
    
    selected( $selected:mixed, $current:mixed, );
    echo "<option value=". $key ." > ". $key ."</option>";
}
