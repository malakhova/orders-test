<?php

namespace app\modules\order\entities;

use yii\db\ActiveRecord;

/**
 * Class Order
 * @package app\modules\order
 *
 * @property integer $id
 * @property string $user
 * @property string $link
 * @property integer $quantity
 * @property integer $service_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $mode
 */
class Order extends ActiveRecord
{
    /** @var string */
    public const ATTR_ID = 'id';

    /** @var string */
    public const ATTR_USER = 'user';

    /** @var string */
    public const ATTR_LINK = 'link';

    /** @var string */
    public const ATTR_QUANTITY = 'quantity';

    /** @var string */
    public const ATTR_SERVICE_ID = 'service_id';

    /** @var string */
    public const ATTR_STATUS = 'status';

    /** @var string */
    public const ATTR_CREATED_AT = 'created_at';

    /** @var string */
    public const ATTR_MODE = 'mode';

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            self::ATTR_ID => \Yii::t('order', 'ID'),
            self::ATTR_USER => \Yii::t('order', 'User'),
            self::ATTR_LINK => \Yii::t('order', 'Link'),
            self::ATTR_SERVICE_ID => \Yii::t('order', 'Service'),
            self::ATTR_QUANTITY => \Yii::t('order', 'Quantity'),
            self::ATTR_STATUS => \Yii::t('order', 'Status'),
            self::ATTR_CREATED_AT => \Yii::t('order', 'Created'),
            self::ATTR_MODE => \Yii::t('order', 'Mode'),
        ];
    }
}