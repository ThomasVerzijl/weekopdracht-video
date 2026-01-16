<?php
    include 'conection.php';
require_once __DIR__ . '/vendor/autoload.php';
use Carbon\Carbon;
$result = $conn->query("SELECT * FROM comments ORDER BY published DESC;");
?>


<!--$post_date = Carbon::createFromDate('2023-11-01 10:34:00');!>
//echo $post_date->diffForHumans();-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weekopdracht2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/FsRRzOcAfwA?si=oP-SzvuEaLqwmG_w"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <div id="commentSection">
        <p><b>
        <?php
        echo $result->num_rows;
        ?>
        
         reacties</b></p>
        <form method="POST" action="sla_op.php">
            <input type="text" name="name" placeholder="jouw naam" />
            <br>
            <textarea name="comment" placeholder="jou comment"></textarea>
            <br>
            <input type="submit" name="submit" value="verzenden" />
        </form>
        <div id="comments">
            <?php
                  
                  while ($row = $result->fetch_assoc()) {


                     ?>
                     <div class="comment" >
                <p class="commentHead"><b><?php echo $row['name'] ?></b><span>
                    <?php
                $post_date = Carbon::createFromDate($row['published']);
                echo $post_date->diffForHumans();    
                ?>
             </span></p>
                <p class="commentText"> <?php echo $row['comment'] ?> </p>
            </div>
            <?php
                  }
                  ?>
          
            

        </div>
    </div>
</body>

</html>