<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="p-0 m-0 bg-slate-300 font-serif 
">
    
   <div class="container w-full h-lvh flex justify-center items-center">
    <div class="cards  p-6 m-6 w-[50%]   bg-slate-100 h-[80%] rounded-3xl shadow-2xl">
        <p class="text-center font-bold text-xl">Log <span>In</span></p>
        <div class=" flex justify-around p-3">
        <button type="submit" class="bg-black text-white rounded-lg p-4"><i class="fa-solid fa-user-tie pr-2"></i><a href="prof.php">Account professeur</a></button>
        <button type="submit" class="bg-black text-white rounded-lg p-4"><i class="fa-regular fa-user pr-2"></i><a href="etudiant.php">Account Etudiant</a></button>
        </div>
        <form method="post">
        <div class="prof m-2  flex flex-col">
            <?php
            include("config/config.php");
            if(isset($_POST['A_prof'])){ echo "sssssssssss";
                $EMAIL=$_POST['e_prof']; 
                $PASSWORD=$_POST['P_prof']; 
                $verif_email=mysqli_query($con, "SELECT * FROM PROFESSOR WHERE Email='$EMAIL'");
                $VERIF_PASS=mysqli_query($con,"SELECT * FROM PROFESSOR WHERE Password='$PASSWORD'");
                
                
                if(mysqli_num_rows($verif_email)>0 && mysqli_num_rows($VERIF_PASS)) { 
                    $get_name=mysqli_fetch_assoc(mysqli_query($con,"SELECT full_name from PROFESSOR WHERE Email='$EMAIL';"));
                    $PROF=$get_name['full_name'];
                  echo "<div class='relative flex flex-col items-center h-full'>
                        <div class='text-3xl text-black text-center p-1 m-2 font-bold'>
                        <p> login is successful!</p>
                        </div> <br> 
                        <div class='absolute bottom-24 mt-4 mb-2 flex flex-col justify-between w-[80%] rounded-lg bg-orange-600'>
                        <a class='p-2 text-center font-bold text-black' href='acc/acc_prof.php'>Login now</a>
                        </div>
                        </div>";
                } 
                else { 
                    echo"aaaaaaaa";
                    echo "<div class='flex flex-col m-2'>
                            <label for='etudiant' class='p-2 font-bold'>Email</label>
                            <input class='outline-none rounded-lg p-4 border-2 border-blue-500' type='text' id='prof' placeholder='your Email!' required autocomplete='off' name='e_prof'>
                            </div>
                         <div class='flex flex-col m-2'>
                            <label for='prof' class='p-2 font-bold'>Code</label>
                            <input type='password' class='rounded-lg p-4 border-2 border-red-500' id='prof' placeholder='password!!'  required autocomplete='off' name='P_prof'>
                          </div>
                         <button type='submit' name='A_prof' class='mt-2 ml-2 mr-2 mb-0 mt-10 p-3 bg-orange-500 text-black rounded-lg font-bold' >Log In </button>
                         <p class='text-red-500 '>Invalid email or password</p>";
          
                  }}else{ 
              ?>
            <div class=" flex flex-col m-2">
                <label for="etudiant" class="p-2 font-bold">Email</label>
                <input class="rounded-lg p-4 " type="text" id="prof" placeholder="your Email!" required autocomplete="off" name="e_prof">
            </div>
            <div class=" flex flex-col m-2 "  >
                <label for="prof" class="p-2 font-bold">Code</label>
                <input type="password" class="rounded-lg p-4" id="prof" placeholder="password!!"  required autocomplete="off" name="P_prof">
            </div>
            
            <button type="submit" name="A_prof" class="m-2 mt-10 p-3 bg-orange-500 text-black rounded-lg font-bold" >Log In </button>
            </form>
            <?php  }?>
        </div>
    </div>

   </div>
</body>
</html>
