var script = document.createElement('script');
script.src = 'script.js';
document.head.appendChild(script);
function loadPage(page) {
    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();
    
    // Define what happens on successful data submission
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Replace the content of the 'content' div with the loaded page
            document.getElementsByClassName("main-body")[0].innerHTML = this.responseText;
            // Check if the loaded page is the original page
            if (page === 'index.html') {
                // Execute your specific function for the original page
                restart();
            }
        }
    };
    
    // Set up and send the request
    xhttp.open("GET", page, true);
    xhttp.send();
}