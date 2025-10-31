<?php

$u = $_GET['u'];

echo file_get_contents($u) ?? 'null';