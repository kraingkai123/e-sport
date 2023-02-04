<?php
include("../include/connect.php");
?>
<select class="js-example-basic-single" name="match_id" name="match_id" style="width: 50%">
    <option value="">SELECT MATCH</option>
    <?php
    $SQL = "SELECT * FROM matchs WHERE tour_id='".$_POST['val']."' ORDER BY date ASC";
    $query = mysqli_query($conn, $SQL);
    if ($query) {
        while ($rec_tour = mysqli_fetch_array($query)) {
            $PLAY_TEAM = get_team($rec_tour['team_A']) . " พบกับ " . get_team($rec_tour['team_B']);
    ?>
            <option value="<?php echo $rec_tour['match_id']; ?>" ><?php echo $PLAY_TEAM ?></option>
    <?php
        }
    }
    ?>
</select>