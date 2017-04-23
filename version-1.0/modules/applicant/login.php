<?php include "./include/header.php"; ?>

    <!-- LOGIN PANEL -->
    <div class="modal modal-transparent fade" id="modal-transparent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog" style="width: 300px; height:225px;">
            <div class="modal-content">
                <div class="modal-header">
                    <img alt="signInBrand" style="width:100px; height:100px;" src="res/img/mainLogo.jpg"/>
                    <h4 class="modal-title" id="myModalLabel">iSV Admin</h4>
                </div>
            </div>
            <!-- GATHER USER LOGIN DETAILS -->
            <form role="form" method="post" action="index.php?action=login">
                <div class="modal-body">
                    <input type="hidden" name="login" value="true" />
                    <?php if (isset($results['errorMessage'])) { ?><div class="errorMessage"><?php echo $results['errorMessage'] ?></div><?php } ?>
                    <fieldset>
                        <div class="form-group-sm" style="margin:10px;"><input class="form-control" placeholder="E-mail" name="username" type="email" autofocus /></div>
                        <div class="form-group-sm" style="margin:10px;"><input class="form-control" placeholder="Password" name="password" type="password" /></div>
                    </fieldset>
                </div>
                <!-- SUBMIT CREDENTIALS -->
                <div class="modal-footer">
                    <button class="btn btn-default" name="login" type="button">Login</button>
                </div>
            </form>
        </div>
    </div>

 <?php include "./include/footer.php"; ?>


