<?php

if ($_POST) {
    // Not actually going to upload the file, but you would do that here

    // Pretend something important is happening
    sleep(3);

    // Respond with json on successful upload
    header("Content-Type: application/json");
    die(json_encode(array("image_url" => "demo.jpg")));
}

?>

<!DOCTYPE>
<html>
<head>
<title>Upload File Form</title>
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" name="submit" value="submit" />
</form>
</body>
</html>
