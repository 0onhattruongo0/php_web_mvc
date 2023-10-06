<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= __WEB_ROOT; ?>/public/assets/clients/css/main.css">
    <title>Document</title>
</head>
<body>
    <?php
    $this->render('blocks/header',$sub_content)
    ?>
    <?php
    $this->render($content,$sub_content);
    ?>
    <?php
    $this->render('blocks/footer',$sub_content)
    ?>
    <script src="<?= __WEB_ROOT; ?>/public/assets/clients/js/main.js"></script>
</body>
</html>