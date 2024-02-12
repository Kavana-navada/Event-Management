<!DOCTYPE html>
    <html>
        <head>
            <title>SEMAPHORE</title>
            <link rel="stylesheet" type="text/css" href="maincss.css">
            <script type="text/javascript">
                function onlychar() {
    var teamname = document.getElementById("teamName");
    var clgname = document.getElementById("collegeName");
    var leadername = document.getElementById("leaderName"); // Corrected the ID
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
        <div class="container" >
            <nav id="slidebar" >
                <ul>
                <li>
                    <a href="#" class="samca">
                    <img class="samcaimg" src="pic/samcalogo.jpeg" >
                    <span class="mainitem">SAMCA</span>
                    </a>
                </li>

                <li>
                    <a href="semteamreg.php" class="samcaitem" id="teamreg">
                    <img src="pic/apply.png" >
                    <span class="item">Team registration</span>
                    </a>
                </li>


                <!-- <li>
                    <a href="" class="samcaitem" id="stud">
                    <img src="pic/event.png " >
                    <span class="item">Event registration</span>
                    </a>
                </li> -->
                
                <li>
                    <a href="index.html" class="samcaitem" id="logoutitem" >
                    <img src="pic/logout1.png" >
                    <span class="item">Logout</span>
                    </a>
                </li>
                </ul>
            </nav>
            <section class="main">
                <div class="topheading">
                    <h1> SEMAPHORE</h1>
                    
                </div>



                <div class="maincontainer">
                    
                        <div class="">
                            <h1 id="registrationheading">Team Registration</h1>
                        </div>
                
                        <form action="inforeg.php" method="post">
                            <label for="teamNo">Team No:</label>
                            <input type="number" name="teamNo" class="tno" min="1" required style="width: 150px;">
                        

                            <label for="teamName">Team Name:</label>
                            <input type="text" id="teamName" name="teamName"  oninput=onlychar() required style="width: 150px;"><br>

                            <label for="collegeName">College Name:</label>
                            <input type="text" id="collegeName" name="collegeName" oninput=onlychar() required style="width: 150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <label for="place">Place:</label>
                            <input type="text" name="place" id="place"  oninput=onlychar() required style="width: 150px;"><br>

                            <label for="leaderName">Leader Name:</label>
                            <input type="text" class="leader"id="leaderName" name="leaderName"  oninput=onlychar() required style="width: 150px;">

                            <label for="contactNo">Contact No:</label>
                            <input type="number" id="leaderNo" name="leaderNo" pattern="\d{10}" title="Please enter a 10-digit phone number" oninput="checkphn()" required style="width: 150px;"><br>

                            <div id="gender-box">
                            <label for="paidFee"><span class="rb1">Paid Registration Fee:</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                            <label for="previousParticipation">Participated in Previous Semaphore:</label>
                            <div class="radio-buttons">
                                <label for="paidYes">
                                    <input type="radio" id="paidYes" name="paidFee" value="Yes" >Yes
                                </label>
                                <label for="paidNo">
                                    <input type="radio" id="paidNo" name="paidFee" value="No"> No
                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                          
                                <label for="previousYes">
                                    <input type="radio" id="previousYes" name="previousParticipation" value="Yes" > Yes
                                </label>
                                <label for="previousNo">
                                    <input type="radio" id="previousNo" name="previousParticipation" value="No"> No
                                </label>
                            </div>
               
            

                            <label for="participantsNumber"> <span class="no">No.of Participants:</span></label>
                            <input type="number" name="participantsNumber"  min="1" required style="width: 110px;">

                            <label for="participantsList">Participant Names:</label><br>
                            <textarea name="participantsList"  required></textarea><br>

                            <button type="submit" class="btn" value="register" name="register" >Register</button>
                            <button type="reset" value="Reset" class="btn" id="resetbtn" >Reset</button>
                            
                        </form>

                    <form action="viewreg.php" method="post">
                        <button type="submit" class="btn" id="viewbtn" onclick="window.location.href='viewreg.php'">View Details</button>
                        
                    </form>
                </div>



                
            </section>     
        </div>
    </body>
</html>

