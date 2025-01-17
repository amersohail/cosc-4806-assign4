<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }

  public function getUserByUsername($username){
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
    $statement->bindValue(':name', $username);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);

  }

   public function logAttempt($username, $status){
     $db = db_connect();
     $statement = $db->prepare("INSERT INTO log (username, attempt, attempt_time) VALUES (:username, :attempt, NOW())");
     $statement->bindValue(':username', $username);
     $statement->bindValue(':attempt', $status);
     $statement->execute();
     
     
   }

    public function authenticate($username, $password) {
      $username = strtolower($username);
      $db = db_connect();
      $lockoutTime = 60;
      $maxAttempts = 3;

      $statement = $db->prepare("SELECT attempt, attempt_time FROM log WHERE username = :name ORDER BY attempt_time DESC LIMIT :maxAttempts");
      $statement->bindValue(':name', $username);
      $statement->bindValue(':maxAttempts', $maxAttempts, PDO::PARAM_INT);
      $statement->execute();
      $attempts = $statement->fetchAll(PDO::FETCH_ASSOC);

      $recentFailedAttempts = array_filter($attempts, function ($attempt) use ($lockoutTime) {
          return $attempt['attempt'] == 'bad' && (time() - strtotime($attempt['attempt_time']) < $lockoutTime);
      });

      if (count($recentFailedAttempts) >= $maxAttempts){
        echo "Your account is locked. Please try again later. <a href='/login'>Go to Login</a>";
        exit();
      }

       $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
       $statement->bindValue(':name', $username);
       $statement->execute();
       $user = $statement->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($password, $user['password'])){
        $_SESSION['auth'] = 1;
        $_SESSION['username'] = ucwords($username);
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $this->logAttempt($username, 'good');
        header('Location: /home');
        exit();
        
      }
      else{
        $this->logAttempt($username, 'bad');
        echo "Invalid username or password. <a href='/login'>Go to Login</a>";
        exit();
        
      }
    }
}
