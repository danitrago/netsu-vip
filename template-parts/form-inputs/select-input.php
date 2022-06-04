<?php

function select_input($name, $options, $placeholder, $selected = '')
{
    echo '
    <select name="' . $name . '">
    <option value="">' . $placeholder . '</option>
    ';
    foreach ($options as $option) {
        echo "<option value='{$option->slug}'";
        echo $option->slug == $selected ? "selected" : "";
        echo ">";
        echo "{$option->name}</option>";
    };
    echo '</select><br />';
}
