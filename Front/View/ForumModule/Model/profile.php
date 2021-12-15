<?php 
    session_start(); 
    require('actions/users/showOneUsersProfileAction.php');   
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    <?php include 'includes/navbar.php'; ?>
    <table width="100%" style="background-color: #0066ff;color: white;">
 <tr width="75%">
  <td>
   <h2>Question Added</h2>
  </td>
  <td width="15%">
   <i class="fa fa-bell" aria-hidden="true" id="noti_number"></i>
  </td>
 </tr>
</table>
<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>
    <br><br>

    <div class="container">
        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }

            if(isset($getHisQuestions)){

                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo; ?></h4>
                        <hr>
                        <p><?= $user_lastname . ' ' . $user_firstname; ?></p>
                    </div>
                </div>
                <br>
                <?php
                while($question = $getHisQuestions->fetch()){ 
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $question['titre']; ?>
                        </div>
                        <div class="card-body">
                            <?= $question['description']; ?>
                        </div>
                        <div class="card-footer">
                            Par <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication'];  ?>
                        </div>
                    </div>
                    <br>
                    <?php
                }

            }
        ?>  
    </div>

</body>
</html>