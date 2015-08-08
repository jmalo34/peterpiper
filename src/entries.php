<?php
class Task
  {
    private $description;

    function __construct($description)
    {
      $this->description = $description;
    }

    function setDescription($new_description)
    {
      $this->description = (string) $new_description;
    }

    function getDescription()
    {
      return $this->description;
    }

    function save()
    {
      array_push($_SESSION['list_of_entries'], $this);
    }

    static function getAll()
    {
      return $_SESSION['list_of_entries'];
    }

    static function deleteAll()
    {
      $_SESSION['list_of_entries'] = array();
    }
  }
  ?>