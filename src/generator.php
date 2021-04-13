<?php

$dir = __DIR__;
putenv("CPHALCON_DIR=$dir/../vendor/phalcon/cphalcon/ext");

$path = "$dir/../vendor/phalcon/devtools/ide/gen-stubs.php";
$result = shell_exec("php7.3 $path");
if ($result !== null) {
    echo "Fail run gen-stubs.php" . PHP_EOL;
    exit($result);
}

$from = "$dir/../vendor/phalcon/devtools/ide/3.4.5/Phalcon";
$to = "$dir/..";

$result = shell_exec("rm -r $to/Phalcon");
if ($result !== null) {
    echo "Fail run rm" . PHP_EOL;
    exit($result);
}

$result = shell_exec("cp -r $from $to");
if ($result !== null) {
    echo "Fail run cp" . PHP_EOL;
    exit($result);
}

$result = shell_exec("rm -r $from");
if ($result !== null) {
    echo "Fail run rm" . PHP_EOL;
    exit($result);
}

echo "Types successfully generated" . PHP_EOL;