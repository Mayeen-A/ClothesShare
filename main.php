<?php

  $msg = "";

if (isset($_POST['upload']))
{
  $target = 'images/'.basename($_FILES['image']['name']);

  $db = mysqli_connect("localhost", "root", "", "photos");

  $image = $_FILES['image']['name'];
  $text = $_POST['text'];

  $sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";

  mysqli_query($db, $sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
  {
    $msg = "Image uploaded successfully";
  }
  else {
    $msg = "There was a problem uploading the image";
  }
}
 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width">
     <title>repl.it</title>
     <link href="css/style.css" rel="stylesheet" type="text/css" />

     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
     integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
     crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
     crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
     integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
     crossorigin="anonymous"></script>

     <style>

     #contactBtn
     {
       padding: 8px 5px;
       margin: 8px 0;
       margin-left: 25px;
       box-sizing: border-box;
       background-color: #318fb5;
       color: white;
       border: none;
       border-radius: 4px;
       width: 23%;
     }

     input[type=submit] {
       width: 100%;
       padding: 12px 20px;
       margin: 8px 0;
       box-sizing: border-box;
       background-color: #005086;
       color: white;
       border: none;
       border-radius: 4px;
     }

     input[type=file] {
       width: 100%;
       margin: 8px 0;
       box-sizing: border-box;
     }

     textarea {
       width: 100%;
       padding: 12px 20px;
       margin: 8px 0;
       box-sizing: border-box;
     }

     #contents {
       width: 55%;
     }

     img{
         display: block;
         float: left;
         width: 100%;
         height: 200px;
        }

        p {
          text-align: justify;
          width: 275px;
        }

     </style>


   </head>
   <body>
     <header>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
 			  <a class="navbar-brand" href="home.html">ClothesShare</a>
 			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="home.html">HOME <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="about.html">ABOUT</a>
             </li>
             <li class="nav-item active">
               <a class="nav-link" href="main.html">ARTICLES</a>
             </li>
           </ul>
         </div>
       </nav>
     </header><br>

     <div id = "addButton" style="text-align: center;">
          <a type = "button" id = "show" class="btn btn-primary" style="background-color: #b0cac7; color: white; width: 10%; border: none;">Add</a><br><br>
        </div>


     <main role="main">
     <!-- <a type="button" class="btn btn-light btn-block" href="add.html">Add</a> -->
     <div class="container" style="padding-top:2%">
       <div class="row">
         <div class="col">
           <div class="card" style="width: 18rem;">
             <img src="image/tshirt1.jpg" class="card-img-top" alt="clothing">
             <div class="card-body">
               <h5 class="card-title">Type: T-Shirt</h5>
               <p class="card-text">Condition: Used <br> Size: Small<br> Location: Ottawa</p>
               <a href="mailto:tinamliang@gmail.com" target="_blank" class="btn btn-primary" style="background-color: #318fb5;">Contact</a>
             </div>
           </div>
         </div>
         <div class="col">
           <div class="card" style="width: 18rem;">
             <img src="image/tshirt2.jpg" class="card-img-top" alt="clothing">
             <div class="card-body">
               <h5 class="card-title">Type: T-Shirt</h5>
               <p class="card-text">Condition: New <br> Size: Large <br>Location: Montreal</p>
               <a href="mailto:tinamliang@gmail.com" target="_blank" class="btn btn-primary" style="background-color: #318fb5;">Contact</a>
             </div>
           </div>
         </div>
         <div class="col">
           <div class="card" style="width: 18rem;">
             <img src="image/pants1.jpg" class="card-img-top" alt="clothing">
             <div class="card-body">
               <h5 class="card-title">Type: Pants</h5>
               <p class="card-text">Condition: Used <br> Size: Medium <br> Location: Lethbridge</p>
               <a href="mailto:tinamliang@gmail.com" target="_blank" class="btn btn-primary" style="background-color: #318fb5;">Contact</a>
             </div>
           </div>
         </div>
         <div class="row">
           <div class ="col">
             <div id = "contents">
               <?php

                 $db = mysqli_connect("localhost", "root", "", "photos");
                 $sql = "SELECT * FROM images";

                 $result = mysqli_query($db, $sql);
                 while ($row = mysqli_fetch_array($result)) {
                   echo "<div id = 'img_div'>";
                     echo "<img src = 'images/".$row['image']."'>";
                     echo "<p>".$row['text']."</p>";
                     echo "<input type='submit' name='contact' value='Contact' id = 'contactBtn'>";
                   echo "</div>";
                 }
                 ?>
               </div>
             </div>
           </div>
         </div>


       </div>
     </div>

<div id = "content">

  <form id = "form1" action="index.php" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "size" value = "1000000">

  <div>
  <input type="file" name="image">
</div>

<div>
  <textarea name = "text" cols = "40" rows = "4" placeholder = "Please say something...">
Type:
Condition:
Size:
Location:
  </textarea>
</div>

<div>
  <input type="submit" name="upload" value = "POST">
</div>

</form>
</div>

<script>

    $("#show").click(function(){
        $("#form1").toggle();
    });

    </script>

<br><br>
<footer class="container">
  <hr class="spaced-divider">
  <p class="float-right"><a href="#">Back to top</a></p>
  <p>&copy; 2020-2021 ClothesShare.</p>
</footer>
</main>
  </body>

</html>
