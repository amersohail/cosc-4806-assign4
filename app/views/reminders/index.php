<?php require_once 'app/views/templates/header.php' ?>

<?php
// Start the session
session_start();
?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="container mt-5">
            <h1 class="mb-4">Reminders List</h1>
            <a href="/reminders/create" class="btn btn-primary mb-3">Create Reminder</a>
            <a href="/reminders/edit" class="btn btn-secondary mb-3">Update/Delete Reminders</a>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Subject <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                        </svg></th>
                        <th scope="col">Created At
                        </th>
                        <th scope="col">Completed
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Check if $data['reminders'] is a single element or multiple
                    $reminders = is_array($data['reminders']) && isset($data['reminders'][0]) ? $data['reminders'] : [$data['reminders']];

                    foreach ($reminders as $reminder): ?>
                        <tr>
                            <td><?= htmlspecialchars($reminder['subject']); ?></td>
                            <td><?= htmlspecialchars($reminder['created_at']); ?></td>
                            <td>
                                <?= $reminder['completed'] ? 'Yes' : 'No'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
         </div>
         </div>
<?php require_once 'app/views/templates/footer.php' ?>