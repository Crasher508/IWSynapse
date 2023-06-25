<?php

class Header
{

    public static function fromArray(array $input) : ?self {
        return new Header($input["planart"] ?? "", $input["zeitstempel"] ?? "", $input["DatumPlan"] ?? "", $input["datei"] ?? "", $input["nativ"] ?? 0, $input["woche"] ?? 0, $input["tageprowoche"] ?? 0, $input["schulnummer"] ?? 0);
    }

    public function __construct(
        private readonly string $planType,
        private readonly string $timeStamp,
        private readonly string $targetDate,
        private readonly string $fileName,
        private readonly int $nativ,
        private readonly int $week,
        private readonly int $daysPerWeek,
        private readonly int $schoolNumber
    ) {}

    public function getPlanType() : string {
        return $this->planType;
    }

    public function getTimeStamp() : string {
        return $this->timeStamp;
    }

    public function getTargetDate() : string {
        return $this->targetDate;
    }

    public function getFileName() : string {
        return $this->fileName;
    }

    public function getNativ() : int {
        return $this->nativ;
    }

    public function getWeek() : int {
        return $this->week;
    }

    public function getDaysPerWeek() : int {
        return $this->daysPerWeek;
    }

    public function getSchoolNumber() : int {
        return $this->schoolNumber;
    }
}