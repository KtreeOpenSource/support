<?php namespace Cartalyst\Support\Tests\Traits;
/**
 * Part of the Support package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package    Support
 * @version    1.1.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use PHPUnit_Framework_TestCase;
use Cartalyst\Support\Traits\RepositoryTrait;

class RepositoryTraitTest extends PHPUnit_Framework_TestCase {

	/** @test **/
	public function it_can_set_and_retrieve_the_model()
	{
		$repository = new RepositoryTraitStub;

		$repository->setModel('FooModelStub');

		$this->assertEquals('FooModelStub', $repository->getModel());
	}

	/** @test **/
	public function it_can_create_a_model()
	{
		$repository = new RepositoryTraitStub;

		$repository->setModel('StdClass');

		$this->assertInstanceOf('StdClass', $repository->createModel());
	}

	/** @test */
	public function it_can_call_dynamic_methods()
	{
		$repository = new RepositoryTraitStub;

		$repository->setModel('Cartalyst\Support\Tests\Traits\FooModelStub');

		$this->assertEquals('Cartalyst\Support\Tests\Traits\FooModelStub', $repository->getModel());

		$this->assertSame('bar', $repository->foo());
	}

}

class RepositoryTraitStub {

	use RepositoryTrait;

}

class FooModelStub {

	public function foo()
	{
		return 'bar';
	}

}