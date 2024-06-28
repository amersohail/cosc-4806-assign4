<?php require_once 'app/views/templates/header.php' ?>

<?php
// Start the session
session_start();

?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="container mt-5">
            <h1 class="mb-4">Reminders List</h1>
            
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Deleted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Check if reminders is a single element or multiple
                    $reminders = isset($data['reminders'][0]) ? $data['reminders'] : [$data['reminders']];

                    foreach ($reminders as $reminder): ?>
                        <tr>
                            <td><?= htmlspecialchars($reminder['subject']); ?></td>
                            <td><?= htmlspecialchars($reminder['created_at']); ?></td>
                            <td><?= htmlspecialchars($reminder['completed']); ?></td>
                            <td><?= htmlspecialchars($reminder['deleted']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

<?php require_once 'app/views/templates/footer.php' ?>
