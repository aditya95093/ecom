<?php
    function pr($arr)
    {
        echo '<pre>';
        print_r($arr);
    }



    function prx($arr)
    {
        echo '<pre>';
        print_r($arr);
        die();
    }


    function get_safe_value($con, $str)
    {
        if ($str != '') {
            $str = trim($str);
            return mysqli_real_escape_string($con, $str);
        }
    }



   //function getCategoryName($con, $categoryId)//
   /* {
        $categoryQuery = "SELECT name FROM categories WHERE id = $categoryId";
        $categoryResult = mysqli_query($con, $categoryQuery);

        if ($categoryResult) {
            $category = mysqli_fetch_assoc($categoryResult);
            return $category['name'];
        } else {
            return "Unknown Category";
        }
    }*/

?>