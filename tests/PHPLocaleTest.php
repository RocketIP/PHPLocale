<?php

use PHPLocale\HttpAcceptLanguage;

class HttpAcceptLanguageTest extends \PHPUnit_Framework_TestCase
{
    public function testLanguage()
    {
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr-BE,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3';
        $languages = new HttpAcceptLanguage();
        $this->assertEquals($languages->getLanguage(), 'fr-BE');
    }
}