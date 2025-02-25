<?php
namespace Crossjoin\Browscap\Formatter;

/**
 * Abstract formatter class
 *
 * The formatter is a simple object to convert the basic browscap settings
 * array into the preferred format. It can also be used to unset unnecessary
 * data or extend the result with addional data from other sources.
 *
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Christoph Ziegenberg <christoph@ziegenberg.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package Crossjoin\Browscap
 * @author Christoph Ziegenberg <christoph@ziegenberg.com>
 * @copyright Copyright (c) 2014-2015 Christoph Ziegenberg <christoph@ziegenberg.com>
 * @version 1.0.0
 * @license http://www.opensource.org/licenses/MIT MIT License
 * @link https://github.com/crossjoin/browscap
 */
abstract class AbstractFormatter
{
    /**
     * Variable to save the settings in, type depends on implementation
     *
     * @var mixed
     */
    protected $settings;

    /**
     * Sets the data (done by the parser)
     *
     * @param array $settings
     */
    abstract public function setData(array $settings);

    /**
     * Gets the data (in the preferred format)
     *
     * @return mixed
     */
    abstract public function getData();
}