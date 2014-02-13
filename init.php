<?php
include('smartling.php');
$en = readpo($argv[1]);
writepo(init($en));
