jQuery(document).ready(function() {
    jQuery("li.iconPicker").on("click", function() {
        var itemSelected = jQuery(this).attr("name");
        var menuId = jQuery(this).attr("menuid");
        var menuIdFullName = "input#select_IBM_" + menuId;
        console.log(itemSelected);
        jQuery(menuIdFullName).val(itemSelected);
    });

});