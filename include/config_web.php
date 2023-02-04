
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$array_team = array(
    "A"=>"TEAM A",
    "B"=>"TEAM B"
);
$array_permiss =array(
    0=>"ADMIN",
    1=>"COASH",
    2=>"STAFF"
);
if($_SESSION['permission']==0 ||$_SESSION['permission']==2){
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
}else if($_SESSION['permission']==1){
    $array_menu_admin_main = array(
        "MENU" => array(
            0 => array(
                "url" => "report.php",
                "name" => "รายงานสรุป"
            )
        )
    );
}

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
            "url" => "report_match.php",
            "name" => "รายงานสถิติแมตช์"
        ),
        1 => array(
            "url" => "report_h2h_person.php",
            "name" => " รายงานสถิติ H2H ผู้เล่น"
        ),
        2 => array(
            "url" => "report_h2h_team.php",
            "name" => " รายงานสถิติ H2H ทีม"
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
        )
    )
);