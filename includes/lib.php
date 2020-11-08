<?php

function request($url)
{
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $data = deleteCurlStatusOutput(curl_exec($ch));

    curl_close($ch);

    return $data;
}

function deleteCurlStatusOutput($html)
{
    return substr($html, -1) == "1" ? substr($html, 0, -1) : $html;
}