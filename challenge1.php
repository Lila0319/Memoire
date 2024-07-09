<?php
$upload_success = false;
$uploaded_file_path = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $upload_success = true;
        $uploaded_file_path = $target_file;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Uploader fichier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="utf-8">
</head>
<body>
    <div class="content">
        <h1>Uploader un fichier</h1>
        <form action="challenge1.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Sélectionnez un fichier à uploader :</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Uploader le fichier" name="submit">
        </form>
        <?php if ($upload_success): ?>
            <p>Le fichier a été uploadé avec succès. <a href="<?php echo htmlspecialchars($uploaded_file_path); ?>" target="_blank"><?php echo htmlspecialchars($uploaded_file_path); ?></a></p>
        <?php endif; ?>
    </div>
</body>
</html>
