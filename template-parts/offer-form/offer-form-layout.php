<?php

function formPostOffer()
{
    $current_user = wp_get_current_user();
?>
    <!-- New Post Form -->
    <div id="postbox">
        <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

            <p><label for="title">Título*</label><br />
                <input type="text" id="title" value="<?php echo get_the_ID() ?> - OFERTA" readonly tabindex="1" size="20" name="title" required />
            </p>

            <p><label for="integrador">Integrador*</label><br />
                <input type="text" id="integrador" value="<?php echo $current_user->user_login; ?>" readonly tabindex="1" size="20" name="integrador" required />
            </p>

            <p><label for="valor">Valor*</label><br />
                <input type="number" id="valor" value="" tabindex="1" size="20" name="valor" required />
            </p>

            <p><label for="asesor_comercial">Asesor comercial*</label><br />
                <input type="text" id="asesor_comercial" value="" tabindex="1" size="20" name="asesor_comercial" required />
            </p>

            <p><label for="telefono_de_asesor">Teléfono de asesor*</label><br />
                <input type="number" id="telefono_de_asesor" value="" tabindex="1" size="20" name="telefono_de_asesor" required />
            </p>

            <p><label for="correo_electronico">Correo de asesor*</label><br />
                <input type="email" id="correo_electronico" value="" tabindex="1" size="20" name="correo_electronico" required />
            </p>

            <p><label for="vigencia">Vigencia de la propuesta*</label><br />
                <input type="date" id="vigencia" value="" tabindex="1" size="20" name="vigencia" required />
            </p>

            <p><label for="tiempo_de_entrega">Tiempos de entrega (en días hábiles)</label><br />
                <input type="number" id="tiempo_de_entrega" value="" tabindex="1" size="20" name="tiempo_de_entrega" />
            </p>

            <p><label for="notas">Notas o comentarios adicionales</label><br />
                <textarea id="notas" value="" name="notas"></textarea>
            </p>

            <p><label for="adjunto">Adjunto</label><br />
                <input type="file" id="adjunto" value="" tabindex="1" size="20" name="adjunto" required accept="application/pdf" />
            </p>

            <p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

            <input type="hidden" name="action" value="new_post" />
            <?php wp_nonce_field('new-post'); ?>
        </form>

        <?php
        // add logic for POST
        posting_offer();
        ?>

    </div>
<?php
}
