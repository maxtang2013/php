<?php

$dir['root']               = "/home/yllfever/public_html/";
$dir['inc']                = "{$dir['root']}inc/";
$dir['profileImage']       = "{$dir['root']}media/images/profile/";
$dir['profileBackground']  = "{$dir['root']}media/images/profile_bg/";
$dir['profileSound']       = "{$dir['root']}media/sound/";
$dir['profileVideo']       = "{$dir['root']}media/video/";
$dir['gallery']            = "{$dir['root']}media/images/gallery/";
$dir['flags']              = "{$dir['root']}media/images/flags/";
$dir['blogImage']          = "{$dir['root']}media/images/blog/";
$dir['sdatingImage']       = "{$dir['root']}media/images/sdating/";
$dir['smiles']             = "{$dir['root']}media/images/smiles/";
$dir['banners']            = "{$dir['root']}media/images/banners/";
$dir['tmp']                = "{$dir['root']}tmp/";
$dir['cache']              = "{$dir['root']}cache/";
$dir['plugins']            = $dir['root'] . 'plugins/';
$dir['base']               = $dir['root'] . 'templates/base/';
$dir['classes']            = $dir['inc'] . 'classes/';

define('BX_DIRECTORY_PATH_INC', $dir['inc']);
define('BX_DIRECTORY_PATH_ROOT', $dir['root']);
define('BX_DIRECTORY_PATH_BASE', $dir['base']);
define('BX_DIRECTORY_PATH_CACHE', $dir['cache']);
define('BX_DIRECTORY_PATH_CLASSES', $dir['classes']);





define( 'BX_DOL_TABLE_MEDIA', '`media`'  );
define( 'BX_DOL_TABLE_MEDIA_RATING', '`media_rating`'  );
define( 'BX_DOL_TABLE_MEDIA_VOTING_TRACK', '`media_voting_track`'  );
define( 'BX_DOL_TABLE_PROFILES', '`Profiles`' );

$iProfileID = 5;
$sMediaType = 'photo';

$sQuery = "
            SELECT
                " . BX_DOL_TABLE_MEDIA . ".`med_id`,
                " . BX_DOL_TABLE_MEDIA . ".`med_prof_id`,
                " . BX_DOL_TABLE_MEDIA . ".`med_type`,
                " . BX_DOL_TABLE_MEDIA . ".`med_file`,
                " . BX_DOL_TABLE_MEDIA . ".`med_title`,
                " . BX_DOL_TABLE_MEDIA . ".`med_status`,
                " . BX_DOL_TABLE_MEDIA . ".`med_date`,
                " . BX_DOL_TABLE_MEDIA_RATING . ".`med_rating_count`,
                " . BX_DOL_TABLE_MEDIA_RATING . ".`med_rating_sum`,
                " . BX_DOL_TABLE_PROFILES . ".`PrimPhoto`
            FROM
                " . BX_DOL_TABLE_MEDIA . "
            INNER JOIN " . BX_DOL_TABLE_PROFILES . " ON " . BX_DOL_TABLE_MEDIA . ".`med_prof_id` = " . BX_DOL_TABLE_PROFILES . ".`ID`
            LEFT JOIN " . BX_DOL_TABLE_MEDIA_RATING . " ON " . BX_DOL_TABLE_MEDIA . ".`med_id` = " . BX_DOL_TABLE_MEDIA_RATING . ".`med_id`
            WHERE
                `med_prof_id` = '$iProfileID'
            AND `med_type` = '$sMediaType'
            ORDER BY `med_date` ASC
        ";

echo $sQuery;

?>
