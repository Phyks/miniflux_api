<?php
// TODO:
// * Empty entries
// * API rate-limited?

require("config.php");

require __DIR__ . '/vendor/autoload.php';

use JsonRPC\Client;

try {
// Create API connection
$client = new Client($BASE_MINIFLUX_URL.'/jsonrpc.php');
$client->authentication('admin', $API_PASSWORD);


// Handle mark as read
if (!empty($_GET["entry"])) {
    $client->execute('item.mark_as_read', ['item_id'=>$_GET['entry']]);
    exit('{}');
}

if (!empty($_GET["all"])) {
    $client->execute('item.mark_all_as_read');
    exit('{}');
}


// Fetch data
$feeds = $client->execute('feed.list');
$entries = [];

foreach ($feeds as $feed) {
    // Update old feeds
    if (time() - $feed["last_checked"] >= 3600) {
        $client->execute('feed.update', ["feed_id"=>$feed["id"]]);
    }
}

// Fetch entries
$entries = $client->execute('item.list_unread');


// Init RainTPL
if (file_exists("tmp/") && is_writable("tmp/")) {
    require_once('inc/rain.tpl.class.php');
    RainTPL::$tpl_dir = "tpl/zen/";
    RainTPL::$cache_dir = "tmp/";
    RainTPL::$base_url = $BASE_URL;
    $tpl = new RainTPL;
    $tpl->assign('start_generation_time', microtime(true), RainTPL::RAINTPL_IGNORE_SANITIZE);
}

function get_feed_from_entry($value, $feeds)
{
    foreach ($feeds as $feed) {
        if ($value["feed_id"] == $feed["id"]) {
            return $feed;
        }
    }
    return null;
}

function get_entry_link($value)
{
    return $value["url"];
}

function format_date($timestamp)
{
    $now = time();
    $diff = $now - $timestamp;
    if ($diff < 60) {
        return $diff.'s ago';
    } elseif ($diff < 300) {
        return round($diff / 60).'min ago';
    } elseif ($diff < 3600) {
        return (round($diff / 300) * 5).'min ago';
    } elseif (floor($now/86400) == floor($timestamp/86400)) {
        return 'Today, '.date('H:i', $timestamp);
    } elseif (floor($now/86400) == floor($timestamp/86400) + 1) {
        return 'Yesterday, '.date('H:i', $timestamp);
    } elseif (date('Y:W', $now) == date('Y:W', $timestamp)) {
        return date('l, H:i', $timestamp);
    } elseif (date('Y', $now) == date('Y', $timestamp)) {
        return date('F d, H:i', $timestamp);
    } else {
        return date('F d, Y, H:i', $timestamp);
    }
}

$tpl->assign('entries', $entries);
$tpl->assign('feeds', $feeds);

$tpl->draw('index');
} catch (Exception $e) {
    header("Refresh:0");
}
