<?php

use UxWeb\SweetAlert\SweetAlertNotifier;

if (!function_exists('shorter')) {

    function shorter($text, $length): string
    {
        if (strlen($text) > $length) {
            $new_text = mb_substr($text, 0, $length);
            $new_text = trim($new_text);
            return $new_text . "...";
        }
        return $text;
    }
}

if (!function_exists('msg')) {

    function msg($text,$status, $title = null): SweetAlertNotifier
    {
      return  alert()->$status($text,$title);
    }
}
