<?php

function readpo($filename, $limit = -1) {
    $strings = array();
    $msgctxt = $msgid = $msgstr = '';
    foreach(file($filename) as $line) {

        $line = trim($line);
        if ($line[0] == '#') continue;

        if (strlen($line) == 0) {
            if (empty($msgid)) continue;
            if (!isset($strings[$msgctxt])) $strings[$msgctxt] = array();
            $strings[$msgctxt][$msgid] = $msgstr;
            $msgctxt = $msgid = $msgstr = '';
            if (!--$limit) break;
            continue;
        }

        if (preg_match('/(msg(?:ctxt|id|str)) "(.*)"\s*$/', $line, $matches)) {
            ${$matches[1]} = stripslashes($matches[2]);
        }

    }
    return $strings;
}

function writepo($strings) {
    foreach ($strings as $msgctxt => $msgids) {
        if (!empty($msgctxt)) printf("msgctxt \"%s\"\n", addslashes($msgctxt));
        foreach ($msgids as $msgid => $msgstr) {
            printf("msgid \"%s\"\nmsgstr \"%s\"\n\n", addslashes($msgid), addslashes($msgstr));
        }
    }
}
