
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
                "icon" =>'<i class="fa fa-solid fa-trophy fa-2x" aria-hidden="true" style="color:gold"></i>'
            ),
            1 => array(
                "url" => "user.php",
                "name" => "ข้อมูลยูสเซอร์/แอดมิน",
                "icon" =>'<i class="fa fa-solid fa-user-shield fa-2x" aria-hidden="true" style="color:green"></i>'
            ),
            2 => array(
                "url" => "player.php",
                "name" => "นักกีฬา",
                "icon" =>'<i class="fa fa-solid fa-user fa-2x" aria-hidden="true" style="color:#4B0082"></i>'
            ),
            3 => array(
                "url" => "setting.php",
                "name" => "ตั้งค่า",
                "icon" =>'<i class="fa fa-light fa-bars fa-2x" aria-hidden="true" style="color:#0000FF"></i>'
            ),
            4 => array(
                "url" => "report.php",
                "name" => "รายงานสรุป",
                "icon" =>'<i class="fa fa-light fa-clipboard fa-2x" aria-hidden="true" style="color:#8B4513"></i>'
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
            "icon" =>'<i class="fa fa-solid fa-ghost fa-2x" aria-hidden="true" style="color:#000000"></i>'
        ),
        1 => array(
            "url" => "school.php",
            "name" => "ข้อมูลสถานศึกษา",
            "icon" =>'<i class="fa fa-solid fa-school fa-2x" aria-hidden="true" style="color:#66FF99"></i>'
        ),
        2 => array(
            "url" => "team.php",
            "name" => "ข้อมูลทีม",
            "icon" =>'<i class="fa fa-solid fa-users fa-2x" aria-hidden="true" style="color:red"></i>'
        ),
       
        4 => array(
            "url" => "setup_lan.php",
            "name" => "ข้อมูลเลนภายในเกมส์",
            "icon" =>'<i class="fa fa-solid fa-map fa-2x" aria-hidden="true" style="color:#483D8B"></i>'
        )
    )
);
// report
$array_menu_admin_report = array(
    "MENU" => array(
        0 => array(
            "url" => "report_match.php",
            "name" => "รายงานสถิติทัวร์นาเมนต์",
            "icon" =>'<i class="fa fa-solid fa-print fa-2x" aria-hidden="true" style="color:#FF0000"></i>'
        ),
        1 => array(
            "url" => "report_h2h_person.php",
            "name" => " รายงานสถิติ H2H ผู้เล่น",
            "icon" =>'<i class="fa fa-solid fa-print fa-2x" aria-hidden="true" style="color:#FFC0CB"></i>'
        ),
        2 => array(
            "url" => "report_h2h_team.php",
            "name" => " รายงานสถิติ H2H ทีม",
            "icon" =>'<i class="fa fa-solid fa-print fa-2x" aria-hidden="true" style="color:#2E8B57"></i>'
        )
    )
);

//matching
$array_menu_admin_maiching = array(
    "MENU" => array(
        0 => array(
            "url" => "tornament.php",
            "name" => "ทัวนาเม้น",
            "icon" =>'<i class="fa fa-solid fa-chess-rook fa-2x" aria-hidden="true" style="color:FF1493"></i>'
        ),
        1 => array(
            "url" => "match.php",
            "name" => "แมต",
            "icon" =>'<i class="fa fa-solid fa-chess fa-2x" aria-hidden="true" style="color:green"></i>'
        ),
        2 => array(
            "url" => "game.php",
            "name" => "เกมส์",
            "icon" =>'<i class="fa fa-solid fa-gamepad fa-2x" aria-hidden="true" style="color:red"></i>'
        )
    )
);