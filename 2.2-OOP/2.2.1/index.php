<?php
    require 'autoload.php';
    require 'config/SystemConfig.php';

    $jsonFileAccessModel = new JsonFileAccessModel('data');

    print_r($jsonFileAccessModel);
    // $jsonFileAccessModel->write('бла-бла... какая-нибудь новая строка');
    // echo $jsonFileAccessModel->read();
?>