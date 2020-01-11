<?php
function showCategories($data, $parent = 0, $str = "•", $select = 0)
{

    foreach ($data as $item) {
        $id = $item->id;
        $name = $item->name;
        if ($item->category_parent == $parent) {
            if ($select != 0 && $id == $select) {
                echo '<option value="' . $id . '" selected>' . $str . " " . $name . '</option>';
            } else {
                echo '<option value="' . $id . '">' . $str . " " . $name . '</option>';
            }
            showCategories($data, $id, "&nbsp;&nbsp;&nbsp;". "•", $select);
        }
    }

}
