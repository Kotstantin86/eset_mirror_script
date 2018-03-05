<?php

require __DIR__ . "/inc/init.php";


try {
    Tools::init();

    if (SelfUpdate::init()) {
        spl_autoload_unregister($autoload);
        unset($autoload);
        require __DIR__ . "/inc/init.php";
    }

    Tools::init();
    Config::init();
    Language::init();

    @ini_set('memory_limit', Config::get('SCRIPT')['memory_limit']);

    $nod32ms = new Nod32ms();
}

catch (ToolsException $e) {
    Log::write_log($e->getMessage(), 0);
}

catch (ConfigException $e) {
    Log::write_log($e->getMessage(), 0);
}

catch (SelfUpdateException $e) {
    Log::write_log($e->getMessage(), 0);
}

catch (phpmailerException $e) {
    Log::write_log($e->getMessage(), 0);
}

catch (Exception $e) {
    Log::write_log($e->getMessage(), 0);
}

finally {
    Log::write_log("Script stopped!", 0);
}
