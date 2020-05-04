<?php

namespace app\modules\order\value_objects;

class OrderMode
{
    /** @var int */
    public const MANUAL = 0;

    /** @var int */
    public const AUTO = 1;

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
            self::MANUAL => \Yii::t('order', 'Manual'),
            self::AUTO => \Yii::t('order', 'Auto'),
        ];
    }
}