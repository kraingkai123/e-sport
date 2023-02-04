<?php
include("../include/connect.php");
?>
<select class="js-example-basic-single" name="player_id" name="player_id" style="width: 70%">
    <option value="">SELECT PLAYER</option>
    <?php
    $SQL = "SELECT * FROM players WHERE team_id='".$_POST['id']."' AND player_id NOT IN(SELECT player_id FROM match_player_details WHERE m_detail_id ='".$_POST['m_detail_id']."') ORDER BY player_id ASC";
    $query = mysqli_query($conn, $SQL);
    if ($query) {
        while ($rec_tour = mysqli_fetch_array($query)) {
    ?>
            <option value="<?php echo $rec_tour['player_id']; ?>" ><?php echo $rec_tour['ingame_name'] ?></option>
    <?php
        }
    }
    ?>
</select>