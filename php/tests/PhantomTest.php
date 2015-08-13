<?php
/**
 * Created by PhpStorm.
 * User: igelman
 * Date: 8/13/15
 * Time: 12:17 AM
 */

require '../vendor/autoload.php';
echo "hello";
class PhantomTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $this->phantom = new Phantom();
    }

    public function testPhantomClassExists() {
        $this->assertInstanceOf("Phantom", $this->phantom, "assertInstanceOf Phantom \$this->phantom".PHP_EOL);
    }
}
