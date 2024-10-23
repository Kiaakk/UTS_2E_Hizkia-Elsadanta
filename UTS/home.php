<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ABC Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="slider-container">
        <div class="image-slider">
            <div><img src="Bathroom hotel.jpg" alt="Hotel Image 1"></div>
            <div><img src="Kolamrenang.jpg" alt="Hotel Image 2"></div>
            <div><img src="RoomHotel.jpg" alt="Hotel Image 3"></div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Welcome to Sasa Hotel</h2>
                <div class="card">
                    <div class="card-body">
                        <h4><Strong>About Sasa Hotel</Strong></h4>
                        <p class="textTampan">Welcome to Sasa Hotel! Nestled in the heart of the city, Sasa Hotel offers a blend of modern luxury and traditional hospitality. With elegantly designed rooms, top-notch facilities, and personalized services, we aim to provide an unforgettable stay for every guest. Whether you're here for business or leisure, Sasa Hotel promises comfort, convenience, and a memorable experience. Let us be your home away from home!</p>
                        <h4><strong>Our Facilities:</strong></h4>
                        <ul>
                            <li>24/7 Room Service</li>
                            <li>Swimming Pool</li>
                            <li>Spa & Wellness Center</li>
                            <li>Fine Dining Restaurant</li>
                            <li>Conference Rooms</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <footer>
            <p>&copy; 2024 Sasa Hotel. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="script.js"></script>
</body>
</html>