
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
                "name" => "การแข่งขัน",
                "icon" =>'<i class="fa fa-compress fa-2x" aria-hidden="true" style="color:green"></i>'
            ),
            1 => array(
                "url" => "user.php",
                "name" => "ผู้ใช้งาน",
                "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
            ),
            2 => array(
                "url" => "player.php",
                "name" => "ผู้เล่น",
                "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
            ),
            3 => array(
                "url" => "setting.php",
                "name" => "ตั้งค่า",
                "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
            ),
            4 => array(
                "url" => "report.php",
                "name" => "รายงานสรุป",
                "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
            )
        )
    );
}else if($_SESSION['permission']==1){
    $array_menu_admin_main = array(
        "MENU" => array(
            0 => array(
                "url" => "report.php",
                "name" => "รายงานสรุป",
                "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
            )
        )
    );
}

//ตั้งค่า

$array_menu_admin_setting = array(
    "MENU" => array(
        0 => array(
            "url" => "hero.php",
            "name" => "ข้อมูลฮีโร่ (HERO)",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
        1 => array(
            "url" => "school.php",
            "name" => "ข้อมูลสถานศึกษา",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
        2 => array(
            "url" => "team.php",
            "name" => "ข้อมูลทีม",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
       
        4 => array(
            "url" => "setup_lan.php",
            "name" => "ข้อมูลเลนภายในเกมส์",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        )
    )
);
// report
$array_menu_admin_report = array(
    "MENU" => array(
        0 => array(
            "url" => "report_match.php",
            "name" => "รายงานสถิติแมตช์",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
        1 => array(
            "url" => "report_h2h_person.php",
            "name" => " รายงานสถิติ H2H ผู้เล่น",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
        2 => array(
            "url" => "report_h2h_team.php",
            "name" => " รายงานสถิติ H2H ทีม",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        )
    )
);

//matching
$array_menu_admin_maiching = array(
    "MENU" => array(
        0 => array(
            "url" => "tornament.php",
            "name" => "ทัวนาเม้น",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
        1 => array(
            "url" => "match.php",
            "name" => "แมต",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        ),
        2 => array(
            "url" => "game.php",
            "name" => "เกมส์",
            "icon" =>'<i class="fa fa-compress fa-2x text-gray-300" aria-hidden="true"></i>'
        )
    )
);