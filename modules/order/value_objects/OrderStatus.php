<?php

namespace app\modules\order\value_objects;

class OrderStatus
{
    /** @var int */
    public const PENDING = 0;

    /** @var int */
    public const IN_PROGRESS = 1;

    /** @var int */
    public const COMPLETED = 2;

    /** @var int */
    public const CANCELED = 3;

    /** @var int */
    public const FAIL = 4;

    /**
     * @param int $value
     * @return string
     */
    public static function getLabelByValue(int $value): string
    {
        return self::getAllLabels()[$value] ?? '';
    }

    /**
     * @return string[]
     */
    public static function getAllLabels(): array
    {
        return [
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In progress',
            self::COMPLETED => 'Completed',
            self::CANCELED => 'Canceled',
            self::FAIL => 'Fail',
        ];
    }

}