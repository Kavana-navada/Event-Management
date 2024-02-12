<?php
    if (isset($_POST['register']))
    {           
            $tno=$_POST['teamNo'];
            $tname=$_POST['teamName'];
            $clg=$_POST['collegeName'];  
            $place=$_POST['place'];
            $leader=$_POST['leaderName'];
            $phn=$_POST['leaderNo'];
            $fee=$_POST['paidFee'];
            $partici=$_POST['previousParticipation'];
            $tot=$_POST['participantsNumber'];
            $list=$_POST['participantsList'];
            $list=str_replace(" ","<br>",$list);
            
        @$con=new mysqli('localhost','root','','ignite');       
        if(mysqli_connect_errno())
        {
            echo"could not connect";
        }
        else
        {
            $existqry="SELECT * FROM semaphore where TeamName='$tname'";
            $rslt=mysqli_query($con,$existqry);
            
            if($rslt)
            {
                $num=mysqli_num_rows($rslt);
                
                if($num>0)
                {
                    echo"<script>alert('This team name already registered ');</script>";                   
                    echo"<script>window.location.href='semteamreg.php';</script>";
                }
            }
            $existqry="select * from semaphore where TeamNo='$tno'";
            $rslt=mysqli_query($con,$existqry);         
            if($rslt)
            {
                $num=mysqli_num_rows($rslt);    
                if($num>0)
                {
                    echo"<script>alert('This Team No already existed ');</script>";                   
                    echo"<script>window.location.href='semteamreg.php';</script>";
                }
                else
                {
                    $qry="INSERT INTO semaphore VALUES(".$tno.",'".$tname."','".$clg."','".$place."','".$leader."',".$phn.",".$tot.",'".$partici."','".$fee."','".$list."')";
                    $result=mysqli_query($con,$qry);
                    if($result)
                    {
                            
                        echo"<script>alert('Registered successfuly');</script>";
                        echo"<script>window.location.href='viewreg.php';</script>";
                    }
                    else
                    {
                        echo"<script>alert('Registration failed!');</script>";
                        echo"<script>window.location.href='semteamreg.php';</script>";     
                    }  
                }
            }
        }
    }
?>

