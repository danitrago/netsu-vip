<?php

function user_account_layout()
{
    $current_user = wp_get_current_user();
?>
    <div>
        <p><?php echo 'Hola, ' . $current_user->user_login; ?><br />
            Cerrar Sesión
        </p>
    </div>
<?php
}
