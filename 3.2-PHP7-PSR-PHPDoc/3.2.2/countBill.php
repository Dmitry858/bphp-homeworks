<?php 

/**
 * Function for counting and making bill
 *
 * @param array $menu
 * @param array $services
 * @param array $post
 * @return string $result
 */

function countBill($menu, $services, $post)
{
    $bill_num = random_int(1000, 9999);
    $result = "<div class=\"order322-line order322-title\">Счёт №$bill_num</div>";
    $total = 0;

    foreach ($menu as $item) {
        $value = $post[$item->id];

        if ($value > 0) {
            $sum = $value * $item->price;
            $format_sum = number_format($item->price * $value, 2);
            $format_price = number_format($item->price, 2);
            $result .= "<div class=\"order322-line\"><div>$item->name</div><div>$value * $format_price ₽ = $format_sum ₽</div></div>";
            $total += $sum;
        }
    }

    $service = (string)$post['service'];
    foreach ($services as $item) {
        if ($item->id == $service) $service = $item;
    }

    if ($total > 0) {
        if ($service->id != 'selfcatering') {
            $format_service_sum = ($service->value_type == 'percent') ? number_format($total * ($service->value / 100), 2) : number_format($service->value, 2);
            $total = ($service->operator == '-') ? ($total - (float)$format_service_sum) : ($total + (float)$format_service_sum);
            $result .= "<div class=\"order322-line\"><div>$service->description</div><div>$format_service_sum ₽</div></div>";
        }
    } else {
        $result .= "<div class=\"order322-line\">Ничего не заказано</div>";
    }

    $total = number_format($total, 2);
    $result .= "<div class=\"order322-total\"><div>Итого: $total ₽</div></div>";

    return $result;
}