<?php 

$film_id =  $_GET['id'];

?>




<div class="container-sm  mt-4">
    <form action="?page=add-episode-query" method="post" enctype='multipart/form-data'>
        <input type="hidden" value="<?php echo $film_id ?>" name="film_id">
        <div class="form-group">
            <label for="exampleInputEmail1">Episode</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="episode">
        </div>
        
        <div class="form-group">
            <h3>1080</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="1080" name="quality1080">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link GD" name="gd1080">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="1080" name="quality1080">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link UTB" name="utb1080">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="1080" name="quality1080">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link MG" name="mg1080">
            </div>
        </div>
        <div class="form-group">
            <h3>720</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="720" name="quality720">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link GD" name="gd720">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="720" name="quality720">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link UTB" name="utb720">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="720" name="quality720">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link MG" name="mg720">
            </div>
        </div>
        <div class="form-group">
            <h3>540</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="540" name="quality540">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link GD" name="gd540">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="540" name="quality540">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link UTB" name="utb540">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" value="540" name="quality540">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Link MG" name="mg540">
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