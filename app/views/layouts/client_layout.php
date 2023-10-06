<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&amp;family=Zen+Old+Mincho:wght@400;500;600;700;900&amp;display=swap"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css" rel="stylesheet"
    type="text/css" media="all">

    <link rel="stylesheet" href="<?= __WEB_ROOT; ?>/public/assets/clients/css/main.css">
  <title>Home</title>
</head>

<body id="body">
    <?php
        $this->render('blocks/header');
    ?>
  <main class="mainContent">
    <?php
        $this->render($content);
    ?>
    <?php
         $this->render('blocks/footer')
    ?>
    

    <div id="movieModalContent" class="em-homeModal em-homeYoutube">
      <div class="em-homeYoutube__inner">
        <div class="em-homeYoutube__youtube">
          <div id="emYoutube"></div>
        </div>
      </div>
      <span id="movieModalClose" class="em-homeModal__close"><img src="<?= __WEB_ROOT; ?>/public/assets/clients/images/ico_modalClose.svg" alt="✕"></span>
    </div>
  </main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.1/dist/simpleParallax.min.js"></script>
<script src="<?= __WEB_ROOT; ?>/public/assets/clients/js/main.js"></script>
</body>
</html>