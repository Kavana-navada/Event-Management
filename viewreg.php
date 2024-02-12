<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="viewregcss.css">
            <title>SEMAPHORE</title>
        </head>
        <body>
        <div class="container" >
        
            <section class="main">
                <div class="topheading">
                    <h1> SEMAPHORE</h1>
                    
                </div>
                
            </section>     
        </div>

        <section class="main">
                <div class="maintop">
                     
                </div>
                <div class="form1" id="form1">
                    <br><br><br><br><br>
                    <button class="btn" id="btnback" onclick="window.location.href='semteamreg.php'">BACK</button>        
                    <div class="headpart">
                        <h1 id="detailheading">REGISTERD TEAM </h1>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="table">
                        <table>
                            <tr id="header">
                                <th>Team No</th>
                                <th>Team Name</th>
                                <th>College Name</th>
                                <th>Place</th>
                                <th>Leader Name</th>
                                <th>Contact No</th>
                                <th>No.of participants</th>
                                <th>Paid Registeration Fee</th>
                                <th>Participated in Previous semaphore</th>
                                <th>Participants Name</th>
                                <th>Operation</th>
                            </tr>
                            <?php
                                @$con=new mysqli('localhost','root','','ignite');
                                    
                                    
                                if(mysqli_connect_errno())
                                {
                                    echo"could not connect";
                                }
                                else
                                {
                                    $existqry="SELECT * FROM semaphore order by TeamNo";
                                    $rslt=mysqli_query($con,$existqry);
                                    $num=mysqli_num_rows($rslt);
                                
                                    while($r=$rslt->fetch_assoc())
                                    {
                                        $teamname=$r['TeamName'];
                                   echo"
                                    <tr>
                                        <td>".$r['TeamNo']."</td>
                                        <td>".$r['TeamName']."</td>
                                        <td>".$r['CollegeName']."</td>
                                        <td>".$r['Place']."</td>
                                        <td>".$r['LeaderName']."</td>
                                        <td>".$r['LeaderNo']."</td>
                                        <td>".$r['NumberOfParticipants']."</td>
                                        <td>".$r['PaidRegistrationFee']."</td>
                                        <td>".$r['ParticipatedInPreviousSemaphore']."</td>
                                        <td>".$r['ParticipantNames']."</td>
                                        <td>
                                        <button class='updelbtn' id='upbtn'><a href='updateteam.php?updateteamname=".$teamname."&update=false'>Update</a></button><br>
                                       
                                       
                                        <!--<button class='updelbtn'id='delbtn' data-teamname='".$teamname."'>Delete</button>-->
                                        <button  id='delbtn' class='updelbtn deletebutton' data-teamname='".$teamname."'>Delete</button>

                                        
                                        
                                        </td>
                                    </tr>";
                                    } 
                                    
                                }
                        echo"</table>"; 
                             
                            ?>
                    </div>
                    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.querySelectorAll('.deletebutton');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault(); 

                var teamName = button.getAttribute('data-teamname');
                var confirmDelete = confirm("Are you sure you want to delete the team " + teamName + "?");

                if (confirmDelete) {
                    window.location.href = 'deleteteam.php?deleteteamname=' + teamName;
                } else {
                    return false;
                }
            });
        });
    });
</script>



                </div>     
           </section>
    </body>
</html>

