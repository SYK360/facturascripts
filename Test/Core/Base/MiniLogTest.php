<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2017-2020 Carlos Garcia Gomez <carlos@facturascripts.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace FacturaScripts\Test\Core\Base;

use FacturaScripts\Core\Base\MiniLog;
use PHPUnit\Framework\TestCase;

/**
 * Description of MiniLogTest
 *
 * @author Carlos Carlos Garcia Gomez <carlos@facturascripts.com>
 * @covers \FacturaScripts\Core\Base\MiniLog
 */
class MiniLogTest extends TestCase
{

    /**
     * @var MiniLog
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new MiniLog('test');
    }

    /**
     * @covers \FacturaScripts\Core\Base\MiniLog::clear
     */
    public function testClear()
    {
        $this->object->notice('sql');
        $this->object->clear();
        $this->assertEmpty($this->object->read());
    }

    /**
     * @covers \FacturaScripts\Core\Base\MiniLog::critical
     */
    public function testCritical()
    {
        $level = ['critical'];
        $this->object->clear();
        $this->object->critical('critical');
        $data = $this->object->read($level);

        $this->assertEquals(1, count($data));
        $this->assertEquals($data[0]['level'], $level[0]);
        $this->assertEquals($data[0]['message'], 'critical');
        $this->assertEmpty($data[0]['context']);
    }

    /**
     * @covers \FacturaScripts\Core\Base\MiniLog::debug
     */
    public function testDebug()
    {
        $level = ['debug'];
        $this->object->clear();
        $this->object->debug('debug');
        $data = $this->object->read($level);

        $this->assertEquals(1, count($data));
        $this->assertEquals($data[0]['level'], $level[0]);
        $this->assertEquals($data[0]['message'], 'debug');
        $this->assertEmpty($data[0]['context']);
    }

    /**
     * @covers \FacturaScripts\Core\Base\MiniLog::error
     */
    public function testError()
    {
        $level = ['error'];
        $this->object->clear();
        $this->object->error('error');
        $data = $this->object->read($level);

        $this->assertEquals(1, count($data));
        $this->assertEquals($data[0]['level'], $level[0]);
        $this->assertEquals($data[0]['message'], 'error');
        $this->assertEmpty($data[0]['context']);
    }

    /**
     * @covers \FacturaScripts\Core\Base\MiniLog::notice
     */
    public function testNotice()
    {
        $level = ['notice'];
        $this->object->clear();
        $this->object->notice('notice');
        $data = $this->object->read($level);

        $this->assertEquals(1, count($data));
        $this->assertEquals($data[0]['level'], $level[0]);
        $this->assertEquals($data[0]['message'], 'notice');
        $this->assertEmpty($data[0]['context']);
    }

    /**
     * @covers \FacturaScripts\Core\Base\MiniLog::warning
     */
    public function testWarning()
    {
        $level = ['warning'];
        $this->object->clear();
        $this->object->warning('warning');
        $data = $this->object->read($level);

        $this->assertEquals(1, count($data));
        $this->assertEquals($data[0]['level'], $level[0]);
        $this->assertEquals($data[0]['message'], 'warning');
        $this->assertEmpty($data[0]['context']);
    }
}
