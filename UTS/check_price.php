<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$roomTypes = [
    'standard' => 300000,
    'superior' => 400000,
    'deluxe' => 500000
];

if(isset($_POST['check'])) {
    $type = $_POST['room_type'];
    $floor = $_POST['floor'];
    $days = $_POST['days'];
    $discount = $_POST['discount'];
    
    $basePrice = $roomTypes[$type] * $days;
    
    $floorCharge = ($floor > 5) ? 50000 : 0;
    $totalBeforeDiscount = $basePrice + $floorCharge;
    
    $discountAmount = 0;
    if($discount === 'member') {
        $discountAmount = $totalBeforeDiscount * 0.1;
    } elseif($discount === 'birthday') {
        $discountAmount = 100000;
    }
    
    $finalPrice = $totalBeforeDiscount - $discountAmount;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Price - Hotel Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bodyTampan">
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Check Room Price</h3>
                        
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="room_type" class="form-label">Room Type</label>
                                <select class="form-select" id="room_type" name="room_type" required>
                                    <option value="standard">Standard (Rp 300,000)</option>
                                    <option value="superior">Superior (Rp 400,000)</option>
                                    <option value="deluxe">Deluxe (Rp 500,000)</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="floor" class="form-label">Floor</label>
                                <input type="number" class="form-control" id="floor" name="floor" min="1" max="20" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="days" class="form-label">Number of Days</label>
                                <input type="number" class="form-control" id="days" name="days" min="1" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <select class="form-select" id="discount" name="discount">
                                    <option value="none">No Discount</option>
                                    <option value="member">Member (10%)</option>
                                    <option value="birthday">Birthday Promo (Rp 100,000)</option>
                                </select>
                            </div>
                            
                            <button type="submit" name="check" class="btn btn-primary w-100">Check Price</button>
                        </form>

                        <?php if(isset($finalPrice)): ?>
                        <div class="mt-4">
                            <h4>Price Details:</h4>
                            <table class="table">
                                <tr>
                                    <td>Base Price (<?php echo $days; ?> days)</td>
                                    <td>Rp <?php echo number_format($basePrice); ?></td>
                                </tr>
                                <?php if($floorCharge > 0): ?>
                                <tr>
                                    <td>Floor Charge</td>
                                    <td>Rp <?php echo number_format($floorCharge); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($discountAmount > 0): ?>
                                <tr>
                                    <td>Discount</td>
                                    <td>- Rp <?php echo number_format($discountAmount); ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr class="table-primary">
                                    <td><strong>Final Price</strong></td>
                                    <td><strong>Rp <?php echo number_format($finalPrice); ?></strong></td>
                                </tr>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <footer>
            <p>&copy; 2024 Sasa Hotel. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>