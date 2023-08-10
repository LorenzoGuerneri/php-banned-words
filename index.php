<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione: php-badwords</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="container">
    <?php
    $search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
    $oldText = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

    $censoredText = str_replace($search, '***', $oldText);
    $censoredWordsCount = ($search !== '') ? substr_count($oldText, $search) : 0;
    ?>
    <h1>Testo da censurare</h1>
    <form action="" method="GET">
        <div>
            <label for="message">Inserisci un messaggio: </label>
            <textarea id="message" name="message" cols="40" rows="3"><?php echo $oldText; ?></textarea>
        </div>
        <div>
            <label for="search">Stringa da censurare:</label>
            <input type="text" id="search" name="search" value="<?php echo $search; ?>">
        </div>
        <button type="submit">Censura!</button>
    </form>
    <?php if (!empty($search) && !empty($oldText)) { ?>
        <br>
        <h2>Testo censurato</h2>
        <p>Testo censurato: <?php echo $censoredText; ?></p>
        <p>Numero di parole censurate: <?php echo $censoredWordsCount; ?></p>
    <?php } ?>
</body>
</html>
