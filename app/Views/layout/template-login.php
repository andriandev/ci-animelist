<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title><?= esc($title); ?></title>
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/assets/img/icon.png" />
    <script src="/assets/vendor/font-awesome/all.min.js"></script>
</head>

<body class="bg-primary">

    <?= $this->renderSection('content'); ?>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>