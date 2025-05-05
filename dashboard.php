<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html"); // Redirect to sign-in if not logged in
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ELLABLINGS User Dashboard</title>
  <link rel="stylesheet" href="style.css"> <style>
       
    </style>
</head>
<body>
<header>
        <div class="header">
            <img class="logoimg" src="WhatsApp Image 2025-05-04 at 00.25.43.jpeg" alt="logo">
            <h3 class="logo">ELLABLINGS</h3>
            <a class="fash" href="fashion.html">FASHION BLOG</a>
            <a href="cloth.html">CLOTH</a>
            <input class="srch" type="search" placeholder="Search your favourite....">
            <a href="rings.html">RINGS</a>
            <a href="watches.html">WATCHES</a>
            <p><a href="logout.php">Sign Out</a></p>
        </div>
    </header>
    <div id="search-results">
        <ul></ul>
        <p class="no-results" style="display: none;">No results found</p>
    </div>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>

        <div class="neon-welcome-container">
            <p class="neon-welcome-text">WELCOME TO ELLABLINGS. WHERE EVERY PIECE OF JEWELRY FIT FOR ROYALTY</p>
        </div>

        <p>This is your personalized dashboard.</p>
    </div>
    <div id="floating-whatsapp">
                <a href="form.html" target="_blank">
                    <img src="whatapp icon.jpg" alt="WhatsApp Contact Form">
                </a>
            </div>
    <div class="product-items">
    <div class="product" data-name="JEWELRY" data-url="product_details.html?product=smart_homes">
            <img src="ring.jpeg" alt="JEWELRY">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="HAND CHAINS" data-url="product_details.html?product=extra_power">
            <img src="ring.jpeg" alt="extra-power">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="LEG CHAINS" data-url="product_details.html?product=ear_phones">
            <img src="ring.jpeg" alt="earphones">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="JEWELRY" data-url="product_details.html?product=smart_glasses">
            <img src="ring.jpeg" alt="smartglasses">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="JEWELRY" data-url="product_details.html?product=smart_rings">
            <img src="ring.jpeg" alt="smart rings">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name=" NECK CHAINS" data-url="product_details.html?product=phone_accessories">
            <img src="ring.jpeg" alt="phone accessories">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="WATCHES" data-url="product_details.html?product=gaming_gadgets">
            <img src="ring.jpeg" alt="gaming gadget">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="SHOE" data-url="product_details.html?product=laptops_and_tablets">
            <img src="ring.jpeg" alt="laptop and tablets">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="CLOTH" data-url="product_details.html?product=travel_monitors">
            <img src="ring.jpeg" alt="travel monitors">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
        <div class="product" data-name="RING" data-url="product_details.html?product=smart_phones">
            <img src="ring.jpeg" alt="smartphones">
            <h3>JEWELRY</h3>
            <a href="registration.html">VIEW DETAILS</a>
        </div>
    </div>
    <footer><p>STAY UPDATED WITH ELLABLINGS</p>
        &COPY; ELLABLINGS
    </footer>
    <script>
        const searchInput = document.querySelector('.srch');
        const productItems = document.querySelectorAll('.product');
        const searchResults = document.getElementById('search-results');
        const resultsList = searchResults.querySelector('ul');
        const noResultsMessage = searchResults.querySelector('.no-results');

        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            let matchingProducts = [];

            productItems.forEach(product => {
                const productName = product.getAttribute('data-name').toLowerCase();
                if (productName.includes(searchTerm)) {
                    matchingProducts.push(product);
                }
            });

            resultsList.innerHTML = '';
            if (matchingProducts.length > 0) {
                matchingProducts.forEach(product => {
                    const listItem = document.createElement('li');
                    listItem.textContent = product.getAttribute('data-name');
                    listItem.dataset.url = product.getAttribute('data-url');
                    listItem.addEventListener('click', () => {
                        const productUrl = listItem.dataset.url;
                        if (productUrl) {
                            window.location.href = productUrl;
                        }
                        resultsList.innerHTML = '';
                        searchResults.style.display = 'none';
                        searchInput.value = '';
                    });
                    resultsList.appendChild(listItem);
                });
                searchResults.style.display = 'block';
                noResultsMessage.style.display = 'none';
            } else {
                searchResults.style.display = 'none';
                noResultsMessage.style.display = 'block';
            }
        });

        document.addEventListener('click', (event) => {
            if (!searchResults.contains(event.target) && event.target !== searchInput) {
                searchResults.style.display = 'none';
            }
        });
    </script>
</body>
</html>