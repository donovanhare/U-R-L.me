<?php

function pingAddress($ip) { //cmd exec vul?
    $pingresult = exec("ping  -n 1 $ip", $outcome, $status);
    echo $status;
}
