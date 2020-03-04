<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05.03.2020
 * Time: 4:27
 */

$filename = 'filename.txt';
$person = "John Smith\n";


if (is_writable($filename)) {


    if (!$handle = fopen($filename, 'a')) {
        echo "Не могу открыть файл ($filename)";
        exit;
    }

    if (fwrite($handle, $person) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
    }
    echo 'OK';
    file_put_contents($filename, $person, FILE_APPEND | LOCK_EX);


} else {
    echo "Файл $filename недоступен для записи";
}


$books = array(
    array(
        array(
            'author' => 'William Golding',
            'title' => 'Lord of the Flies',
            'year' => 1954
        ),
        array(
            'author' => 'R.D. Blackmore',
            'title' => 'Lorna Doone',
            'year' => 1869
        )
    ),
    array(
        array(
            'author' => 'T.E. Lawrence',
            'title' => 'Seven Pillars of Wisdom',
            'year' => 1992
        ),
        array(
            'author' => 'Truman Capote',
            'title' => 'In Cold Blood',
            'year' => 1966
        )
    )
);



$filename = 'array.txt';
$data = serialize($books);
//$data = json_encode($books);
file_put_contents($filename,$data, FILE_APPEND | LOCK_EX);


$data = file_get_contents($filename);
//$books = json_decode($data, TRUE);
$books = unserialize($data);
