<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css">
    <link rel="stylesheet" href="styles/css/style.css">
</head>

<body>
    <div class="main" id="mainContent">
        <!-- Le cas où l'utilisateur n'a pas de JavaScript sur le navigateur -->
        <script>
            document.getElementById('mainContent').classList.add('isLoading')
        </script>
        <?php require 'shared/_nav.php'; ?>
        <div class="container">
            <?= $content ?>
        </div>
    </div>
    <script src="js/script.js" defer></script>
</body>

</html>