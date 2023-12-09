<?php if (isset($_SESSION['message']['error'])) { ?>

    <div class="alert alert-error error-msg">

        <?php
        echo $_SESSION['message']['error'];
        unset($_SESSION['message']['error']);

        ?>
    </div>

<?php } ?>



<?php if (isset($_SESSION['message']['success'])) { ?>

    <div class="alert alert-success success-msg">

        <?php
        echo $_SESSION['message']['success'];
        unset($_SESSION['message']['success']);


        ?>
    </div>

<?php } ?>