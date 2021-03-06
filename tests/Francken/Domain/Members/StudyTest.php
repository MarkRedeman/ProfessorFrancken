<?php

declare(strict_types=1);

namespace Tests\Francken\Domain\Members;

use DateTimeImmutable;
use Francken\Domain\Members\Study;
use Francken\Tests\SetupReconstitution;

class StudyTest extends \PHPUnit\Framework\TestCase
{
    use SetupReconstitution;

    /** @test */
    public function it_is_constructed_with_study_details() : void
    {
        $study = new Study(
            'Msc Applied Mathematics',
            new DateTimeImmutable('01-08-2011'),
            new DateTimeImmutable('01-08-2014')
        );

        $this->assertEquals('Msc Applied Mathematics', $study->study());
        $this->assertEquals(new DateTimeImmutable('01-08-2011'), $study->startDate());
        $this->assertEquals(new DateTimeImmutable('01-08-2014'), $study->graduationDate());
    }

    /** @test */
    public function the_graduation_date_is_optional() : void
    {
        $study= new Study(
            'Msc Applied Mathematics',
            new DateTimeImmutable('01-08-2011')
        );

        $this->assertNull($study->graduationDate());
    }


    /** @test */
    public function it_is_serializable() : void
    {
        $study = new Study(
            'Msc Applied Mathematics',
            new DateTimeImmutable('01-08-2011'),
            new DateTimeImmutable('01-08-2014')
        );

        $this->assertEquals(
            $study,
            Study::deserialize($study->serialize())
        );
    }
}
