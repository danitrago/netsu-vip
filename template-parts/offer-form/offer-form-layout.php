<?php

function formPostOffer()
{
    $current_user = wp_get_current_user();
    $inputs_classes = "p-3 w-full";
?>
    <!-- New Post Form -->
    <div id="postbox">
        <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
            <?php wp_nonce_field('new-post'); ?>
            <input type="hidden" name="action" value="new_post" />
            <input type="text" id="title" value="<?php echo get_the_ID() ?> - <?php echo get_the_title() ?>" readonly tabindex="1" size="20" name="title" required hidden />
            <input type="text" id="integrador" value="<?php echo $current_user->user_login; ?>" readonly tabindex="1" size="20" name="integrador" required hidden />
            <div class="flex flex-col md:flex-row gap-4">
                <div class="mb-4 w-full"><label class="mb-2 block" for="valor">Valor* (en USD)</label>
                    <input class="<?php echo $inputs_classes ?>" type="number" id="valor" value="" tabindex="1" size="20" name="valor" required />
                </div>
                <div class="mb-4 w-full"><label class="mb-2 block" for="asesor_comercial">Asesor comercial*</label>
                    <input class="<?php echo $inputs_classes ?>" type="text" id="asesor_comercial" value="" tabindex="1" size="20" name="asesor_comercial" required />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="mb-4 w-full"><label class="mb-2 block" for="telefono_de_asesor">Teléfono de asesor*</label>
                    <input class="<?php echo $inputs_classes ?>" type="number" id="telefono_de_asesor" value="" tabindex="1" size="20" name="telefono_de_asesor" required />
                </div>
                <div class="mb-4 w-full"><label class="mb-2 block" for="correo_electronico">Correo de asesor*</label>
                    <input class="<?php echo $inputs_classes ?>" type="email" id="correo_electronico" value="" tabindex="1" size="20" name="correo_electronico" required />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="mb-4 w-full"><label class="mb-2 block" for="vigencia">Vigencia de la propuesta*</label>
                    <input class="<?php echo $inputs_classes ?>" type="date" id="vigencia" value="" tabindex="1" size="20" name="vigencia" required />
                </div>
                <div class="mb-4 w-full"><label class="mb-2 block" for="tiempo_de_entrega">Tiempos de entrega (en días hábiles)</label>
                    <input class="<?php echo $inputs_classes ?>" type="number" id="tiempo_de_entrega" value="" tabindex="1" size="20" name="tiempo_de_entrega" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="mb-4 w-full">
                    <label class="mb-2 block" for="notas">Notas o comentarios adicionales</label>
                    <textarea class="<?php echo $inputs_classes ?>" id="notas" value="" name="notas"></textarea>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="mb-4 w-full"><label class="mb-2 block" for="adjunto">Adjunto</label>
                    <input type="file" id="adjunto" value="" tabindex="1" size="20" name="adjunto" required accept="application/pdf" />
                </div>
            </div>
            <div class="mb-5"></div>
            <button type="submit" class="bg-amber-500 hover:bg-teal-400 hover:text-white text-white py-4 px-7">
                <span class="font-semibold uppercase">cotizar</span>
            </button>
        </form>
        <?php
        // add logic for POST
        posting_offer();
        ?>
    </div>
<?php
}
