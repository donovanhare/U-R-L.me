<?php

function pingAddress($ip) {
    $pingresult = exec("ping  -n 1 $ip", $outcome, $status);
    echo $status;
}
