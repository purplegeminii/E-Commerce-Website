function goToMenu(id) {
    alert("goto menu function");

    // Create a FormData object to send data in the request body
    const formData = new FormData();
    formData.append('id', id);

    // fetch api with POST method
    fetch('../actions/goto_menu_action.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        // Handle the response data as needed
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle errors
    });
}