<?php

$workArr = new Work($_POST);

$workArr->create();

echo json_encode($workArr);
