<?php
namespace PHPLocale;

class HttpAcceptLanguage
{
    /**
     * __construct
     *
     * @return array
     */
    public function __construct()
    {
        $languages = [];

        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $httpAcceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $httpAcceptLanguages = explode(',', $httpAcceptLanguage);
        }

        if (empty($httpAcceptLanguages)) {
            return [];
        }

        foreach ($httpAcceptLanguages as $httpAcceptLanguage) {
            $language = [];

            $lang = trim($httpAcceptLanguage);

            if (stripos($httpAcceptLanguage, ';')) {
                $lang = trim(stristr($httpAcceptLanguage, ';', true));
            }

            $language['ISO639-1'] = $lang;

            if (stripos($lang, '-')) {
                $language['ISO639-1'] = stristr($lang, '-', true);
                $language['ISO3166-1'] = trim(mb_strtoupper(stristr($lang, '-')), '-');
                $language['RFC1766'] = $language['ISO639-1'].'-'.$language['ISO3166-1'];
            }

            $language['q'] = 1;
            preg_match('/q=([0-9.]+)/', $httpAcceptLanguage, $q);

            if (!empty($q[1])) {
                $language['q'] = $q[1];
            }

            $languages[] = $language;
        }

        $this->languages = $languages;
        return $this->languages;
    }

    /**
     * parseLanguage
     *
     * @param array $language
     *
     * @return string
     */
    public function parseLanguage($language)
    {
        if (isset($language['RFC1766'])) {
            return $language['RFC1766'];
        }

        return $language['ISO639-1'];
    }

    /**
     * getRawLanguages
     *
     * @return array
     */
    public function getRawLanguages()
    {
        if (isset($this->languages)) {
            return $this->languages;
        }
    }
    /* }}} */

    /**
     * getLanguages
     *
     * @return array
     */
    public function getLanguages()
    {
        if (isset($this->languages) && is_array($this->languages)) {
            $languages = [];

            foreach ($this->languages as $language) {
                $languages[] = $this->parseLanguage($language);
            }

            return $languages;
        }
    }

    /**
     * getLanguage
     *
     * @return string
     */
    public function getLanguage()
    {
        if (isset($this->languages[0])) {
            $lang = $this->languages[0];

            return $this->parseLanguage($lang);
        }
    }
}