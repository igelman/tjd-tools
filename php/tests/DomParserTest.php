<?php
/**
 * Created by PhpStorm.
 * User: aboutuser
 * Date: 8/13/15
 * Time: 7:34 PM
 */
require '../vendor/autoload.php';
require '../src/DomParser.php';

class DomParserTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $str = file_get_contents("../../test-html.html");
        $this->articleTag = "div";
        $this->articleAttribute = "data-type";
        $this->articleValue = "article";

        $domHandler = new DomHandler($str);
        $dom = $domHandler->getDom();
        $this->domParser = new DomParser($dom);

    }

    public function testConstructorCreatesDomParserObject() {
        $this->assertInstanceOf("DomParser", $this->domParser);
    }

    public function testGetElementsReturnsElements() {
        $articles = $this->domParser->getElements($this->articleTag, $this->articleAttribute, $this->articleValue);
        $this->assertEquals(1, count($articles));

//        foreach($articles as $articleNode) {
//            $articleParser = new DomParser($articleNode);
//            $headlineTag = "h3";
//            $headlineAttribute = "class";
//            $headlineValue = "headline-xlarge";
//            $headlineNode = $articleParser->getElements($headlineTag, $headlineAttribute, $headlineValue);
//            echo "headlineNode type & count: " . gettype($headlineNode) . count($headlineNode) . PHP_EOL;
//
//
//            echo "headline: " . $headlineNode[0]->plaintext . PHP_EOL;
//            //file_put_contents("headlineNodeObject",serialize($headlineNode[0]));
//        }
    }

    public function testGetElementPlaintext() {
        $headlineNodeObjectSerialized = file_get_contents("headlineNodeObject");
        $headlineNodeObject = unserialize($headlineNodeObjectSerialized);
        echo "headline: " . $headlineNodeObject->plaintext . PHP_EOL;

    }

/*
$articleIdPrefix = "content_wide_article_";
$articleDataType = "article";
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
// $ret = $html->find('div[id]');
//    public function testNoting() {


}
