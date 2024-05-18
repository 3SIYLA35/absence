
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

   
    <header class="w-full  bg-black text-white p-4">
            <nav class="flex justify-between ">
                <div class="logo ml-6">
                 <i class="fa-solid fa-user-tie text-3xl"></i>
                </div>
                <div class="w-[70%] flex justify-around font-bold">
                    <button class="bg-orange-600 p-2 rounded-lg  hover:bg-white hover:border-orange-600 hover:border-2 hover:text-black transition duration-[0.5s] "><a  href="list_absences.php">list d'absences</a></button>
                     <button class="bg-orange-600 p-2 rounded-lg  hover:bg-white hover:border-orange-600 hover:border-2 hover:text-black transition duration-[0.5s] "><a href="../prof.php">Log Out</a></button>
                </div>
        </nav>
    </header>
    <div class="container w-full flex justify-center m-6 ">
        <main>
          <form method="post"   >
             <button name="code" class="bg-orange-600 p-2 rounded-xl p-4 font-bold hover:scale-[1.2] hover:transition hover:duration[0.5s] hover:border-white hover:border-2" ><i class="fa-solid fa-hand-pointer mr-3 text-3xl  ">let code</i></button>
          </form>
            <br>
        </main>
    </div>
    <br>
    <?php
    include("../config/config.php");
        $code='';
            function let_code(){
                $chifre='0123456789';
                $rand='';
                for($i=0;$i<6;$i++){
                    $rand.=$chifre[rand(0,strlen($chifre)-1)] or die("    ") ;
                }
                return $rand;
            }
            function inser_update(){ 
                global $con;
                $code=let_code();
                $date_inser=time();
                $_SESSION['date_inser']=$date_inser;
                $cooldown=60;
                mysqli_query($con,"INSERT INTO CODE(CODE) VALUES('$code')");
                echo ' <div class=" absolute right-[47.5%] top-[30%] rounded-lg border-2 border-orange-600 mt-3 bg-white p-3 font-bold">'.$code.' </div> ';
                $db=time();
                while($db-$date_inser<=$cooldown){
                    $db=time();
                }
                $update=let_code();
                mysqli_query($con, "UPDATE code SET code='$update' WHERE code='$code'");
            }
        ini_set('max_execution_time', 300);
        if(isset($_POST['code'])){
            session_start();
            $btn_code=$_POST;
            $_SESSION['code']=$btn_code;
        inser_update(); 

    }
       ?>
</body>
</html>
