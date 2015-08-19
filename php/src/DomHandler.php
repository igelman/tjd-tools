<?php
/**
 * Created by PhpStorm.
 * User: aboutuser
 * Date: 8/13/15
 * Time: 12:32 PM
 */

require '../vendor/autoload.php';


class DomHandler {

    public function __construct($str)
    {
        $this->dom = voku\helper\HtmlDomParser::str_get_html( $str );

    }

    public function getDom() {
        return $this->dom;
    }

}