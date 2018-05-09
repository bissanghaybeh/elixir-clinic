<?php

/**
 * Ajax functions.
 *
 * @author   Bissan Ghaybeh <bissan.gh@gmail.com>
 */

function bissan_send_ajax()
{
    var_dump('here');die;
    $country = urlencode($_GET['country']);
//    $url = "http://api.aladhan.com/v1/timingsByCity?city=".$city."&country=".$country."&method=8";
//    $url ="http://muslimsalat.com/".$country.".json?key=api_key";
    $url ="http://api.aladhan.com/v1/timingsByAddress?address=".$country;
    $response = wp_remote_get($url);
    $responses = json_decode($response['body']);
    var_dump($responses);die;
    $result['html'] = '';
    ob_start();

    $result['html'] .= ob_get_contents();
    ob_end_clean();
    echo json_encode($result);
    die();
}

add_action('wp_ajax_bissan_send_ajax', 'bissan_send_ajax');
add_action('wp_ajax_nopriv_bissan_send_ajax', 'bissan_send_ajax');