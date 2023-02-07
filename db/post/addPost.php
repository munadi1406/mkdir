<div class="container-sm  mt-4">
    <form action="?page=postQuery" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Desc</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="desc">
        </div>
        <div class="form-group">
            <label for="datepicker">Pilih Tanggal:</label>
            <input type="date" class="form-control" id="datepicker" name="date">
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="action" value="action" name="genre[]">
                <label class="form-check-label" for="action">Action</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="comedy" value="comedy" name="genre[]">
                <label class="form-check-label" for="comedy">Comedy</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="drama" value="drama" name="genre[]">
                <label class="form-check-label" for="drama">Drama</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="horror" value="horror" name="genre[]">
                <label class="form-check-label" for="horror">Horror</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="sci-fi" value="sci-fi" name="genre[]">
                <label class="form-check-label" for="sci-fi">Sci-Fi</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="romance" value="romance" name="genre[]">
                <label class="form-check-label" for="romance">Romance</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="adventure" value="adventure" name="genre[]">
                <label class="form-check-label" for="adventure">Adventure</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="fantasy" value="fantasy" name="genre[]">
                <label class="form-check-label" for="fantasy">Fantasy</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="thriller" value="thriller" name="genre[]">
                <label class="form-check-label" for="thriller">Thriller</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="mystery" value="mystery" name="genre[]">
                <label class="form-check-label" for="mystery">Mystery</label>
            </div>
            <!-- dan seterusnya -->
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