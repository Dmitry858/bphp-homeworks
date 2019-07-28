<?php
    $site = "https://example.com";
    $date = "05-29-1993";
    $price = "10536";

    $protocol = substr($site, 0, 8);

    if ($protocol === "https://") {
        echo "Да";
    } else {
        echo "Нет";
    }

    // Второй вариант
    /*
    $protocol = strpos($site, "https://");

    if ($protocol === false) {
        echo "Нет";
    } else {
        echo "Да";
    }
    */

    echo "<br/>";

    $arr = explode('-', $date);
    list($arr[0], $arr[1]) = [$arr[1], $arr[0]];
    $date = implode('.', $arr);
    echo $date;

    echo "<br/>";

    if (strlen($price) > 3 && strlen($price) < 7) {
        $price = substr_replace($price, " ", -3, 0);
    } elseif (strlen($price) >= 7) {
        $price = substr_replace($price, " ", -3, 0);
        $price = substr_replace($price, " ", -7, 0);
    }

    echo $price . " руб.";
    
?>