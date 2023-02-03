<script src="js/func.js"></script>
<?php
$array_menu_admin_main = array(
    "MENU" => array(
        0 => array(
            "url" => "matching.php",
            "name" => "การแข่งขัน"
        ),
        1 => array(
            "url" => "user.php",
            "name" => "ผู้ใช้งาน"
        ),
        2 => array(
            "url" => "player.php",
            "name" => "ผู้เล่น"
        ),
        3 => array(
            "url" => "setting.php",
            "name" => "ตั้งค่า"
        ),
        4 => array(
            "url" => "report.php",
            "name" => "รายงานสรุป"
        )
    )
);
//ตั้งค่า

$array_menu_admin_setting = array(
    "MENU" => array(
        0 => array(
            "url" => "hero.php",
            "name" => "ข้อมูลฮีโร่ (HERO)"
        ),
        1 => array(
            "url" => "school.php",
            "name" => "ข้อมูลสถานศึกษา"
        ),
        2 => array(
            "url" => "team.php",
            "name" => "ข้อมูลทีม"
        ),
        3 => array(
            "url" => "player.php",
            "name" => "ข้อมูลนักกีฬา"
        ),
        4 => array(
            "url" => "setup_lan.php",
            "name" => "ข้อมูลเลนภายในเกมส์"
        )
    )
);
// report
$array_menu_admin_report = array(
    "MENU" => array(
        0 => array(
            "url" => "report_static_team.php",
            "name" => "รายงานทีม"
        )
    )
);

//matching
$array_menu_admin_maiching = array(
    "MENU" => array(
        0 => array(
            "url" => "tornament.php",
            "name" => "ทัวนาเม้น"
        ),
        1 => array(
            "url" => "match.php",
            "name" => "แมต"
        ),
        2 => array(
            "url" => "game.php",
            "name" => "เกมส์"
        ),
        3 => array(
            "url" => "game_detail.php",
            "name" => "ข้อมูลผู้ลงแข่ง"
        )
    )
);