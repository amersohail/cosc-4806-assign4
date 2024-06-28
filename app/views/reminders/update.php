<?php require_once 'app/views/templates/header.php' ?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="container mt-5">
          <h1 class="mb-4">Update/Delete Reminders</h1>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Subject</th>
                      <th>Created At</th>
                      <th>Completed</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php if (is_array($reminders) && !empty($reminders)): ?>
                      <?php foreach ($reminders as $reminder): ?>
                          <tr>
                              <form action="/reminders/update" method="POST" class="form-inline">
                                  <td>
                                      <input type="hidden" name="id" value="<?= htmlspecialchars($reminder['id']); ?>">
                                      <input type="text" name="subject" class="form-control" value="<?= htmlspecialchars($reminder['subject']); ?>">
                                  </td>
                                  <td><?= htmlspecialchars($reminder['created_at']); ?></td>
                                  <td>
                                      <input type="checkbox" name="completed" class="form-check-input" <?= $reminder['completed'] ? 'checked' : ''; ?>>
                                  </td>
                                  <td>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                      <button type="submit" formaction="/reminders/delete" formmethod="POST" class="btn btn-danger ml-2">Delete</button>
                                  </td>
                              </form>
                          </tr>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <tr>
                          <td colspan="4">No reminders found.</td>
                      </tr>
                  <?php endif; ?>
              </tbody>
          </table>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>