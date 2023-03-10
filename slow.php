<?php

$c = curl_init("http://httpbin/delay/5");
curl_setopt($c, CURLOPT_TIMEOUT, 0);

curl_exec($c);