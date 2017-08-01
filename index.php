<?php
   require_once 'worker.php';
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <script
         src="https://code.jquery.com/jquery-3.2.1.min.js"
         integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
         crossorigin="anonymous"></script>
      <script src="./script.js"></script>
      <link rel="stylesheet" href="./style.css"/>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
      <title>zadanie rekrutacyjne</title>
   </head>
   <body>
      <section id="select" data-type="background" data-speed="2">
         <div class="container clearfix">
            <div class="row">
               <div class="col-sm-3">
                  <img src="" alt="Select photo" class="logo">
               </div>
               <!-- col -->
               <div class="col-sm-9">
                  <h1>Książki dostępne w wydawnictwie Helion</h1>
                  <p class="lead">Jest to pierwsza moja zabawa z xml. Zadanie robiłem punkt po punkcie, dlatego miałem ZONK kiedy dotarłem do punktu b front-endu, gdzie trzeba było zebrać jeszcze wszystkie bazy, żeby utworzyć select</p>
                  <p><a class="btn btn-primary btn-select btn-select-light">
                     <input type="hidden" class="btn-select-input" id="" name="" value="" />
                     <span class="btn-select-value">Wybierz księgarnię</span>
                     <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                     </a>
                  </p>
               </div>
               <!-- col -->
            </div>
            <!-- row -->
         </div>
         <!-- container -->
      </section>
      <section id="select2">
         <div class="container clearfix">
            <div class="row">
               <div class="col-sm-2"></div>
               <div class="col-sm-8 myClass">
                  <ul class="list">
                  </ul>
               </div>
               <div class="col-sm-2"></div>
            </div>
         </div>
         <!-- container -->
      </section>
   </body>
</html>
