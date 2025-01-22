<?php
session_start();

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: ./pages/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Certification</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/cnf_styles.css">
    <script src="./assets/js/script.js"></script>
</head>
<body>
<div class="navbar-container">
    <!-- Include the Navbar -->
    <?php include './pages/navbar.php'; ?>

    <div class="form-container">
        <h2>Journal Certification Form</h2>
        <!-- Form to collect data -->
        <form id="journalForm" action="./pages/confirmation.php" method="POST">
            <label for="journalName">Journal Name:</label>
            <input type="text" id="journalName" name="journalName" required>

            <label for="editorName">Name of Editor:</label>
            <input type="text" id="editorName" name="editorName" required>

            <label for="email">Email of Editor:</label>
            <input type="email" id="email" name="email" required>

            <label for="workingSince">Working Since:</label>
            <input type="text" id="workingSince" name="workingSince" required>

            <label for="awardedOn">Awarded On:</label>
            <input type="text" id="awardedOn" name="awardedOn" required>

            <!-- Submit and Clear buttons -->
            <button type="submit" class="btn" onclick="confirmSubmission(event)">Submit</button>
            <button type="submit" class="btn clear" onclick="clearForm()">Clear</button>
        </form>
    </div>

    <!-- Modal Window -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <!-- Close button in the top-right corner -->
            <button class="close-btn" onclick="closeModal()">Close</button>
            
            <div class="modal-header">Confirm Your Details</div>
            <div id="confirmationMessage" class="modal-body">
                <!-- Confirmation details will be injected here -->
            </div>
            <div class="modal-footer">
                <!-- Confirm and Edit buttons -->
                <button class="btn cancel" onclick="closeModal()">Edit</button>
                <button class="btn" onclick="submitForm()">Confirm</button>
            </div>
        </div>
    </div>
    <!-- Include footer -->
    <?php include './pages/footer.php'; ?>
</body>
</html>
