<?php
include './../middleware/sessionCheck.php';

$id_film = $_GET['id'];

var_dump($id_film);


$query = " select f.* ,g.* ,u.*  from films f join genre g on f.film_id = g.id_films  join users u on f.id_users =  u.id_users where f.film_id = '" . $id_film . "';";
$result = mysqli_query($conn, $query);
$datas = mysqli_fetch_assoc($result);

$query2 = "SELECT * from link where film_id = '" . $id_film . "'";
$datass  = mysqli_query($conn, $query2);


var_dump($datas['name']);

$quality = array();
$linkGD = array();
$linkUTB = array();
$linkMG = array();
while ($data = mysqli_fetch_assoc($datass)) {
    // var_dump($data['quality']);

    $quality[] = $data['quality'];
    $linkGD[] = $data['GD'];
    $linkUTB[] = $data['UTB'];
    $linkMG[] = $data['MG'];
}

// var_dump($datas);
?>


<div class="container-sm  mt-4">
    <form action="?page=post-edit-query" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="film_id" value="<?php echo $datas['film_id'] ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="<?php echo $datas['title'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Desc</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="desc" value="<?php echo $datas['desc'] ?>">
        </div>
        <div class="form-group">
            <label for="datepicker">Pilih Tanggal:</label>
            <input type="date" class="form-control" id="datepicker" name="date" value="<?php echo $datas['date'] ?>">
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="action" value="action" name="genre[]" <?php echo in_array("action", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="action">Action</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="comedy" value="comedy" name="genre[]" <?php echo in_array("comedy", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="comedy">Comedy</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="drama" value="drama" name="genre[]" <?php echo in_array("drama", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="drama">Drama</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="horror" value="horror" name="genre[]" <?php echo in_array("horror", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="horror">Horror</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="sci-fi" value="sci-fi" name="genre[]" <?php echo in_array("sci-fi", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="sci-fi">Sci-Fi</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="romance" value="romance" name="genre[]" <?php echo in_array("romance", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="romance">Romance</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="adventure" value="adventure" name="genre[]" <?php echo in_array("adventure", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="adventure">Adventure</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="fantasy" value="fantasy" name="genre[]" <?php echo in_array("fantasy", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="fantasy">Fantasy</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="thriller" value="thriller" name="genre[]" <?php echo in_array("thriller", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="thriller">Thriller</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="mystery" value="mystery" name="genre[]" <?php echo in_array("mystery", explode(",", $datas['name'])) ? "checked" : ""; ?>>
                <label class="form-check-label" for="mystery">Mystery</label>
            </div>
            <!-- dan seterusnya -->
        </div>
        <div class="form-group">
            <h3>1080</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="1080" name="quality1080" <?php if (isset($quality[0])) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link GD" name="gd1080" value="<?php if (isset($linkGD[0])) {
                                                                                                                                                echo $linkGD[0];
                                                                                                                                            } ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="1080" name="quality1080">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link UTB" name="utb1080" value="<?php if (isset($linkUTB[0])) {
                                                                                                                                                echo $linkUTB[0];
                                                                                                                                            } ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="1080" name="quality1080">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link MG" name="mg1080" value="<?php if (isset($linkMG[0])) {
                                                                                                                                                echo $linkMG[0];
                                                                                                                                            } ?>">
            </div>
        </div>
        <div class="form-group">
            <h3>720</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="720" name="quality720" <?php if (isset($quality[1])) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link GD" name="gd720" value="<?php if (isset($linkGD[1])) {
                                                                                                                                            echo $linkGD[1];
                                                                                                                                        } ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="720" name="quality720">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link UTB" name="utb720" value="<?php if (isset($linkUTB[1])) {
                                                                                                                                                echo $linkUTB[1];
                                                                                                                                            } ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="720" name="quality720">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link MG" name="mg720" value="<?php if (isset($linkMG[1])) {
                                                                                                                                            echo $linkMG[1];
                                                                                                                                        } ?>">
            </div>
        </div>
        <div class="form-group">
            <h3>540</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="540" name="quality540" <?php if (isset($quality[2])) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link GD" name="gd540" value="<?php if (isset($linkGD[2])) {
                                                                                                                                            echo $linkGD[2];
                                                                                                                                        } ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="540" name="quality540">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link UTB" name="utb540" value="<?php if (isset($linkUTB[2])) {
                                                                                                                                                echo $linkUTB[2];
                                                                                                                                            } ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="540" name="quality540">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link MG" name="mg540" value="<?php if (isset($linkMG[2])) {
                                                                                                                                            echo $linkMG[2];
                                                                                                                                        } ?>">
            </div>
        </div>
        <img src="./images/<?php echo $datas['image'] ?>" alt="" width="100px">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text  " id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    const input = document.querySelector('#inputGroupFile01');
    const label = document.querySelector('.custom-file-label');

    input.addEventListener('change', function(e) {
        let fileName = '';
        if (this.files && this.files.length > 1) {
            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
        } else {
            fileName = e.target.value.split('\\').pop();
        }
        if (fileName) {
            label.innerHTML = fileName;
        } else {
            label.innerHTML = 'Choose file';
        }
    });
</script>