<?php

declare(strict_types=1);

namespace Francken\Domain\Books;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Francken\Domain\Books\Events\BookOffered;
use Francken\Domain\Books\Events\BookOfferRetracted;
use Francken\Domain\Books\Events\BookPayedFor;
use Francken\Domain\Books\Events\BookSaleCancelled;
use Francken\Domain\Books\Events\BookSaleCompleted;
use Francken\Domain\Books\Events\BookSoldToMember;
use Francken\Domain\Books\Events\BookSoldToNonMember;
use Francken\Domain\Members\MemberId;

final class Book extends EventSourcedAggregateRoot
{
    private $id;
    private $sellersId;
    private $isbn_10;
    private $price;
    private $isSold = false;
    private $isPaid = false;

    public static function offer(BookId $id, MemberId $sellersId, string $isbn, int $price) : self
    {
        $book = new self();
        $book->apply(new BookOffered($id, $sellersId, $isbn, $price));
        return $book;
    }

    public function offerRetracted() : void
    {
        $this->apply(new BookOfferRetracted($this->id));
    }

    public function sellToMember(MemberId $memberId) : void
    {
        if ($this->isSold) {
            throw new \Exception('A book cannot be sold twice');
        }
        $this->isSold = true;
        $this->apply(new BookSoldToMember($this->id, $memberId));
    }

    public function sellToNonMember(Guest $guest) : void
    {
        if ($this->isSold) {
            throw new \Exception('A book cannot be sold twice');
        }
        $this->isSold = true;
        $this->apply(new BookSoldToNonMember($this->id, $guest));
    }

    public function cancelSale() : void
    {
        $this->apply(new BookSaleCancelled($this->id));
    }

    public function completeSale() : void
    {
        $this->apply(new BookSaleCompleted($this->id));
    }

    public function completePayment() : void
    {
        $this->apply(new BookPayedFor($this->id));
    }

    public function applyBookOffered(BookOffered $event) : void
    {
        $this->id = $event->bookId();
        $this->sellersId = $event->sellersId();
        $this->isbn_10 = $event->isbn();
        $this->price = $event->price();
    }

    public function applyBookSoldToMember(BookSoldToMember $event) : void
    {
        // ///@todo Mail bestuah?
        // if($this->isSold)
        //     throw new \Exception("A book cannot be sold twice");
        $this->isSold = true;
    }

    public function applyBookSoldToNonMember(BookSoldToNonMember $event) : void
    {
        // ///@todo Mail bestuah?
        // if($this->isSold)
        //     throw new \Exception("A book cannot be sold twice");
        $this->isSold = true;
    }

    public function applyBookSaleCancelled(BookSaleCancelled $event) : void
    {
        $this->isSold = false;
    }

    public function getAggregateRootId() : string
    {
        return (string)$this->id;
    }
}
