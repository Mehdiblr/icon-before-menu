jQuery(document).ready(function() {
    jQuery("li.iconPicker").on("click", function() {
        var itemSelected = jQuery(this).attr("name");
        var menuId = jQuery(this).attr("menuid");
        var menuIdFullName = "input#select_IBM_" + menuId;
        jQuery(menuIdFullName).val(itemSelected);
    });
    jQuery("li.iconPicker").on("click", function() {
        var iconSelected = jQuery(this).attr("name");
        // console.log(itemSelected)
        var menuId = jQuery(this).attr("menuid");
        // console.log("#currentIcon"+menuId)
        jQuery("#currentIcon"+menuId).removeClass().addClass("dashicons dashicons-"+iconSelected);;
    });
});