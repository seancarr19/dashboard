<?php


class Team
{
  public $id;
  public $name;
  public $hourly_rate;

  public function __construct($data) {
    $this->id = intval($data['id'])
    $this->$name = $data['name'];
    $this->$hourly_rate = floatval($data['hourly_rate']);


  }
  public static function fetchAll() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM Teams';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    if (!$success) {
      die('SQL Error');

    }
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theTeam =  new Team($row);
      array_push($arr, $theTeam);
    }
    return $arr;
  }

  // public function create()
  // {
  //   $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  //   // 2. Prepare the query
  //   $sql = 'Insert INTO Teams (name ,hourly_rate)
  //   Values(? , ?)';
  //   $statement = $db->prepare($sql);
  //   // 3. Run the query
  //   $success = $statement->execute([
  //     $this->name,
  //     $this->hourly_rate
  //   ]);
  //   $this->id = $db->lastInsertId();
  //
  // }
  // 4. Handle the results
}
