<?php

class image {

    protected $id;
    protected $img_name;
    protected $img_path;
    protected $insert_date;
    protected $img_title;
    protected $img_description;
    private $dbConn;

    public function __construct($img_name, $img_path, $img_title, $img_description)
    {
        $this->img_name = $img_name;
        $this->img_path = $img_path;
        $this->img_title = $img_title;
        $this->img_description = $img_description;
    }

    public function setDb($dbConn) {
      $this->dbConn = $dbConn;
    }

    public function getDb() {
      return $this->dbConn;
    }

    public function save() {
      if ((int)$this->id > 0) {
        $q = "UPDATE img_table SET
          img_title='".$this->dbConn->escape($this->img_title)."',
          img_description='".$this->dbConn->escape($this->img_description)."',
          img_path='".$this->dbConn->escape($this->img_path)."',
          img_name='".$this->dbConn->escape($this->img_name)."'
          WHERE id='".$this->dbConn->escape($this->id)."'";
      } else {
        $q = "INSERT INTO img_table (img_name, img_path, insert_date, img_title, img_description)
          VALUES ('".$this->dbConn->escape($this->img_name)."',
          '".$this->dbConn->escape($this->img_path)."',
          '".date("Y-m-d h:i:sa")."',
          '".$this->dbConn->escape($this->img_title)."',
          '".$this->dbConn->escape($this->img_description)."')";
      }

      $this->dbConn->query($q);
    }

}

?>
