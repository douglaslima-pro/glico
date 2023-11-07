<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Upload a file</title>
</head>

<body>

    <form enctype="multipart/form-data" action="../../controller/alterarFoto.php" method="POST">
        <label for="picture">Select a picture you want to upload</label>
        <input type="file" id="picture" name="picture" accept="image/*" required>
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>