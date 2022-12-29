<h1>Upload an image</h1>
<!-- enctype="multipart/form-data" -->
<form method="post" action="/user/upload" enctype="multipart/form-data">
    <div>    
        <label for="title">title</label>
        <br>
        <input id="title" name="title">
    </div>
    
    <div>    
        <label for="image">image</label>
        <br>
        <input type="file" id="image" name="image">
    </div>
    
    <div>    
        <label for="description">description</label>
        <br>
        <input id="description" name="description">
    </div>

    <button type="submit">Submit</button>
</form>

<img src="/public/assets/fish.jpg" alt="it's a fish"/>
<br>
<img src="/app/models/testimages/pokeball.jpg" alt="it's a pokeball"/>
