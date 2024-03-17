const itemHistory = document.getElementById("item-history");
const userProfile = document.getElementById("user-profile");

function loadContent(path) {
    fetch(path)
        .then(response => response.text()) // Fetch HTML content instead of JSON
        .then(html => {
            document.getElementById("content").innerHTML = html; // Insert HTML content into the content element
        })
        .catch(error => {
            console.error('Error fetching content:', error);
        });
}

itemHistory.addEventListener('click', function() {
    fetch('../actions/get_item_history.php') // Fetch JSON data
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadContent(data.redirectUrl); // Load HTML content from redirectUrl
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error fetching JSON data:', error);
        });
});

userProfile.addEventListener('click', function() {
    fetch('../actions/get_user_profile.php') // Fetch JSON data
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadContent(data.redirectUrl); // Load HTML content from redirectUrl
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error fetching JSON data:', error);
        });
});
