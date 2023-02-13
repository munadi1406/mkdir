<?php 

$episode =  $_POST['episode'];
$film_id = $_POST['film_id'];



// var_dump($film_id);

$sql = "INSERT INTO episode (film_id,episode) VALUES ($film_id,$episode)";
if(mysqli_query($conn,$sql)){
    $id_episode = mysqli_insert_id($conn);

}else{
    echo mysqli_error($conn);
}





$values = [];
if (isset($_POST['quality1080']) && $_POST['quality1080'] === '1080') {
    $gd1080 = $_POST['gd1080'];
    $utb1080 = $_POST['utb1080'];
    $mg1080 = $_POST['mg1080'];
    $values[] = "('$gd1080', '$utb1080', '$mg1080', '$film_id', '1080',$id_episode)";
}
if (isset($_POST['quality720']) && $_POST['quality720'] === '720') {
    $gd720 = $_POST['gd720'];
    $utb720 = $_POST['utb720'];
    $mg720 = $_POST['mg720'];
    $values[] = "('$gd720', '$utb720', '$mg720', '$film_id', '720',$id_episode)";
}
if (isset($_POST['quality540']) && $_POST['quality540'] === '540') {
    $gd540 = $_POST['gd540'];
    $utb540 = $_POST['utb540'];
    $mg540 = $_POST['mg540'];
    $values[] = "('$gd540', '$utb540', '$mg540', '$film_id', '540',$id_episode)";
}

if (count($values) > 0) {
    $values = implode(",", $values);
    $sql = "INSERT INTO link (GD, UTB, MG, film_id, quality,episode_id) VALUES $values";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error inserting link data: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
echo '<script>
alert("Data Berhasil Di Post");
window.location="' . $baseUrl . '/db/?page=post";
</script>';

?>


