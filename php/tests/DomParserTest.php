<?php
/**
 * Created by PhpStorm.
 * User: aboutuser
 * Date: 8/13/15
 * Time: 7:34 PM
 */
require '../vendor/autoload.php';


class DomParserTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $str = file_get_contents("../../test-html.html");
        //$str = file_get_contents("./data/dealnews.htm");
        $this->domHandler = new DomHandler($str);
        $this->dom = $this->domHandler->getDom();
//        echo "dom class: ";
//        print_r(get_class($this->dom));

        $articleIdPrefix = "content_wide_article_";
        $articleDataType = "article";
/*
div data-type='article' data-id
-div.content-image
--img.data-src
-div.content-specs
--h3.headline-xlarge
---a.content-wide-heading href
----innertext
--div.hotness info
---img src, title ("hotness: 5/5")
--div.content-date
---time.datetime
--div.content-body
*/
    }
// $ret = $html->find('div[id]');
    public function testNoting() {

        $articles = $this->dom->find("div[data-type=article]", 0)->plaintext;
        echo "articles type: " . gettype($articles) . PHP_EOL;
        echo "articles size: " . count($articles) . PHP_EOL;
        $string = var_dump($articles);
        echo $string;
//        print_r($articles);
        $this->assertTrue(true);
    }
}
