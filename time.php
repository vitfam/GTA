<?php
date_default_timezone_set('Asia/Calcutta');

$currentTime = date('Y-m-d H:i:s');
$eventTime = date('2020-11-21 17:00:00');
$intro=false;
$break=false;
$finish=false;
$round1=false;
$round2=false;
$round3=false;
$round4=false;
$round5=false;
if($currentTime<date('Y-m-d H:i:s',strtotime('+0 minutes',strtotime($eventTime))))
{
    $intro=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+0 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+8 minutes',strtotime($eventTime))))
{
    $round1=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+8 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($eventTime))))
{
    $break==true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+18 minutes',strtotime($eventTime))))
{
    $round2=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+18 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+20 minutes',strtotime($eventTime))))
{
    $break=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+20 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+28 minutes',strtotime($eventTime))))
{
    $round3=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+28 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($eventTime))))
{
    $break=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('30 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+38 minutes',strtotime($eventTime))))
{
    $round4=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+38 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+40 minutes',strtotime($eventTime))))
{
    $break=true;
}
if($currentTime>=date('Y-m-d H:i:s',strtotime('+40 minutes',strtotime($eventTime))) && $currentTime<date('Y-m-d H:i:s',strtotime('+48 minutes',strtotime($eventTime))))
{
    $round5=true;
}
if($currentTime>date('Y-m-d H:i:s',strtotime('+48 minutes',strtotime($eventTime))))
{
    $finish=true;
}

?>
