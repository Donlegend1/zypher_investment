<?php

if (!function_exists('formatDateTime')) {
    function formatDateTime($dateTime)
    {
        return \Carbon\Carbon::parse($dateTime)->format('jS F Y \a\t h:ia');
    }
}