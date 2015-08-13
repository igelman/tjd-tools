<?php
/**
 * Created by PhpStorm.
 * User: aboutuser
 * Date: 8/13/15
 * Time: 3:47 PM
 */
require '../vendor/autoload.php';


class DomHandlerTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $this->str = <<<HTML
<div>
    <div>
        <div class="foo bar">ok</div>
    </div>
</div>
HTML;
        $this->domHandler = new DomHandler($this->str);
    }

    public function testConstructorCreatesDomObject() {
        $this->assertInstanceOf("DomHandler", $this->domHandler);
        $this->assertTrue(strpos(get_class($this->domHandler->getDom()),"SimpleHtmlDom") > 0);
    }

}
