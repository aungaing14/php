<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homework-test1</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

      <script>
      <?php

        $json = file_get_contents('http://maqe.github.io/json/posts.json');
        $obj = json_decode($json);
        //print_r($obj);
        echo $obj[0]->id;

        $json1 = file_get_contents('http://maqe.github.io/json/authors.json');
        $obj1 = json_decode($json1);
        //print_r($obj);
        echo $obj1[0]->id;

        date_default_timezone_set("Asia/Bangkok");
        $now=date("Y-m-d H:i:s");
        $nowdate=date("Y-m-d"); 
        $nowtime=date("H:i:s"); 
        function DateDiff($savedate,$nowdate)
          {
            return (strtotime($nowdate) - strtotime($savedate))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
          }
        function TimeDiff($savetime,$nowtime)
          {
            return (strtotime($nowtime) - strtotime($savetime))/  ( 60 * 60 ); // 1 Hour =  60*60
          }
        function DateTimeDiff($strDateTime1,$strDateTime2)
          {
            return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
          }
      ?>
    </script>


  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">MAQE Forums</a>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Subtitle
        <small>Post</small>
      </h1>

<?php
  $i='0';
  foreach($obj as $result){
      $id=$obj[$i]->id;
      $tranid=$obj[$i]->author_id;
      $date=$obj[$i]->created_at;
      $sdate=date("Y-m-d H:i:s",strtotime($date));
      $savedate=date("Y-m-d",strtotime($date));

      $day=DateDiff($sdate,$nowdate)."<br>";
      $dday=DateTimeDiff($savedate,$now)."<br>";

      if ($day>=365) {
        $newday=DateDiff($savedate,$nowdate)/365;
        $showday=floor($newday);
        if($showday>1){
          $show=("$showday Years ago");
        }else
          $show=("$showday Year ago");
      }elseif ($day>=30) {
        $newday=DateDiff($savedate,$nowdate)/30;
        $showday=floor($newday);
        if($showday>1){
          $show=("$showday Months ago");
        }else
        $show=("$showday Month ago");
      }elseif ($day>=7) {
        $newday=DateDiff($savedate,$nowdate)/7;
        $showday=floor($newday);
        if($showday>1){
          $show=("$showday Weeks ago");
        }else
        $show=("$showday Week ago");
      }else
        
        if($day<2){
          $showday=floor($dday);
      
            if($dday<1){
              $show=($sdate); 
            }elseif ($dday<24&&$dday>0) {
              $show=("$showday Hours ago");
            }
              $show=("1 day ago");   
        } else{
          $newday=DateDiff($savedate,$nowdate);
          $showday=floor($newday);
          $show=("$showday Days ago");
        }

      $a='0';
      foreach($obj1 as $result1){
      if($obj1[$a]->id!=$tranid){
        $a=$a+'1';
      }
      $new=$a;
      }

?>
    <hr>
      <!-- Project One -->
      <div class="row">
          <div class="col-md-3">
            <a href="#">
              <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $obj[$i]->image_url; ?>" alt="">
            </a>
          </div>

          <div class="col-md-7">
              <h3> <?php echo $obj[$i]->title; ?> </h3>
              <p><?php echo $obj[$i]->body; ?></p>
              <p><?php echo $show;?></p>
          </div>

          <div class="col-md-2 text-center">         
              <div class="row">
                  <div>
                    <img class="col-sm-6 text-center mb-4 rounded-circle img-fluid d-block mx-auto" src="<?php echo $obj1[$new]->avatar_url; ?>" alt="" align="center">
                  </div>
                  
              </div>
                  <h5> <?php echo $obj1[$new]->name; ?> </h5>
                  <p><?php echo $obj1[$new]->role; ?></p>
                  <a><?php echo $obj1[$new]->place; ?></a>
          </div>
      </div>
  <?php  $i=$i+'1';}?>

      <hr>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">sukanya.ppj@hotmail.com</p>
      </div>
      <!-- /.container -->
    </footer>

  </body>

</html>
