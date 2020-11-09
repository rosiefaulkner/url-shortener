<?php 

namespace UrlShortener;

class UrlController {
    /*
    * Front Page
    */
    public function getIndex(){
        include CONFIG_VIEWS_DIR . '/index.php';
    }
}
