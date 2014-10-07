<?php
include_once __DIR__ . "/../../app/library/classes/misc/UriPath.class.php";

class UriPathTest extends \PHPUnit_Framework_TestCase
{
	public function testUriPath() {

		$_SERVER['REQUEST_URI'] = "";
		$this->assertEquals("", UriPath::part(0));
		$this->assertEquals("", UriPath::part());

		$_SERVER['REQUEST_URI'] = "foo/";
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("foo", UriPath::part());
		$this->assertEquals("", UriPath::part(1));

		$_SERVER['REQUEST_URI'] = "foo";
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("foo", UriPath::part());

		$_SERVER['REQUEST_URI'] = "foo/bar/choo";
		$this->assertEquals("foo", UriPath::part());
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("bar", UriPath::part(1));
		$this->assertEquals("choo", UriPath::part(2));
	}
	public function testUriPathWithKeys() {

		$_SERVER['REQUEST_URI'] = "foo/?rawr=ohnoes";
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("foo", UriPath::part());

		$_SERVER['REQUEST_URI'] = "foo?rawr=ohnoes";
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("foo", UriPath::part());

		$_SERVER['REQUEST_URI'] = "foo/bar/?rawr=ohnoes";
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("bar", UriPath::part(1));

		$_SERVER['REQUEST_URI'] = "foo/bar?rawr=ohnoes";
		$this->assertEquals("foo", UriPath::part(0));
		$this->assertEquals("bar", UriPath::part(1));
	}
}