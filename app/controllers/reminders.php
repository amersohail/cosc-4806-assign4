<?php

class Reminders extends Controller {

    public function index() {		
      $reminder = $this->model('Reminder');
      $reminders_list = $reminder->get_all_reminders();
      $this->view('reminders/index',['reminders' => $reminders_list]);
    }

  public function create() {
      $this->view('reminders/create');
  }

  public function store() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $user_id = $_SESSION['user_id'];
          $subject = $_POST['subject'];

          // Debugging: Log the values
          error_log("User ID: " . $user_id);
          error_log("Subject: " . $subject);
          
          $reminder = $this->model('Reminder');
          $reminder->create_reminder($user_id, $subject);

          header('Location: /reminders');
      } else {
          $this->create();
      }
  }
}

?>