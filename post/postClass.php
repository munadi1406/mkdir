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



        $query = "SELECT f.title, f.tipe,f.desc, f.date, f.image, g.name ,l.* FROM films f JOIN genre g ON f.film_id = g.id_films JOIN link l on f.film_id = l.film_id WHERE f.film_id = '$dcry' ";
        $result = mysqli_query($this->conn, $query);

        return $this->res = $result;
    }

    public function linkPostById($dcry){
        $query = "SELECT * FROM link WHERE film_id = '$dcry'";
        $val = "SELECT tipe FROM films WHERE film_id = '$dcry'";
    
        $resp = mysqli_fetch_assoc(mysqli_query($this->conn, $val));
        if ($resp['tipe'] === "Series") {
            $query = "SELECT e.episode, l.* FROM link l JOIN episode e ON e.id_episode = l.episode_id WHERE l.film_id = '$dcry'";
        }
    
        $result = mysqli_query($this->conn, $query);
        return $this->res = $result;
    }
    
    public function getEpisode($dcry){
        $sql = "SELECT episode FROM episode where film_id = '$dcry'";
        $result = mysqli_query($this->conn,$sql);


        return $this->res = $result;
    }


    public function postByGenre($genre){
        $query = "SELECT f.*, g.name FROM films f JOIN genre g ON f.film_id = g.id_films WHERE g.name LIKE '%".$genre."%' AND f.status = 'show'";

        $result = mysqli_query($this->conn,$query);


        return $this->res = $result;
    }
    
    public function postByTipe($tipe){
        $query = "SELECT f.*, g.name FROM films f JOIN genre g ON f.film_id = g.id_films WHERE f.tipe = '$tipe' AND f.status = 'show'";

        $result = mysqli_query($this->conn,$query);


        return $this->res = $result;
    }

    public function updateViews($dcry){
        $sql = "UPDATE viewers SET views = views + 1 WHERE film_id = '$dcry';";
        $result = mysqli_query($this->conn,$sql);
    }
}
