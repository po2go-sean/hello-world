<?php

require __DIR__ . "/vendor/autoload.php";

$tickcounter = 0;
$tockcounter = 0;
$boomcounter = 0;

function tick() {
    global $tickcounter;
    $tickcounter++;

    $throwAwayGarbage = [1,2,3,4,5,6,7,8,9];
    $moreThrowaway = array_reverse($throwAwayGarbage);
    $again = array_values($moreThrowaway);
    $another = array_keys($again);
    $screaming = array_merge($another,$again);
    foreach ($screaming as $scream) {
        $what = new stdClass();
        $what->Foo = $scream;
    }


    echo $tickcounter . ': tick'.PHP_EOL;
}
function tock() {
    global $tockcounter;
    $tockcounter++;
    echo $tockcounter . ': tock'.PHP_EOL;
}
function boom() {
    echo 'BOOM!'.PHP_EOL;
}

echo "before run()\n";

Amp\run(function() {
    Amp\repeat("tick", $msInterval = 990);
    Amp\repeat("tock", $msInterval = 1010);
    Amp\once("Amp\stop", $msDelay = 4010);
    Amp\once("boom", $msDelay = 4000);
});

echo "after run()\n";
