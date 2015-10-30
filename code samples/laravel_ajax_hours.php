<?php
/**
 * Created by : Mike Kuykendall
 * Date: 10/30/15
 * Time: 11:18 AM
 */

$date_array = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
//Get office hours fromt string
preg_match_all("/(\w+day) ([0-9]{0,2}):([0-9]{0,2})(AM|PM) - ([0-9]{0,2}):([0-9]{0,2})(AM|PM)\r\n|\w+ (Closed)\r\n|(Office Open 24 Hours, 7 Days a Week)/", $facility->office_hours, $hours);

//Get access hours fromt string
preg_match_all("/(\w+day) ([0-9]{0,2}):([0-9]{0,2})(AM|PM) - ([0-9]{0,2}):([0-9]{0,2})(AM|PM)\r\n|\w+ (Closed)\r\n|(Accessible 24 Hours, 7 Days a Week)/", $facility->access_hours, $ahours);

$js_ahours = json_encode($ahours);

//Additional office hours info deliniated by <br />INFO<br />
preg_match_all("/<br \/>([\s\S]*?)<br \/>/", $facility->office_hours, $hoursextra);

//Additional access hours info deliniated by <br />INFO<br />
preg_match_all("/<br \/>([\s\S]*?)<br \/>/", $facility->access_hours, $accessextra);


//If array [9][0] is NOT Closed
if (isset($hours[9][0]) && $hours[9][0] == "") {
    $js_hours = json_encode($hours);
    for ($i = 0; $i <= 6; $i++) {
        if (isset($hours[1][$i]) && $hours[8][$i] != 'Closed') {
            echo "<strong id='hoursdisplay'>" . $hours[1][$i] . "</strong>"; ?>
            <?php echo $hours[2][$i] ?>:<?php echo $hours[3][$i] ?><?php echo $hours[4][$i] ?> - <?php echo $hours[5][$i] ?>:<?php echo $hours[6][$i] ?><?php echo $hours[7][$i] ?>
            <br/>
        <?php } else {
            echo "<strong id='hoursdisplay'>" . ucwords($date_array[$i]) . "</strong> Closed<br />";

        }
    }
    //If [9][0] is not empty (must be 'Closed')
} elseif (isset($hours[9][0])) {
    echo $hours[9][0];
    $js_hours = $hours[9][0];
}

echo "<br />";

//If office hours additional info, strips tags, print
if (isset($hoursextra[1][0]) && $hoursextra[1][0] != '') {
    $hoursextra2 = strip_tags($hoursextra[1][0]);
    echo "<strong>" . $hoursextra2 . "</strong><br /><br />";
} else {
    $hoursextra2 = '';
}

//If access hours additional info, strip tags
if (isset($accessextra[1][0])) {
    $accessextra2 = strip_tags($accessextra[1][0]);
} else {
    $accessextra2 = '';
}
 ?>

<script>
    $(window).ready(function () {

            <?php if(isset($js_hours) && $js_hours !== "Office Open 24 Hours, 7 Days a Week<br>") { ?>var hours = <?php print $js_hours; ?>;
        var open247 = '';
        <?php } elseif(isset($js_hours)) { ?>
        hours = '<?php print $js_hours ?>';
        var open247 = 1;
        <?php } else { ?>hours = '';
        <?php } ?>
        var ahours = <?php print $js_ahours ?>;

        <?php if(isset($ahours[9][0])) { ?>
        var access247 = '<?php print $ahours[9][0] ?>';
        <?php } ?>

        var hoursextra2 = '<?php print $hoursextra2 ?>';
        var accessextra2 = '<?php print $accessextra2 ?>';

        var daysOfTheWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        labels = [];

        if (open247 == '') {
            labels.push('office');
        }

        if (access247 == '') {
            labels.push('access');
        }

        //Only loop through 'office' or 'access' if NOT 24/7
        $.each(labels, function (i, val) {

            for (var index = 0; index < daysOfTheWeek.length; index++) {

                console.log(val);

                var closed = 'FALSE';

                if (val == 'office') {
                    var openhour = hours[2][index];
                    var openmin = hours[3][index];
                    var openampm = hours[4][index];

                    var closehour = hours[5][index];
                    var closemin = hours[6][index];
                    var closeampm = hours[7][index];

                    if (hours[8][index] == 'Closed') {
                        closed = 'TRUE';
                    }

                } else if (val == 'access') {

                    var openhour = ahours[2][index];
                    var openmin = ahours[3][index];
                    var openampm = ahours[4][index];

                    var closehour = ahours[5][index];
                    var closemin = ahours[6][index];
                    var closeampm = ahours[7][index];

                    if (ahours[8][index] == 'Closed') {
                        closed = 'TRUE';
                    }
                }

                console.log(hours);

                //If 'Closed' NOT found, set hours, else check 'Open" box
                if (closed == 'FALSE') {

                    $('#' + daysOfTheWeek[index] + '-' + val + '-open-hour').val(openhour);
                    $('#' + daysOfTheWeek[index] + '-' + val + '-open-minute').val(openmin);
                    $('#' + daysOfTheWeek[index] + '-' + val + '-open-ampm').val(openampm);

                    $('#' + daysOfTheWeek[index] + '-' + val + '-close-hour').val(closehour);
                    $('#' + daysOfTheWeek[index] + '-' + val + '-close-minute').val(closemin);
                    $('#' + daysOfTheWeek[index] + '-' + val + '-close-ampm').val(closeampm);
                } else {
                    $('#' + daysOfTheWeek[index] + '-' + val + '-open').attr('checked', false);

                }
            }
        });

        //Check if office open 24/7
        if (open247) {
            $('#office-247').attr('checked', true);

        }

        //Check if access open 24/7
        if (access247) {
            $('#access-247').attr('checked', true);

        }

        //Add additional office hours info to input box for update/correction
        if (hoursextra2 != '') {
            $('#hoursextra').val(hoursextra2);

        }

        //Add additional access hours info to input box for update/correction
        if (accessextra2 != '') {
            $('#accessextra').val(accessextra2);

        }


    });
</script>