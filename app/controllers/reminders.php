<?php

class Reminders extends Controller {

    public function index() {		
      $reminder = $this->model('Reminder');
      $reminders_list = $reminder->get_all_reminders();
      //$this->view('reminders/index');
      $this->view('reminders/index',['reminders' => $reminders_list]);
    }

}

?>