<?php

function table_row_layout($label, $selector, $type = '')
{
?>
    <td>
        <?php echo $label ?>
    </td>
    <td>
        <?php
        switch ($type) {
            case 'date':
                echo date_format(date_create(get_post_meta(get_the_ID(), $selector, TRUE)), "d/m/Y");
                break;
            case 'number':
                echo number_format(get_post_meta(get_the_ID(), $selector, TRUE));
                break;
            case 'array':
                echo implode(", ", get_post_meta(get_the_ID(), $selector, TRUE));
                break;
            default:
                echo get_post_meta(get_the_ID(), $selector, TRUE);
                break;
        }
        ?>
    </td>
<?php
}
