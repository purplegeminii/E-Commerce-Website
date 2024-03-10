window.addEventListener('beforeunload', function (event) {
    // Use AJAX to notify the server about the user logging out
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../login/logout.php', true);
    xhr.send();
});

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

    // Add to cart button functionality
    $(".add-to-cart-button").click(function () {
        console.log("Add to cart button has been clicked");
        $(this).prop("disabled", true);
        // Get the item ID from the data attribute
        var itemId = $(this).data("itemId");

        // Send an AJAX request to add the item to the cart
        $.ajax({
            url: "../actions/add_to_cart_action.php",
            method: "GET",
            data: { item_id: itemId },
            success: function (response) {
                // Handle the response as needed
                console.log(response);
                alert("Item added to the cart!");
            },
            error: function (error) {
                // Handle errors
                console.error("Error:", error);
                alert("Error adding item to the cart. Please try again later.");
            }
        });

        $(this).prop("disabled", false);
    });
});