<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divorce.fm</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    <main>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="file">Choose file to upload</label>
            <input type="file" id="file" name="file" multiple />
        </div>
        <div>
            <button>Submit</button>
        </div>
        </form>
        <form id="tracks-form">
            <h2>Add New SoundCloud Link</h2>
            <label for="track-url">SoundCloud URL:</label>
            <input type="url" id="track-url" name="track-url" required>
            <button type="submit">Add</button>
        </form>
        <?php 
        $target_dir = "/assets/images/bg/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["file"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
          } else {
            echo "File is not an image.";
          }
        }
        ?>
    </main>
</body>
</html>
