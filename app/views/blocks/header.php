<div class="em__header" id="em__header">
    <h1 class="em__header-heading">
      <a href="/" class="em__header-logo">
        <img src="<?= __WEB_ROOT; ?>/public/assets/clients/images/logo_nav.png" alt="logo">
      </a>
    </h1>
    <nav class="header__inline-menu em__header-nav">
      <!-- <ul class="header__navList">
        <li class="em__header-navItem"><a href="#" class="em__header-navLink">Home</a></li>
        <li class="em__header-navItem"><a href="#" class="em__header-navLink">Maternity Jewelry</a></li>
        <li class="em__header-navItem"><a href="#" class="em__header-navLink">Necklace</a></li>
        <li class="em__header-navItem"><a href="#" class="em__header-navLink">Babyring</a></li>
        <li class="em__header-navItem"><a href="#" class="em__header-navLink">Charm</a></li>
        <li class="em__header-navItem"><a href="#" class="em__header-navLink">Maternity Gift</a></li>
      </ul> -->
      <?php
        menuClient(View::$dataShare['menuArrClient'])
      ?>
    </nav>
    <div class="em__header-icons">
      <div class="em__header-icon">
        <a href="#" class="em__header-iconLink">
          <span class="em__header-iconBag">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="#8e623e" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M15.9964 13.6213L14.6631 3.93922C14.6329 3.71921 14.4448 3.55521 14.2226 3.55521H11.1114V3.11075C11.1114 1.39559 9.71583 0 8.00022 0C6.28462 0 4.88902 1.39559 4.88902 3.1112V3.55565H1.77783C1.5556 3.55565 1.36804 3.71966 1.33737 3.93966L0.00400011 13.6213C0.00133337 13.6413 0 13.6617 0 13.6817C0 14.96 1.15648 16 2.57785 16H13.4226C14.844 16 16.0004 14.96 16.0004 13.6817C16.0004 13.6613 15.9991 13.6413 15.9964 13.6213ZM5.77794 3.1112C5.77794 1.88583 6.77485 0.888914 8.00022 0.888914C9.22559 0.888914 10.2225 1.88583 10.2225 3.1112V3.55565H5.77794V3.1112ZM13.4226 15.1115H2.57785C1.65782 15.1115 0.907136 14.4853 0.889358 13.7102L2.16539 4.44457H4.88902V5.77794C4.88902 6.02328 5.08814 6.22239 5.33348 6.22239C5.57882 6.22239 5.77794 6.02328 5.77794 5.77794V4.44457H10.2225V5.77794C10.2225 6.02328 10.4216 6.22239 10.667 6.22239C10.9123 6.22239 11.1114 6.02328 11.1114 5.77794V4.44457H13.8351L15.1111 13.7102C15.0933 14.4853 14.3426 15.1115 13.4226 15.1115Z">
              </path>
            </svg>
          </span>
          <span class="em__header-iconText">Bag</span>
        </a>
      </div>
    </div>
    <div class="em__headerDrawer">
      <div id="Details-menu-drawer-container" class="menu-drawer-container">
        <summary id="emDrawerButton" class="em-headerDrawer__summary">
          <div class="em-headerDrawer__burger">
            <span></span>
            <span></span>
          </div>
        </summary>
        <div id="menu-drawer" class="menu-drawer em-headerDrawer__content" tabindex="-1">
          <div class="menu-drawer__inner-container">
            <div class="menu-drawer__navigation-container">
              <!-- <nav class="em-header__nav">
                <ul class="header__navList">
                  <li class="em__header-navItem"><a href="#" class="em__header-navLink">Home</a></li>
                  <li class="em__header-navItem"><a href="#" class="em__header-navLink">Maternity Jewelry</a></li>
                  <li class="em__header-navItem"><a href="#" class="em__header-navLink">Necklace</a></li>
                  <li class="em__header-navItem"><a href="#" class="em__header-navLink">Babyring</a></li>
                  <li class="em__header-navItem"><a href="#" class="em__header-navLink">Charm</a></li>
                  <li class="em__header-navItem"><a href="#" class="em__header-navLink">Maternity Gift</a></li>
                </ul>
              </nav> -->
              <?php
                menuClient(View::$dataShare['menuArrClient'])
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
