<?php

/**
 * 生成路由地址
 * @param string $url 地址
 * @param array $params
 * @return string
 */
function getRoute(string $url, string $method = 'GET',array $params = [])
{
    $query = http_build_query($params);
    if($query){
        $query = "?{$query}";
    }
    $url = "{$url}{$query}";
    return $url;
}