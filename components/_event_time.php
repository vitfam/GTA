<?php
date_default_timezone_set('Asia/Calcutta');

$currentTime = date('Y-m-d H:i:s');
$eventTime = date('2022-02-06 16:30:00');

$finish = false;
$break = false;
$listing = false; // for both listing and dealer
$sell = false;
$catalog = false;
$accessory = false;
$bonus = false;
$sale = false;
$r = false;
$round = false;

function depreciation ($r){
    require "./components/_depreciation.php";
}

function isBetween($curr, $start, $end, $eventTime)
{
    $start = date('Y-m-d H:i:s', strtotime('+' . $start . ' minutes', strtotime($eventTime)));
    $end = date('Y-m-d H:i:s', strtotime('+' . $end . ' minutes', strtotime($eventTime)));
    return ($curr > $start && $curr < $end) ? true : false;
}

if ($currentTime < date('Y-m-d H:i:s', strtotime('+0 minutes', strtotime($eventTime)))) {
    header("Location: ./");
}
if(isBetween($currentTime, 0, 4, $eventTime)){
    $catalog = true;
}

if(isBetween($currentTime, 4, 6, $eventTime)){
    $round = 'SUV';
}
if(isBetween($currentTime, 6, 8, $eventTime)){
    $accessory = true;
}
if(isBetween($currentTime, 8, 10, $eventTime)){
    depreciation(1);
    $sell = true;
}
if(isBetween($currentTime, 10, 12, $eventTime)){
    $break = true;
}

if(isBetween($currentTime, 12, 14, $eventTime)){
    $round = 'HATCHBACK';
}
if(isBetween($currentTime, 14, 16, $eventTime)){
    $accessory = true;
}
if(isBetween($currentTime, 16, 18, $eventTime)){
    depreciation(2);
    $sell = true;
}
if(isBetween($currentTime, 18, 20, $eventTime)){
    $break = true;
}

if(isBetween($currentTime, 20, 22, $eventTime)){
    $round = 'SEDAN';
}
if(isBetween($currentTime, 22, 24, $eventTime)){
    $accessory = true;
}
if(isBetween($currentTime, 24, 26, $eventTime)){
    depreciation(3);
    $sell = true;
}
if(isBetween($currentTime, 26, 28, $eventTime)){
    $break = true;
}

if(isBetween($currentTime, 28, 30, $eventTime)){
    $round = 'SPORT';
}
if(isBetween($currentTime, 30, 32, $eventTime)){
    $accessory = true;
}
if(isBetween($currentTime, 32, 34, $eventTime)){
    depreciation(4);
    $sell = true;
}
if(isBetween($currentTime, 34, 36, $eventTime)){
    $break = true;
}

if(isBetween($currentTime, 36, 38, $eventTime)){
    $round = 'VINTAGE';
}
if(isBetween($currentTime, 38, 40, $eventTime)){
    $accessory = true;
}
if(isBetween($currentTime, 40, 42, $eventTime)){
    depreciation(5);
    $sell = true;
}
if(isBetween($currentTime, 42, 44, $eventTime)) {
    $bonus = true;
}

if(isBetween($currentTime, 44, 45, $eventTime)) {
    $sale = true;
}

if(isBetween($currentTime, 45, 60, $eventTime)) {
    $finish = true;
}
if ($currentTime > date('Y-m-d H:i:s', strtotime('+60 minutes', strtotime($eventTime)))) {
    header("Location: ./");
}