<?php

// Include database configuration file
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'ignite';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$value=$_GET['update'];
if($value==='false'){
$teamname = $_GET['updateteamname'];


$query = "SELECT * FROM semaphore WHERE TeamName = '$teamname'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$tno = $row["TeamNo"];
$tname = $row["TeamName"];
$clg = $row["CollegeName"];
$place = $row["Place"];
$leader = $row["LeaderName"];
$pno=$row['LeaderNo'];
$no = $row["NumberOfParticipants"];
$fee = $row["PaidRegistrationFee"];
$partici = $row["ParticipatedInPreviousSemaphore"];
$names = $row["ParticipantNames"];

$list=$names;
$names=str_replace("<br>"," ",$list);
}
else
{
            $tno=$_POST['teamNo'];
            $tn=$_POST['teamName'];
            $clg=$_POST['collegeName'];  
            $place=$_POST['place'];
            $leader=$_POST['leaderName'];
            $pno=$_POST['leaderNo'];
            $fee=$_POST['paidFee'];
            $partici=$_POST['previousParticipation'];
            $tot=$_POST['participantsNumber'];
            $list=$_POST['participantsList'];
            $list=str_replace(" ","<br>",$list);

            $updateQuery = "UPDATE semaphore SET
            TeamNo = '$tno',
            CollegeName = '$clg',
            
            Place = '$place',
            LeaderName = '$leader',
            NumberOfParticipants = '$tot',
            LeaderNo = '$pno',
            PaidRegistrationFee = '$fee',
            ParticipatedInPreviousSemaphore = '$partici',
            ParticipantNames = '$list'
            WHERE TeamName = '$tn'";
           


            $conn->query($updateQuery);
            echo"<script>alert('update succesfull');</script>";                   
                    echo"<script>window.location.href='viewreg.php';</script>";
    exit;

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>SEMAPHORE</title>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <script type="text/javascript">
                function onlychar() {
                var teamname = document.getElementById("teamName");
                var clgname = document.getElementById("collegeName");
                var leadername = document.getElementById("leaderName"); 
                var place = document.getElementById("place");

                let spcl = /[!,@,#,$,%,^,&,*,),(,?,~,_,+,{,|,-,=,},<,>,.]/;
                let num = /\d/; // Added the definition of num

                if (teamname.value.match(num)) {
                    teamname.setCustomValidity("Don't enter the numbers");
                } else if (teamname.value.match(spcl)) {
                    teamname.setCustomValidity("Don't enter the special characters");
                } else {
                    teamname.setCustomValidity("");
                }

                if (clgname.value.match(num)) {
                    clgname.setCustomValidity("Don't enter the numbers");
                } else if (clgname.value.match(spcl)) {
                    clgname.setCustomValidity("Don't enter the special characters");
                } else {
                    clgname.setCustomValidity("");
                }

                if (leadername.value.match(num)) {
                    leadername.setCustomValidity("Don't enter the numbers");
                } else if (leadername.value.match(spcl)) {
                    leadername.setCustomValidity("Don't enter the special characters");
                } else {
                    leadername.setCustomValidity("");
                }

                if (place.value.match(num)) {
                    place.setCustomValidity("Don't enter the numbers");
                } else if (place.value.match(spcl)) {
                    place.setCustomValidity("Don't enter the special characters");
                } else {
                    place.setCustomValidity("");
                }
            }


            function checkphn() {
                var phoneNumberInput = document.getElementById('leaderNo');
                var phoneNumber = phoneNumberInput.value+"";

                if (phoneNumber.length == 10) {
                    phoneNumberInput.setCustomValidity('');
                } else {
                    phoneNumberInput.setCustomValidity('Please enter a valid 10-digit phone number');
                }
            }

            </script>

</head>
<body>
    <div class="container">
        <nav id="slidebar">
            <ul>
                <li>
                    <a href="#" class="samca">
                        <img class="samcaimg" src="pic/samcalogo.jpeg">
                        <span class="mainitem">SAMCA</span>
                    </a>
                </li>

                <li>
                    <a href="semteamreg.php" class="samcaitem" id="teamreg">
                        <img src="pic/apply.png">
                        <span class="item">Team registration</span>
                    </a>
                </li>

                

                <li>
                    <a href="index.html" class="samcaitem" id="logoutitem">
                        <img src="pic/logout1.png">
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="main">
            <div class="topheading">
                <h1>SEMAPHORE</h1>
            </div>

            <div class="maincontainer">
                <div>
                    <h1 id="registrationheading">Team Registration</h1>
                </div>
                <form action="updateteam.php?update='true'" method="post">


                            <label for="teamNo">Team No:</label>
                            <input type="number" name="teamNo" class="tno" min="1" value="<?php echo $tno; ?>" required style="width: 150px;">
                        

                            <label for="teamName">Team Name:</label>
                            <input type="text" id="teamName" name="teamName" readonly title="cant update team name" value="<?php echo $tname; ?>" oninput=onlychar() required style="width: 150px;"><br>

                            <label for="collegeName">College Name:</label>
                            <input type="text" name="collegeName" id="collegeName" oninput=onlychar() value="<?php echo $clg; ?>" required style="width: 150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <label for="place">Place:</label>
                            <input type="text" name="place"  id="place" oninput=onlychar() value="<?php echo $place; ?>" required style="width: 150px;"><br>

                            <label for="leaderName">Leader Name:</label>
                            <input type="text" class="leader" id="leaderName" name="leaderName" value="<?php echo $leader; ?>"  oninput=onlychar() required style="width: 150px;">

                            <label for="contactNo">Contact No:</label>
                            <input type="number" id="leaderNo" name="leaderNo"  min="1" pattern="\d{10}" value="<?php echo $pno; ?>" title="Please enter a 10-digit phone number" oninput=checkphn() required style="width: 150px;"><br>







                    <!-- <label for="teamNo">Team No:</label>
                    <input type="number" name="teamNo" value="<?php echo $tno; ?>" style="width: 150px;">

                    <label for="teamName">Team Name:</label>
                    <input type="text" name="teamName" readonly oninput="onlychar()" value="<?php echo $tname; ?>" required style="width: 150px;"><br>

                    <label for="collegeName">College Name:</label>
                    <input type="text" name="collegeName" oninput="onlychar()" value="<?php echo $clg; ?>" required style="width: 150px;">

                    <label for="place">Place:</label>
                    <input type="text" name="place" oninput="onlychar()" value="<?php echo $place; ?>" required style="width: 150px;"><br>

                    <label for="leaderName">Leader Name:</label>
                    <input type="text" name="leaderName" oninput="onlychar()" value="<?php echo $leader; ?>" required style="width: 150px;">

                    <label for="contactNo">Contact No:</label>
                    <input type="text" name="leaderNo" oninput="checkphn()" value="<?php echo $pno; ?>" required style="width: 150px;"><br> -->

                    <label for="paidFee">Paid Registration Fee:</label>
                    <label for="previousParticipation">Participated in Previous Semaphore:</label>

                    <?php
                    if ($row['PaidRegistrationFee'] == "Yes") {
                        echo '
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="paidYes" name="paidFee" value="Yes" checked="true">Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="paidNo" name="paidFee" value="No"> No
                                </label>
                            </div>';
                    } else if ($row['PaidRegistrationFee'] == "No") {
                        echo '
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="paidYes" name="paidFee" value="Yes">Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="paidNo" name="paidFee" value="No" checked="true"> No
                                </label>
                            </div>';
                    } else {
                        echo '
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="paidYes" name="paidFee" value="Yes">Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="paidNo" name="paidFee" value="No"> No
                                </label>
                            </div>';
                    }
                    ?>

                    

                    <?php
                    if ($row['ParticipatedInPreviousSemaphore'] == "Yes") {
                        echo '
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="previousYes" name="previousParticipation" value="Yes" checked="true">Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="previousNo" name="previousParticipation" value="No"> No
                                </label>
                            </div>';
                    } else if ($row['ParticipatedInPreviousSemaphore'] == "No") {
                        echo '
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="previousYes" name="previousParticipation" value="Yes">Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="previousNo" name="previousParticipation" value="No" checked="true"> No
                                </label>
                            </div>';
                    } else {
                        echo '
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="previousYes" name="previousParticipation" value="Yes">Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="previousNo" name="previousParticipation" value="No"> No
                                </label>
                            </div>';
                    }
                    ?>



                            <label for="participantsNumber"> <span class="no">No.of Participants:</span></label>
                            <input type="number" name="participantsNumber"  value="<?php echo $no; ?>" min="1" required style="width: 110px;">

                            <label for="participantsList">Participant Names:</label><br>
                            <textarea name="participantsList"  required><?php echo $names; ?></textarea><br>

                            <button type="submit" class="btn" value="register" name="register" >Update</button>
                            <button type="reset" value="Reset" class="btn" id="resetbtn" >Reset</button>


                    
                </form>
                <!-- <a href='viewreg.php' > <button class="btn" style="margin-top:-320px;margin-right:-450px;"  name="cancelbtn" >Cancel</button></a> -->

                <form action="viewreg.php" method="post">
                    
                </form>
            </div>
        </section>
    </div>
</body>
</html>
