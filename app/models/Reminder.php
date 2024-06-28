<?php

class Reminder {

    public function __construct() {
    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return is_array($rows) ? $rows : [$rows];
    }

    public function get_reminder_by_id($id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE id = :id AND deleted = 0");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create_reminder($user_id, $subject) {
          $db = db_connect();
          $query = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (?, ?)");
          return $query->execute([$user_id, $subject]);
    }
    
    public function update_reminder($id, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders SET subject = :subject, completed = :completed WHERE id = :id");
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        $statement->bindParam(':completed', $completed, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
    
    //not deleting the row, just setting the delete column value to true.
    public function delete_reminder($id) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders SET deleted = 1 WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}

?>