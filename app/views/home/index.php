<?php
// Start the session
session_start();

// Check if the username session variable is set
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: /login");
    exit();
}
?>

<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row mt-4">
            <div class="col-lg-12">
                <h1>Welcome
                <?php
                // Check if the username session variable is set
                if (isset($_SESSION['username'])) {
                    // Display the username
                    echo " " . htmlspecialchars($_SESSION['username']) . "!";
                } else {
                    echo "Guest!";
                }?>
                </h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p> <a href="/logout">Click here to logout</a></p>
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>
