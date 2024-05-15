<?php


$CNE=$_POST['E_CNE']; 
                $Date_N=$_POST['D_etudiant']; 
                $get_name=mysqli_fetch_assoc(mysqli_query($con,"SELECT FULL_NAME from USER WHERE CNE='$CNE';"));
                $full_name=$get_name['FULL_NAME'];
?>