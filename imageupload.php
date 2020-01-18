<head>    <link rel="stylesheet" href="node_modules/@yaireo/tagify/dist/tagify.css">
</head>

<form action="upload.php" methode="POST" enctype="multipart/form-data">
<label for="title">Title:</label>
<input type="text" name="title" id="title" placeholder="Title"><br><br>
<label for="tags">Add Tags:</label><br>
<input name='tags-outside' class='tagify--outside' placeholder='write some tags'>

<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Add tags that express your image">?</button>
<p>Select upload resolution</p>
<label for="c1">4096x2160</label>
<input type="checkbox" name="2160" id="c1">
<label for="c2">1920x1080</label>
<input type="checkbox" name="1080" id="c2">
<label for="c3">1280x720</label>
<input type="checkbox" name="720" id="c3">
<!-- <label for="c4">mobileHD</label>
<input type="checkbox" name="mobileHD" id="c4">
<label for="c5">file??</label>
<input type="checkbox" name="file??" id="c5"> -->

<br><br>
<p>4096x2160:</p>
<input type="file" name="2160" id="2160"><br>
<p>1920x1080:</p>
<input type="file" name="1080" id="1080"><br>
<p>1280x720:</p>
<input type="file" name="720" id="720"><br>
<!-- <p>mobileHD:</p>
<input type="file" name="mobileHD" id="mobileHD"><br>
<p>file??:</p>
<input type="file" name="file??" id="file??"><br> -->
<!-- <button type="submit">Submit</!--> -->

</form>
<!-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@2.9.7/dist/tagify.min.js"></script> -->
<script src="node_modules/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="./js/tags.js"></script>
