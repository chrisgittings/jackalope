<?php

namespace Jackalope;

class WorkspaceTest extends TestCase
{
    public function testConstructor() {
        $session = $this->getMock('\jackalope\Session', array(), array(), '', false);
        $transport = $this->getMock('\jackalope\transport\DavexClient', array(), array('http://example.com'));
        $objManager = $this->getMock('\jackalope\ObjectManager', array(), array($session, $transport, 'a3lkjas'), '', false);
        $name = 'a3lkjas';
        $w = new \jackalope\Workspace($session, $objManager, $name);
        $this->assertSame($session, $w->getSession());
        $this->assertSame($name, $w->getName());
    }

    public function testGetNodeTypeManager() {
        $session = $this->getMock('\jackalope\Session', array(), array(), '', false);
        $transport = $this->getMock('\jackalope\transport\DavexClient', array(), array('http://example.com'));
        $objManager = $this->getMock('\jackalope\ObjectManager', array(), array($session, $transport, 'a3lkjas'), '', false);
        $name = 'a3lkjas';
        $w = new \jackalope\Workspace($session, $objManager, $name);

        $ntm = $w->getNodeTypeManager();
        $this->assertType('\jackalope\NodeType\NodeTypeManager', $ntm);
    }
}