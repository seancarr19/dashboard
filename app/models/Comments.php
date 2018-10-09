
<?php

// <!-- Gregory 2018 Github IN class dashboard
// Modified by S. Carroll October 2018 -->

class Comments
{
  public $id;
  public $comment;

  public function __construct($data) {
    $this->id = isset($data['id']) ? $data['id'] : null;
    $this->comment = $data['comment'];

  }
  public static function fetchAll() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM Comments';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    if (!$success) {
      die('SQL Error');

    }
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theComment =  new Comments($row);
      array_push($arr, $theComment);
    }
    return $arr;
  }

  public function create()
  {
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'Insert INTO Comments (id ,comment)
    Values(? , ?)';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute([
      $this->id ,
      $this->comment
    ]);
    $this->id = $db->lastInsertId();

  }
  // 4. Handle the results
}
