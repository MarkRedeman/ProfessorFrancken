<?php

declare(strict_types=1);

namespace Tests\Francken\Books\Events;

use Francken\Domain\Books\BookId;
use Francken\Domain\Books\Events\BookSaleCancelled;
use Francken\Tests\Domain\EventTestCase as Testcase;

class BookSaleCancelledTest extends Testcase
{
    /** @test */
    public function an_event_holds_data() : void
    {
        $bookId = BookId::generate();

        $event = new BookSaleCancelled($bookId);

        $this->assertEquals($event->bookId(), $bookId);
    }

    protected function createInstance()
    {
        $bookId = BookId::generate();

        return new BookSaleCancelled($bookId);
    }
}
