<?php
use File\Upload;

if (isset($_POST['upload'])) {

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/img/";
    require_once 'File/Upload.php';
    try {
        $loader = new Upload($destination);
        $loader->upload();
        $result = $loader->getMessages();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Verkefni 2b</title>
</head>
var/www/html/img
<body>
    <?php
        if (isset($result)) {
            echo '<ul>';
            foreach ($result as $message) {
                echo "<li>$message</li>";
            }
            echo '</ul>';
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data" id="uploadImage">
        <p>
            <label for="image">Upload image:</label>
            <input type="file" name="image" id="image">
        </p>
        <p>
            <input type="submit" name="upload" id="upload" value="Upload">
        </p>
    </form>
</body>
</html>
