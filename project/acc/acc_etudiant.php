
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-0 m-0 bg-slate-300 font-serif">

   
    <header class="w-full h-auto bg-violet-600 text-white p-4 ">
            <nav class="flex justify-between ">
                <div class="logo ml-6">
                 <i class="fa-solid fa-user-tie text-3xl"></i>
                </div>
                <div class=" font-bold pr-4">
                     <button class="bg-black p-2 rounded-lg  hover:bg-white hover:border-black hover:border-2 hover:text-black transition duration-[0.5s] "><a href="../etudiant.php">Log Out</a></button>
                </div>
        </nav>
    </header>
    <div class="flex justify-center items-center h-full ">
    <div class="container bg-slate-100 w-[40%] h-[288px] rounded-xl shadow-xl flex justify-center  m-6 ">
        <main  class="div  m-0 w-full ">
            <form method="post">
            <div id="div" class="flex flex-col  items-center"> 
             <label  class="  p-4 text-center text-black text-2xl rounded-t-xl font-bold w-full bg-orange-500 m-0" for="code">Code</label>
             <input class="m-3 outline-none border-gray-200 border-2 mt-12 p-3 w-1/2 rounded-xl" type="text" name="code" placeholder="entre your code " required name="code">
             <input  type="submit" name="present" class="p-2 hover:border-2 hover:border-orange-500 hover:bg-white hover:transition duration-[0.7s] font-bold hover:text-black cursor-pointer w-1/2 bg-orange-500 m-3 text-white rounded-xl">
            </div>
            </form>
            <?php
            include("../config/config.php");
            $code=mysqli_query($con,"SELECT CODE FROM CODE ORDER BY CODE DESC LIMIT 1;");
            // function verif(){
              session_start();
              if(isset($_SESSION['code'])){
                 $code_date=$_SESSION['date_inser'];
                 if(isset($_POST['present'])){
                    $now=time();
                    if(mysqli_num_rows($code)>0 && $now-$code_date<=(5*60)){ 
                        $present=$_POST['code'];
                        global $code;
                        $verif=mysqli_fetch_assoc($code);
                        $donner=$verif['CODE'];
                        if($donner==$present){?>
                          <script>
                           window.onload=function(){ 
                           let div=document.getElementById('div');
                           div.style.display='none';
                           }
                          </script><?php
                          echo"<div class='p-2 text-2xl font-bold'> your present !</div> ";
                          }  
                        else{?>
                          <script>
                           window.onload=function(){ 
                           let div=document.getElementById('div');
                           div.style.display='none';
                            }
                          </script> <?php
                          echo"<div class='p-2 text-2xl font-bold  '>incorrect!!</div>"; 
                          }}
                      else{
                       ?>
                       <script>
                        window.onload=function(){ 
                        let div=document.getElementById('div');
                        div.style.display='none';
                        }
                        </script><?php
                        $con;
                        $full_name = $_SESSION['full_name'];
                        $CNE = $_SESSION['CNE'];
                        echo"<div class='p-2 text-2xl font-bold mt-[112px] flex justify-center items-center '>you are absent!!</div>";
                        mysqli_query($con,"INSERT INTO absence (CNE,Full_name,date_abs) VALUES ('$CNE','$full_name',NOW());");
                        }
                    
                  }
         

              }
            
            
            
            ?>
        </main>
    </div></div>
    <br>
</body>
</html>
