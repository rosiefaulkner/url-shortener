<?php

namespace UrlShortener;

class UrlController
{
    /*
    * Front Page
    */
    public function getIndex()
    {
        include CONFIG_VIEWS_DIR . '/index.php';
    }

    // Handles submission of the shortened URL
    public function postIndex()
    {
        session_start();
        $url = new UrlEntity($_POST['url']);

        if($url->isValid()){
            $_SESSION['urls'][$url->getShortenedUrl()] = $url;
            $shortenedUrl = urlencode($url->getShortenedUrl());
            header("Location: /shortened.php?url={$shortenedUrl}");
        } else {
            $errorMsg = 'The url provided is invalid.';
            include CONFIG_VIEWS_DIR . 'index.php';
        }
    }

    public function getShortenedUrl()
    {
        session_start();

        $url = $_SESSION['urls'][$_GET['url']];
        include CONFIG_VIEWS_DIR . '/shortened.php';
    }
}
