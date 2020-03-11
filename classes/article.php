<?php

class article {

    protected $id;
    protected $article_title;
    protected $article_headline;
    protected $article_body;
    protected $publish_date;
    protected $insert_date;
    protected $update_date;
    protected $is_active;

    private $dbConn;

    public function __construct($article_title, $article_headline, $article_body, $publish_date, $is_active)
    {
        $this->article_title = $article_title;
        $this->article_headline = $article_headline;
        $this->article_body = $article_body;
        $this->publish_date = $publish_date;
        $this->is_active = $is_active;
    }

    public function setDb($dbConn)
    {
        $this->dbConn = $dbConn;
    }

    public function getDb()
    {
        return $this->dbConn;
    }


    public function save_article() {
        if ((int)$this->id > 0) {
          $q1 = "UPDATE articles SET
            article_title='".$this->dbConn->escape($this->article_title)."',
            article_headline='".$this->dbConn->escape($this->article_headline)."',
            article_body='".$this->dbConn->escape($this->article_body)."',
            publish_date='".$this->dbConn->escape($this->publish_date)."',
            update_date='".$this->dbConn->escape(date("Y-m-d h:i:s"))."',
            is_active='".$this->dbConn->escape($this->is_active)."'
            WHERE id='".$this->dbConn->escape($this->id)."'";
          } else {
            $q1 = "INSERT INTO articles (article_title, article_headline, article_body, insert_date, is_active)
              VALUES ('".$this->dbConn->escape($this->article_title)."',
              '".$this->dbConn->escape($this->article_headline)."',
              '".$this->dbConn->escape($this->article_body)."',
              '".date("Y-m-d h:i:s")."',
              '".$this->dbConn->escape($this->is_active)."')";
            }
// echo $q1;
// die();
          $this->dbConn->query($q1);
        }
}

?>
