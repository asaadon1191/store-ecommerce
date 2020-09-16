<?php

define('PAGINATION_COUNT',10);

function getLocale()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}