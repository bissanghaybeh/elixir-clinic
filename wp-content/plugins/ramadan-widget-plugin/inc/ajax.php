<?php

/**
 * Ajax functions.
 *
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

function bissan_send_ajax()
{
    $country = urlencode($_GET['country']);
    $url ="http://api.aladhan.com/v1/timingsByAddress?address=".$country;
    $result['imsak'] = '';
    $result['maghrib'] = '';
    $response = wp_remote_get($url);
    $responses = json_decode($response['body']);
    $result['html'] = '';
    $result['imsak'] = $responses->data->timings->Imsak;
    $result['maghrib'] = $responses->data->timings->Maghrib;
    $result['html'] = "<div class='imsak' style='direction:rtl'>الإمساك : "
        . $responses->data->timings->Imsak
        ."</div>"
        . "<div class='maghrib' style='direction:rtl'>الافطار : "
        . $responses->data->timings->Maghrib
        ."</div>";
    $result['html'] .= ob_get_contents();
    ob_end_clean();
    echo json_encode($result);
    die();
}

add_action('wp_ajax_bissan_send_ajax', 'bissan_send_ajax');
add_action('wp_ajax_nopriv_bissan_send_ajax', 'bissan_send_ajax');