<?php

function getLocale()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}