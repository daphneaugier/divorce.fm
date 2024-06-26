<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divorce.fm Admin Panel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            background: url('assets/images/admin-bg.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: white;
        }

        h2, label, input, button {
            color: #006400;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        .form-container {
            max-width: 400px; /* Adjust as needed */
            margin: 0 auto; /* Center align the form */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header>
            <h1>Admin Panel</h1>
        </header>
        <main>
            <form method="post" enctype="multipart/form-data" class="mb-4 form-container">
                <div class="form-group">
                    <h2>Add new background</h2>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" name="submit" class="btn btn-light">Let's go</button>
            </form>
            <form id="tracks-form" class="mb-4 form-container">
                <h2>Add new mix link</h2>
                <div class="form-group">
                    <label for="track-url">SoundCloud URL:</label>
                    <input type="url" class="form-control" id="track-url" name="track-url" required>
                </div>
                <button type="submit" class="btn btn-light">Yeah</button>
            </form>

            <?php 
                if(isset($_POST["submit"])) {
                    $target_dir = "assets/images/bg/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    
                    if($check !== false) {
                        if (file_exists($target_file)) {
                            echo "<div class='alert alert-warning'>Sorry, file already exists.</div>";
                        } else {
                            if ($_FILES["file"]["size"] > 500000) {
                                echo "<div class='alert alert-warning'>Sorry, your file is too large.</div>";
                            } else {
                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                    echo "<div class='alert alert-success'>The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                                }
                            }
                        }
                    } else {
                        echo "<div class='alert alert-danger'>File is not an image.</div>";
                    }
                }
            ?>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
