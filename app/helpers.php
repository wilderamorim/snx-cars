<?php


/**
 * @param string|null $resource
 * @return string
 */
function url(?string $resource = null): string
{
    if ($resource) {
        return SITE_URL . '/' . ($resource[0] == '/' ? mb_substr($resource, 1) : $resource);
    }

    return SITE_URL;
}

/**
 * @param string $method
 * @return string
 */
function form_spoofing(string $method = 'PUT')
{
    return "<input type=\"hidden\" name=\"_method\" value=\"$method\">";
}
