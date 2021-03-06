<?php

declare(strict_types=1);

namespace Francken\Application\Members\Registration;

use Broadway\ReadModel\Identifiable as ReadModelInterface;
use Broadway\Serializer\Serializable as SerializableInterface;
use DateTimeImmutable;
use Francken\Domain\Members\Registration\RegistrationRequestId;
use Francken\Domain\Serializable;

final class RequestStatus implements ReadModelInterface, SerializableInterface
{
    use Serializable;

    private $id;
    private $requestee;

    private $hasPersonalInfo;
    private $hasContactInfo;
    private $hasStudyInfo;
    private $hasPaymentInfo;

    private $submittedAt;

    public function __construct(
        RegistrationRequestId $id,
        string $requestee,
        bool $hasPersonalInfo,
        bool $hasContactInfo,
        bool $hasStudyInfo,
        bool $hasPaymentInfo,
        DateTimeImmutable $submittedAt
    ) {
        $this->id = (string)$id;
        $this->requestee = $requestee;
        $this->hasPersonalInfo = $hasPersonalInfo;
        $this->hasContactInfo = $hasContactInfo;
        $this->hasStudyInfo = $hasStudyInfo;
        $this->hasPaymentInfo = $hasPaymentInfo;
        $this->submittedAt = $submittedAt->format('Y-m-d H:i:s');
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function id() : RegistrationRequestId
    {
        return new RegistrationRequestId($this->id);
    }

    public function submittedAt() : DateTimeImmutable
    {
        return new DateTimeImmutable($this->submittedAt);
    }

    public function requestee() : string
    {
        return $this->requestee;
    }

    public function hasPersonalInfo() : bool
    {
        return (bool)$this->hasPersonalInfo;
    }

    public function hasContactInfo() : bool
    {
        return (bool)$this->hasContactInfo;
    }

    public function hasStudyInfo() : bool
    {
        return (bool)$this->hasStudyInfo;
    }

    public function hasPaymentInfo() : bool
    {
        return (bool)$this->hasPaymentInfo;
    }

    public function complete() : bool
    {
        return $this->hasPersonalInfo &&
            $this->hasContactInfo &&
            $this->hasStudyInfo &&
            $this->hasPaymentInfo;
    }
}
