<?php if (isset($_SESSION['message']['error'])) { ?>

    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
        <div class="toast-body error-msg">

            <?php
            echo $_SESSION['message']['error'];
            unset($_SESSION['message']['error']);

            ?>
        </div>
    </div>

<?php } ?>



<?php if (isset($_SESSION['message']['success'])) { ?>

    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
        <div class="toast-body success-msg">

            <?php
            echo $_SESSION['message']['success'];
            unset($_SESSION['message']['success']);


            ?>
        </div>
    </div>

<?php } ?>