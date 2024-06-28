<?php require_once 'app/views/templates/header.php' ?>

<?php
// Start the session
session_start();

?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="container mt-5">
          <h1 class="mb-4">Create a New Reminder</h1>
          <form action="/reminders/store" method="POST">
              <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" required>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Create Reminder</button>
          </form>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
