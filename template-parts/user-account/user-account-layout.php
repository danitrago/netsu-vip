<?php

function user_account_layout()
{
    $current_user = wp_get_current_user();
?>
    <div class="border-l pl-6">
        <p class="text-white m-0">Hola, <b><?php echo $current_user->user_login ?></b><br />
            <small><a href="<?php echo wp_logout_url() ?>" class="text-white">Cerrar Sesión</a></small>
        </p>
    </div>
<?php
}
