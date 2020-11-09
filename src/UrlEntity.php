<?php

namespace UrlShortener;

class UrlEntity
{
    private $targetUrl;
    private $shortenedUrl;

    public function __construct($targetUrl)
    {
        $this->targetUrk = $targetUrl;
        $this->shortenedUrl = $this->generateRandomToken();
    }

    private function generateRandomToken()
    {
        $characters = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        $token = '';
        for ($i = 0; $i < 8; $i++) {
            $token .= $characters[array_rand($characters)];
        }
        return $token;
    }

    public function getTargetUrl()
    {
        return $this->targetUrl;
    }


    // Returns a short url that will redirect to the target url. 
    // Return string
    public function getShortenedUrl()
    {
        return $this->shortenedUrl;
    }
    // Determines uf the url is valid. The target url must be properly formatted url with either
    // an http or an https scheme
    // return bool
    public function isValid(){
        $validUrl = filter_var($this->targetUrl, FILTER_VALIDATE_URL);

        if($validUrl !== false){
            $protocol = parse_url($validUrl, PHP_URL_SCHEME);
            if($protocol == 'http' || $protocol = 'https'){
                return true;
            }
     
        }
        return false;
    }
}
