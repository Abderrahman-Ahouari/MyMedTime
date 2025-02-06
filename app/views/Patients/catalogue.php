<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors & Reservations</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h2>Doctors List</h2>
        <div class="doctors-list">
            <div class="doctor-card">
                <h3>Dr. Jane Smith</h3>
                <p>jane.smith@example.com</p>
                <button class="reserve">Take Reservation</button>
            </div>
            <!-- Add more doctor cards dynamically from backend -->
        </div>
        <h2>Your Reservations</h2>
        <div class="reservations-list">
            <div class="reservation-card">
                <h3>Dr. Jane Smith</h3>
                <p>jane.smith@example.com</p>
                <p>2023-10-20</p>
                <button class="cancel">Cancel</button>
            </div>
            <!-- Add more reservation cards dynamically from backend -->
        </div>
    </div>
</body>
</html>