<?php
include('smartling.php');
$in = readpo($argv[1]);
writepo(download($in));
