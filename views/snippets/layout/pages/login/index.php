<?php 
$modelLogin = new models\Login();
require "views/snippets/templates/auth/template.php";
?>

<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <?php
        require "views/snippets/dependencies/auth/includes/login_cash.php";
    ?>
</body>

