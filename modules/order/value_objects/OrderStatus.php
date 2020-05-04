<?php

namespace app\modules\order\value_objects;

class OrderStatus
{
    /** @var int */
    public const PENDING = 0;
    /** @var string */
    public const TITLE_PENDING = 'Pending';

    /** @var int */
    public const IN_PROGRESS = 1;
    /** @var string */
    public const TITLE_IN_PROGRESS = 'In progress';

    /** @var int */
    public const COMPLETED = 2;
    /** @var string */
    public const TITLE_COMPLETED = 'Completed';

    /** @var int */
    public const CANCELED = 3;
    /** @var string */
    public const TITLE_CANCELED = 'Canceled';

    /** @var int */
    public const FAIL = 4;
    /** @var string */
    public const TITLE_FAIL = 'Fail';

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
            self::PENDING => \Yii::t('order/status', self::TITLE_PENDING),
            self::IN_PROGRESS => \Yii::t('order/status', self::TITLE_IN_PROGRESS),
            self::COMPLETED => \Yii::t('order/status', self::TITLE_COMPLETED),
            self::CANCELED => \Yii::t('order/status', self::TITLE_CANCELED),
            self::FAIL => \Yii::t('order/status', self::TITLE_FAIL),
        ];
    }

}