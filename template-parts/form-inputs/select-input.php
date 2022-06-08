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

function radio_input($name, $options, $selected = '')
{
    foreach ($options as $option) {
?>
        <div class="mb-1">
            <input type="radio" id="<?php echo $option->slug ?>" name="<?php echo $name ?>" value="<?php echo $option->slug ?>" <?php echo $option->slug == $selected ? "checked" : "" ?> />
            <label for="<?php echo $option->slug ?>"><?php echo $option->name ?></label>
        </div>
<?php
    };
}
