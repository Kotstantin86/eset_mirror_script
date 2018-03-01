<?php

require __DIR__ . "/inc/init.php";

if (try_self_update()) {
    spl_autoload_unregister($autoload);
    unset($autoload, $try_self_update);
    require __DIR__ . "/inc/init.php";
}

$nod32ms = new Nod32ms();
