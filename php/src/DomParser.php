<?php
/**
 * Created by PhpStorm.
 * User: aboutuser
 * Date: 8/13/15
 * Time: 12:32 PM
 */

require '../vendor/autoload.php';


class DomParser {

    public function __construct(/* voku\helper\SimpleHtmlDom */ $dom)
    {
        $this->dom = $dom;
    }

    public function getElements($tag, $attribute, $value) {
        $needle = $tag . "[" . $attribute . "=" . $value . "]";
//        echo "tag: $tag" . PHP_EOL . "attribute: $attribute" . PHP_EOL . "value: $value" . PHP_EOL;
//        echo $needle . PHP_EOL;
        $elements = $this->dom->find("$needle");
        return $elements;
    }


}