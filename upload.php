<?php
include('smartling.php');
$en = readpo($argv[1]);
$in = readpo($argv[2]);
writepo(upload($en, $in));
