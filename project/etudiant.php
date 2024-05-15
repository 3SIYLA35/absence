  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="output.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <meta http-equiv="refresh" content="">  </head>
  <body class="p-0 m-0 bg-slate-300 font-serif">


    <div class="container w-full h-lvh flex justify-center items-center">
      <div class="cards  p-6 m-6 w-[50%]   bg-slate-100 h-[80%] rounded-3xl shadow-2xl">
              <?php 
                include("config/config.php");
                if (!$con) { 
                  die("Connection failed: " . mysqli_connect_error()); 
                } 
                if(isset($_POST['A_etudiant'])){ 
               $CNE=$_POST['E_CNE']; 
                $Date_N=$_POST['D_etudiant']; 
                $get_name=mysqli_fetch_assoc(mysqli_query($con,"SELECT FULL_NAME from USER WHERE CNE='$CNE';"));
                $full_name=$get_name['FULL_NAME'];
                $result=mysqli_query($con, "SELECT * FROM USER WHERE CNE='$CNE'");
              
                
                if(mysqli_num_rows($result) > 0) { 
                  echo "<div class=' relative  flex flex-col items-center h-full'>
                         <div class='text-3xl text-black text-center p-1 m-2 font-bold'>
                         <p> login is successful!</p>
                         </div> <br> 
                         <div class=' absolute bottom-24 mt-4 mb-2 flex flex-col justify-between w-[80%] rounded-lg bg-orange-600'>
                        <a class='p-2 text-center  font-bold text-black ' href='acc/acc_etudiant.php' >Login now</a>
                        </div>";
                        echo '<form method="post">
                        <input type="hidden" name="full_name" value="' . $full_name . '">
                        <button type="submit" id="submit" name="submit">Envoyer</button>
                      </form>';  
                       echo '<script>
                        window.onload=function(){
                          document.getElementById("submit").click();
                        };
                      </script>';
                } else { 
              
                  echo "<div class=' relative  flex flex-col items-center h-full'>
                         <div class='text-3xl text-black text-center p-1 m-2 font-bold'>
                         <p> CNE is incorrect!</p>
                         </div> <br> 
                         <div class=' absolute bottom-24 mt-4 mb-2 flex flex-col justify-between w-[80%] rounded-lg bg-orange-600'>
                        <a class='p-2 text-center  font-bold text-black ' href='etudiant.php' >Login now</a>
                        </div>
                        </div> ";
                } 
              }
             else{ 
                
              
              ?> 
          <p class="text-center font-bold text-xl">Log <span>In</span></p>
          <div class=" flex justify-around p-3">
          <button type="submit" class="bg-black text-white rounded-lg p-4"><i class="fa-solid fa-user-tie pr-2"></i><a href="prof.php">Account professeur</a></button>
          <button type="submit" class="bg-black text-white rounded-lg p-4"><i class="fa-regular fa-user pr-2"></i><a href="etudiant.php">Account Etudiant</a></button>
          </div>
          <div class="etudiant m-2  flex flex-col">
            <form method="post" > 
              <div class=" flex flex-col m-2">    
                  <label for="etudiant" class="p-2 font-bold">CNE</label>
                  <input class="rounded-lg  p-4" type="text" id="etudiant" placeholder="your CNE!" required autocomplete="off" name="E_CNE">

                </div>
                  <div class=" flex flex-col m-2"  >
                  <label for="etudiant" class="p-2 font-bold">Date De Naissance</label>
                  <input type="date" class="rounded-lg p-4" id="etudiant"  required autocomplete="off" name="D_etudiant" >
              </div>
              
              <button type="submit" name="A_etudiant" class="m-2 mt-10 p-3 bg-orange-500 text-black rounded-lg font-bold" >Log In </button>
               </form>



              
              
              
              





          </div>
              <?php }  ?>
      </div>

    </div>
  </body>
  </html>
