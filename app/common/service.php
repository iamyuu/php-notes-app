<?php

class NoteService
{
  private $DB_HOST = 'localhost';
  private $DB_USER = 'root';
  private $DB_PASS = 'secret';
  private $DB_NAME = 'notes';
  private $DB_OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ];

  /**
   * Make a connection to the resource.
   */
  public function __construct()
  {
    $this->db = new PDO("mysql:host={$this->DB_HOST};dbname={$this->DB_NAME}", $this->DB_USER, $this->DB_PASS, $this->DB_OPTIONS);
  }

  /**
   * Close connection to the resource.
   */
  public function __destruct()
  {
    $this->db = null;
  }

  /**
   * Get a listing of the resource.
   */
  public function all()
  {
    try {
      $sql = "SELECT id, title, note, color FROM notes";

      $statement = $this->db->prepare($sql);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return "Error: [all] {$e->getMessage()}";
    }
  }

  /**
   * Get the specified resource.
   *
   * @param int $id
   */
  public function get(int $id)
  {
    try {
      $sql = "SELECT id, title, note, color FROM notes WHERE id = :id";

      $statement = $this->db->prepare($sql);
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return "Error: [get] {$e->getMessage()}";
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param array $item
   */
  public function save(array $item)
  {
    try {
      $sql = "INSERT INTO notes (title, note, color) VALUES (:title, :note, :color)";

      $statement = $this->db->prepare($sql);
      $statement->bindParam('title', $item['title'], PDO::PARAM_STR);
      $statement->bindParam('note', $item['note'], PDO::PARAM_STR);
      $statement->bindParam('color', $item['color'], PDO::PARAM_STR);
      $statement->execute();

      return "Successfully created";
    } catch (PDOException $e) {
      return "Error: [save] {$e->getMessage()}";
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param array $item
   */
  public function update(array $item)
  {
    try {
      $sql = "UPDATE notes SET id = :id, title = :title, note = :note, color = :color WHERE id = :id";

      $statement = $this->db->prepare($sql);
      $statement->bindParam('id', $item['id'], PDO::PARAM_INT);
      $statement->bindParam('title', $item['title'], PDO::PARAM_STR);
      $statement->bindParam('note', $item['note'], PDO::PARAM_STR);
      $statement->bindParam('color', $item['color'], PDO::PARAM_STR);
      $statement->execute();

      return "Successfully updated";
    } catch (PDOException $e) {
      return "Error: [update] {$e->getMessage()}";
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   */
  public function remove(int $id)
  {
    try {
      $sql = "DELETE FROM notes WHERE id = :id";

      $statement = $this->db->prepare($sql);
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->execute();

      return "Successfully deleted";
    } catch (PDOException $e) {
      return "Error: [remove] {$e->getMessage()}";
    }
  }
}
