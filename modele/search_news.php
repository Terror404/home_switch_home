<?php
$askLastAds=$DB->prepare('SELECT ad.id,ad.title,house.pictures, ad.date_begin, ad.date_end FROM ad,house WHERE ad.id_house=house.id ORDER BY id DESC');
$askLastAds->execute();

$askLast=$DB->prepare('SELECT house.id,house.title,house.pictures FROM house ORDER BY id DESC');
$askLast->execute();

