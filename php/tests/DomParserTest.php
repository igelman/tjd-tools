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

        /*****************************************************
         *  Tags used for the relevant content blocks.
         **  Article is the main unit, containing things like headline, image, etc.
         **  Headline is the component that we'll look for in the test.
         */
        $this->articleTag = "div";
        $this->articleAttribute = "data-type";
        $this->articleValue = "article";
        $this->headlineTag = "h3";
        $this->headlineAttribute = "class";
        $this->headlineValue = "headline-xlarge";
        /*****************************************************/

        /*****************************************************
         *  Example content.
         **  one-article-html.txt contains one article.
         **  Use DomHandler to create the dom from the file.
         */
        // Maybe a mock object for DomHandler?
        $htmlStr = file_get_contents("one-article-html.txt"/*"test-html.html"*/);
        $domHandlerOneArticle = new DomHandler($htmlStr);
        $domOneArticle = $domHandlerOneArticle->getDom();
        //////////////////////////////////////////
        $this->domParserOneArticle = new DomParser($domOneArticle);

        // For testing purposes, I created a file with serialized versions
        /// of article & headline nodes.
        /// This way the test doesn't depend on DomHandler class.
        $articleNodeObjectSerialized = file_get_contents("articleNodeObject");
        $this->articleNodeObject = unserialize($articleNodeObjectSerialized);

        $headlineNodeObjectSerialized = file_get_contents("headlineNodeObject");
        $this->headlineNodeObject = unserialize($headlineNodeObjectSerialized);
//        echo "Type of headlineNodeObject: " . get_class($this->headlineNodeObject) . PHP_EOL;
//        echo "headline: " . $this->headlineNodeObject->plaintext . PHP_EOL;
//        echo "strpos: " . strpos($this->headlineNodeObject->plaintext, "Lenovo Back to School Sale") . PHP_EOL;


    }

    public function testConstructorCreatesDomParserObject() {
        $this->assertInstanceOf("DomParser", $this->domParserOneArticle);
    }

    public function testGetElementsReturnsArrayOfElements() {
        $articleArray = $this->domParserOneArticle->getElements($this->articleTag, $this->articleAttribute, $this->articleValue);
//        echo "count(\$articleArray): " . count($articleArray) . PHP_EOL;
//        echo $articleArray[0]->plaintext;
        $this->assertInternalType("array",$articleArray);
        $this->assertTrue(count($articleArray) == 1);
    }

//    public function testGetElementsReturnsElements() {
//        $articles = $this->domParser->getElements($this->articleTag, $this->articleAttribute, $this->articleValue);
////        file_put_contents("articleNodeObject",serialize($articles[0])); // used this to store the object for future testing
//        $this->assertEquals(1, count($articles));
//
////        foreach($articles as $articleNode) {
////            $articleParser = new DomParser($articleNode);
////            $headlineTag = "h3";
////            $headlineAttribute = "class";
////            $headlineValue = "headline-xlarge";
////            $headlineNode = $articleParser->getElements($headlineTag, $headlineAttribute, $headlineValue);
////            echo "headlineNode type & count: " . gettype($headlineNode) . count($headlineNode) . PHP_EOL;
////
////
////            echo "headline: " . $headlineNode[0]->plaintext . PHP_EOL;
////            //file_put_contents("headlineNodeObject",serialize($headlineNode[0]));
////        }
//    }
//
//    public function testGetElementPlaintext() {
//        $headlineParser = new DomParser($this->articleNodeObject);
//        $headlineNodes = $headlineParser->getElements($this->headlineTag, $this->headlineAttribute, $this->headlineValue);
//        $headline = $headlineNodes->getElementPlaintext();
//
////        $this->assertTrue(strpos($this->headlineNodeObject->plaintext, "Lenovo Back to School Sale") > 0);
//
//    }

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
