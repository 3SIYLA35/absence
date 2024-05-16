
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="sheettt" href="tablecss.css">
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
              <label for="ADate"> Enter the date  </label><br>
              <input type="date" name="ADate">   
               <button type="submit"> cherche </button>         
          </form>
            <br>
        </main>
    </div>
  
    <div id="tab">
    <?php
        include("../config/config.php");
        if (isset($_POST['ADate']) && !empty($_POST['ADate'])) {
            $date = $_POST['ADate'];
        
            $rl = mysqli_query($con, "SELECT * FROM absence WHERE date_abs='$date'");
           
        
            $date_abs = mysqli_fetch_assoc($rl);
        
            if (mysqli_num_rows($rl)>0) {
                echo "<table class='w-[1280px] m-3 ml-10 border-2 border-black bg-white'><thead class='w-[50%]'><tr><th>CNE</th><th>Nom et prénom</th></tr></thead><tbody class='p-2 bg-red-500 '>";
                while ($row=mysqli_fetch_assoc($rl)) {
                    echo "<tr class='p-2 bg-amber-700 m-4'>
                            <td>" . $row["CNE"] . "</td>
                            <td>" . $row["Full_name"] . "</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Personne n'était absent le $date";
            }
        }
        
        
        ?>
    <br>


    
</body>
</html>
