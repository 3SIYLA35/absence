
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

   
    <header class="w-full  bg-orange-600 text-white p-4 ">
            <nav class="flex justify-between ">
                <div class="logo ml-6">
                 <i class="fa-solid fa-user-tie text-3xl"></i>
                </div>
                <div class=" font-bold pr-4">
                     <button class="bg-black p-2 rounded-lg  hover:bg-white hover:border-black hover:border-2 hover:text-black transition duration-[0.5s] "><a href="../etudiant.php">Log Out</a></button>
                </div>
        </nav>
    </header>
    <div class="container bg-slate-100 w-[50%] h-1/2 flex justify-center m-6 ">
        <main  class="div p-4 m-3 h-[80%] ">
            <form method="post">
            <div id="div" class="flex flex-col"> 
             <label  class="  p-2 text-center text-white font-bold" for="code">Code</label>
             <input type="text" name="code" placeholder="entre your code " required name="code">
             <input type="submit" name="present" class="p-2 m-2 bg-violet-500 text-white rounded-xl">
            </div>
            </form>
            <?php
            include("../config/config.php");
            include("../etudiant.php");
            $code=mysqli_query($con,"SELECT CODE FROM CODE ORDER BY CODE DESC LIMIT 1;");
            function verif(){
                if(isset($_POST['present'])){
                    $present=$_POST['code'];
                    global $code;
                  if(mysqli_num_rows($code)>0){
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
                    }
                  }
                  else{
                    global $con;
                    global $full_name;global $CNE;
                    include("../etudiant.php");
                    $name=$_POST['full_name'];
                    echo"you are absent ";
                    mysqli_query($con,"INSERT INTO absence (CNE,Full_name,date_abs) VALUES ('$CNE','$full_name',NOW());");
                  }
               }
            }
            
            verif();
            
            
            ?>
        </main>
    </div>
    <br>
</body>
</html>
