<!-- For success/fail messages -->
<?php if(isset($_SESSION["errMsg"])){ ?>
	<div class="alert alert-danger text-center"><?php echo $_SESSION["errMsg"]; ?></div>
<?php unset($_SESSION["errMsg"]); }
if(isset($_SESSION["msg"])){ ?>
	<div class="alert alert-success text-center"><?php echo $_SESSION["msg"]; ?></div>
<?php unset($_SESSION["msg"]); } ?>