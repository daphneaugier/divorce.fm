<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divorce.fm</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <?php 
        $folder = dir("/var/www/html/assets/images/bg/");
        $bg_list = [];
        while (false !== ($entry = $folder->read())) {
            if($entry[0] != "."){
                $bg_list[] = $entry;
            }
        }
        $folder->close();
        $r = rand(0, count($bg_list)-1);

        $bg = $bg_list[$r];
        $deg = rand(30, 360);
    ?>
    
    <style>
        body {
            background: url('/assets/images/bg/<?php echo $bg; ?>') no-repeat center center fixed;
            background-size: 100% 100%;
        }
        .title {
            width: 80%;
            max-width: 1200px;
            margin-top: 10em;
            filter: hue-rotate(<?php echo $deg; ?>deg);
        }
        .control-button {
        filter: hue-rotate(<?php echo $deg; ?>deg);
    }
    </style>

</head>
<body>
    <header>
        <img src="assets/images/title.png" alt="Divorce.fm - We Love Music" class="title">
    
    </header>
    <main>
        <div class="player-container">
            <img src="assets/images/buttonplay.png" alt="Play Button" id="play" class="control-button">
            <img src="assets/images/buttonnext.png" alt="Next Button" id="next" class="control-button">
            <img src="assets/images/textfield.png" alt="Track Title Placeholder" id="trackTitle" class="track-title">
            <img src="assets/images/buttondot.png" alt="Dot Button" id="dot" class="control-button">
        </div>
    </main>

    <!-- Admin Panel -->
        <button class="open-button" onclick="openForm()">fuck love</button>
        
        <div class="form-popup" id="myForm">
          <form action="/admin.php" method="POST" class="form-container">
            <h1>Login</h1>
        
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
        
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
        
            <button type="submit" class="btn">Login</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
        </div>
        

    <script src="https://w.soundcloud.com/player/api.js"></script>
    <script src="/script.js"></script>
    <script src="/admin.js"></script>
</body>
</html>
