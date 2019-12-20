<?php

require './common/connection.php';

class NoteService
{
  private $DB_HOST = 'localhost';
  private $DB_USER = 'root';
  private $DB_PASS = 'secret';
  private $DB_NAME = 'notes';
  private $DB_OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ];

  public function __construct()
  {
    $this->db = new PDO("mysql:host={$this->DB_HOST};dbname={$this->DB_NAME}", $this->DB_USER, $this->DB_PASS, $this->DB_OPTIONS);
  }

  public function getAll()
  {
    try {
      $sql = "SELECT id, title, note, color FROM notes";

      $statement = $this->db->prepare($sql);
      $statement->execute();

      $result = $statement->fetchAll(PDO::FETCH_ASSOC);

      return $result;
    } catch (PDOException $e) {
      echo "Error: {$e->getMessage()}";
    }
  }
}
