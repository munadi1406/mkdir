<?php


class PostClass
{

    private $res;
    private $conn;
    public function __construct($value)
    {
        $this->conn = $value;
    }

    public function getRandomPost($limit)
    {
        $queryRandom = "SELECT * FROM films WHERE status = 'show' ORDER BY RAND() LIMIT $limit;";
        $res = mysqli_query($this->conn, $queryRandom);

        return $this->res = $res;
    }

    public function postAll($start_from, $records_per_page){
        $query = "SELECT * FROM films where status = 'show' ORDER BY created_at DESC LIMIT $start_from, $records_per_page";
        $result = mysqli_query($this->conn, $query);

        return $this->res = $result;
    }
    
    public function postById($dcry){
        $query = "SELECT f.title, f.desc, f.date, f.image, g.name ,l.* FROM films f JOIN genre g ON f.film_id = g.id_films JOIN link l on f.film_id = l.film_id WHERE f.film_id = '$dcry' ";
        $result = mysqli_query($this->conn, $query);

        return $this->res = $result;
    }

    public function linkPostById($dcry){
        $query = "SELECT * FROM link where film_id = '$dcry' ";
        $result = mysqli_query($this->conn, $query);

        return $this->res=$result;
    }
}
