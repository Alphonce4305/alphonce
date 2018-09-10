

<?php
// //CODE FOR LOCKING THE SCREEN IF IDDLE FOR 1min
// sleep(1200);
// header("Location:lock.php");
// exit();

  require_once 'includes/functions/functions.php';
   GetHeader();
   SetSession();

?>

<!--  -->
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Welcome</h2>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12" >
                    <!-- <img class="homeimg" src="includes/ux/visuals/img/school_clear.png"> -->
                    <h2 class="">Motto:<br>
                        <small>To be a Center of excellence.</small>
                    </h2>
                    
                    <h2 class="">Mission:<br>
                        <small>To Provide Condusive Atmosphere for Better Learning. </small>
                    </h2>

                    <h2 class="">Vission:<br>
                        <small>To Mantain High Quality Education And Performance.</small>
                    </h2>
            
                    
                </div>

            </div>

        </div>
    </div>
    <?php   require_once 'includes/functions/functions.php';
        SetFooter();
    ?>
</div>

