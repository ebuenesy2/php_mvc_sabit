<?php

function base_url($path = '') {
    return rtrim(Config::get('app', 'base_url'), '/') . '/' . ltrim($path, '/');
}