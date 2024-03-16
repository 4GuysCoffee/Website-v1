function submitForm() {
    // Get the user input
    userInput = document.getElementById('email').value;
    
    // Log the input
    logInput(userInput);

    // Submit the form
    document.getElementById('inputForm').submit();
}

function logInput(input) {
    // Create a new XMLHttpRequest object
    xhr = new XMLHttpRequest();

    // Specify the request type and URL for logging
    xhr.open('POST', 'logInput.php', true);

    // Set the request header
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define what happens on successful data submission
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Input logged successfully.');
        } else {
            console.log('Error logging input.');
        }
    };

    // Define what happens in case of error
    xhr.onerror = function() {
        console.log('Error logging input.');
    };

    // Convert the data to URL-encoded format
    var encodedData = 'textInput=' + encodeURIComponent(input);

    // Send the request
    xhr.send(encodedData);
}