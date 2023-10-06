<?php

function menuClient($menuArr=[]){
    echo '<ul class="header__navList">';
    foreach ($menuArr as $item){
        echo '<li class="em__header-navItem"><a href="'.$item['link'].'" class="em__header-navLink">'.$item['title'].'</a></li>';
    }
    echo '</ul>';
}
?>