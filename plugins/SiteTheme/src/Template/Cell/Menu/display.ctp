<?php

?>

<ul class="nav navbar-nav">
    <li>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Home </a>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Shoes <i
                class="fa fa-angle-down"></i></a>
        <span class="dropdown-triangle"></span>
        <div class="dropdown-menu">
            <div class="dropdown-inner">
                <ul class="list-unstyled">
                    <li><a href="grid.html">Sandals</a></li>
                    <li><a href="grid.html">Sneakers</a></li>
                </ul>
            </div>
        </div>
    </li>
</ul>

<?php


//debug($menu_items);
/*echo "<ul class = 'nav navbar-nav'>";
foreach ($menu_items as $menu_item) {
    if ($menu_item['parent_id'] == 0) {
        echo "<li class='dropdown'>
                <a class='dropdown-toggle' data-toggle='dropdown' role='button' href='" . $menu_item['url'] . "'>"
            . $menu_item['title'] . "
                </a>";
        $id = $menu_item['id'];
        sub($menu_items, $id);
        echo "</li>";
    }
}
echo "</ul>";

function sub($menu_items, $id)
{
    echo "<span class='dropdown-triangle'></span>
              <div class='dropdown-menu'>
                <div class='dropdown-inner'>
                  <ul class='list-unstyled'>";
                    foreach ($menu_items as $menu_item) {
                        if ($menu_item['parent_id'] == $id) {
                            echo "<li><a href='" . $menu_item['url'] . "'>" . $menu_item['title'] . "</a>";
                            sub($menu_items, $menu_item['id']);
                            echo "</li>";
                        }
                    }
    echo "</ul></div></div>";
}
*/

?>



