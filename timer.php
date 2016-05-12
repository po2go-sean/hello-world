<?php

require __DIR__ . "/vendor/autoload.php";

function tick() {
    echo "tick\n";
}

echo "before run()\n";

Amp\run(function() {
    Amp\repeat("tick", $msInterval = 1000);
    Amp\once("Amp\stop", $msDelay = 5000);
});

echo "after run()\n";
