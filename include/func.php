<?php
function date2db($date)
{
    $ex = explode("/", $date);
    $date_return = $ex[2] . '-' . $ex[1] . '-' . $ex[0];
    return $date_return;
}
function db2date($date)
{
    $ex = explode("-", $date);
    //2022-01-02
    $date_return = $ex[2] . '/' . $ex[1] . '/' . $ex[0];
    return $date_return;
}
function get_tourname($tour_id)
{
    global $conn;
    $SQL = "SELECT tour_name FROM tournaments WHERE tour_id='" . $tour_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['tour_name'];
}

function get_team($team_id)
{
    global $conn;
    $SQL = "SELECT team_name FROM teams WHERE team_id='" . $team_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['team_name'];
}
function get_user($user_id)
{
    global $conn;
    $SQL = "SELECT CONCAT(fname,' ',lname) as fullname FROM users WHERE user_id='" . $user_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['fullname'];
}
function get_shcool_name($school_id='', $team_id = '')
{
    global $conn;
    if ($team_id != "") {
        $SQL = "SELECT school_id FROM teams WHERE team_id='" . $team_id . "'";
        $query = mysqli_query($conn, $SQL);
        $rec = mysqli_fetch_array($query);
        $school_id=$rec['school_id'];
    }
    $SQL = "SELECT school_name FROM schools WHERE school_id='" . $school_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['school_name'];
}

function get_hero($hero_id)
{
    global $conn;
    $SQL = "SELECT hero_name FROM heros WHERE hero_id='" . $hero_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['hero_name'];
}
function get_nickname($player_id)
{
    global $conn;
    $SQL = "SELECT ingame_name FROM players WHERE player_id='" . $player_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['ingame_name'];
}
function get_lane($lane_id)
{
    global $conn;
    $SQL = "SELECT name_lane FROM lanes WHERE lane_id='" . $lane_id . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    return $rec['name_lane'];
}
function check_count($sql){
    global $conn;
    
    $query = mysqli_query($conn, $sql);
    $rec = mysqli_fetch_array($query);
    return $rec['c'];
}