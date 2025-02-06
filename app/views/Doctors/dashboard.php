<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h2>Appointment Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Appointment Date</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>2023-10-15</td>
                    <td>Routine checkup</td>
                    <td>
                        <button class="confirm">Confirm</button>
                        <button class="reject">Reject</button>
                    </td>
                </tr>
                <!-- Add more rows dynamically from backend -->
            </tbody>
        </table>
        <div class="availability-section">
            <h3>Set Availability</h3>
            <input type="date" name="available_date">
            <button type="submit">Confirm Availability</button>
        </div>
    </div>
</body>
</html>