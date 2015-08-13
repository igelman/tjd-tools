<?php
/**
 * Created by PhpStorm.
 * User: igelman
 * Date: 8/13/15
 * Time: 12:17 AM
 */
// MAMP needs to be running so url (localhost:8888/tjd-tools/test-html.html) is available
require '../vendor/autoload.php';

class PhantomTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $this->url = "http://localhost:8888/tjd-tools/test-html.html";
        $this->phantom = new Phantom($this->url);
    }

    public function testPhantomClassExists() {
        $this->assertInstanceOf("Phantom", $this->phantom, "assertInstanceOf Phantom \$this->phantom".PHP_EOL);
    }

    public function testPhantomGetUrl() {
        $this->assertEquals($this->url,$this->phantom->getUrl(),"assertEquals url, getUrl" . PHP_EOL);
    }

    public function testGetPageReturnsHtml() {
        $this->assertTrue(strpos($this->phantom->getResponseHtml(),"This is a test html file.") > 0);
    }
}
