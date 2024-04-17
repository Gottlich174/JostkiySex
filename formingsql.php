<?php
//запрос к БД
$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "NMSTU";

$request_string = "SELECT * FROM `hardware_items` ";
$arr = json_decode(file_get_contents('filter.json'), JSON_OBJECT_AS_ARRAY);

if (mb_strlen($arr['company']) > 1) {
    $company_str = '(';
    $company = explode("_", $arr['company']);
    foreach ($company as $index => $value) {
        if ($company_str == '(')
            $company_str = $company_str . "company_name = '" . $value . "'";
        else
            $company_str = $company_str . " or company_name = '" . $value . "'";
    }
    $company_str = $company_str . ')';
} else
    $company_str = '';
if (mb_strlen($arr['hardware_name']) > 1) {
    $hardware_name_str = '(';
    $hardware_name = explode("_", $arr['hardware_name']);
    foreach ($hardware_name as $index => $value) {
        if ($hardware_name_str == '(')
            $hardware_name_str = $hardware_name_str . "hardware_name = '" . $value . "'";
        else
            $hardware_name_str = $hardware_name_str . " or hardware_name = '" . $value . "'";
    }
    $hardware_name_str = $hardware_name_str . ')';
} else
    $hardware_name_str = '';

if (mb_strlen($arr['country']) > 1) {
    $country_str = '(';
    $country = explode("_", $arr['country']);
    foreach ($country as $index => $value) {
        if ($country_str == '(')
            $country_str = $country_str . "country = '" . $value . "'";
        else
            $country_str = $country_str . " or country = '" . $value . "'";
    }
    $country_str = $country_str . ')';
} else
    $country_str = '';

$filter_sql_string = '';
if ($country_str != '' or $hardware_name_str != '' or $company_str != '') $filter_sql_string = $filter_sql_string . ' WHERE ';
if ($country_str != '') {
    $filter_sql_string = $filter_sql_string . $country_str;
    if ($hardware_name_str != '') {
        $filter_sql_string = $filter_sql_string . ' and ' . $hardware_name_str;
        if ($company_str != '') {
            $filter_sql_string = $filter_sql_string . ' and ' . $company_str;
        }
    } else {
        if ($company_str != '') {
            $filter_sql_string = $filter_sql_string . ' and ' . $company_str;
        }
    }
} else {
    if ($hardware_name_str != '') {
        $filter_sql_string = $filter_sql_string . $hardware_name_str;
        if ($company_str != '') {
            $filter_sql_string = $filter_sql_string . ' and ' . $company_str;
        }
    } else {
        if ($company_str != '') {
            $filter_sql_string = $filter_sql_string  . $company_str;
        }
    }
}

$request_string = $request_string . $filter_sql_string;


$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

$res = mysqli_query($conn, $request_string);

//ВЫВОД
//echo "<form>";
while ($item = mysqli_fetch_assoc($res)) {

    echo "<div class='card'>
        <h2>";
    echo $item['hardware_name'];
    echo "</h2>
        <span>";
    echo "Стоимость: " . $item["price"] . " ₽";
    echo "</span><br>
        <span>Страна производства: " . $item['country'] . "<br><span>Год производства: ";
    echo $item['year'];
    echo "</span><br><button class='choose' name='hardware_item' type='submit' value='".$item['id']."'>Выбрать</button></div>";
}
//echo "</form>";
?>