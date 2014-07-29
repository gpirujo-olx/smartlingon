<?php

include('po.php');

function init($en) {
    $out = array();
    foreach($en[''] as $msgid => $msgstr) {
        $out[$msgid][$msgstr] = '';
    }
    return $out;
}

function upload($en, $in) {
    $out = array();
    foreach($en[''] as $msgid => $msgstr) {
        $out[$msgid][$msgstr] = $in[''][$msgid];
    }
    return $out;
}

function download($in) {
    $out = array();
    foreach($in as $msgctxt => $msgids) {
        foreach ($msgids as $msgid => $msgstr) {
            $out[$msgctxt] = $msgstr;
        }
    }
    return array('' => $out);
}
