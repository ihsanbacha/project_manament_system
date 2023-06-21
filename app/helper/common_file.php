<?php

use Illuminate\Support\Facades\DB;

// tree view
function buildTreeView($result, $parent = 0, $level = 0, $prelevel = -1)
{
    $html = '';

    foreach ($result as $row) {
        if ($parent == $row->parent_cat_id) {
            if ($level > $prelevel) {
                $html .= '<ul>';
            }
            if ($level == $prelevel) {
                $html .= '</li>';
            }
          
            $catIds = []; // Create an empty array to store the cat_ids
            foreach ($result as $item) {
                $catIds[] = $item->cat_id; // Retrieve and append the cat_id to the array
            }
            $string = implode(',', $catIds);    
            $html .= '<li class="'.$row->project_tree_id.'" style=" ; margin-left: 12px;"><button onclick="open_folder(' . $row->cat_id . ')" style=" "><a  class="t_' . $row->cat_id . ' ">' . $row->cat_name . '<span class="caret"></span></a></button>';
            if ($level > $prelevel) {
                $prelevel = $level;
            }
            $level++;
            $html .= buildTreeView($result, $row->cat_id, $level, $prelevel);
            $level--;
        }
    }

    if ($level == $prelevel) {
        $html .= '</li></ul>';
    }

    return $html;
}
// test array function 
function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}
