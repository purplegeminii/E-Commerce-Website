$(document).ready(function() {
    // Show menu items of default category (meals)
    $(".menu-item[data-category='meals']").show();

    // Hide all menu items initially
    $(".menu-item").not("[data-category='meals']").hide();

    // Show menu items based on selected category
    $(".category-button").click(function() {
        var category = $(this).data("category");
        $(".menu-item").hide(); // Hide all menu items
        $(".menu-item[data-category='" + category + "']").show(); // Show menu items of selected category
    });

    // Order button functionality
    $(".order-button").click(function() {
        var itemName = $(this).closest(".menu-item").find(".menu-item-name").text();
        alert("You have ordered " + itemName + "!");
    });
});