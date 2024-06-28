<?php

class Reminder {

    public function __construct() {
    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return is_array($rows) ? $rows : [$rows];
    }

  public function create_reminder($user_id, $subject) {
      $db = db_connect();
      $query = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (?, ?)");
      return $query->execute([$user_id, $subject]);
  }

  
}

?>