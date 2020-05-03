<?php


namespace app\modules\order\entities;

use yii\db\ActiveRecord;

/**
 * Class Service
 * @package app\modules\order\entities
 *
 * @property integer $id
 * @property string $name
 */
class Service extends ActiveRecord
{
    /** @var string */
    public const ATTR_ID = 'id';

    /** @var string */
    public const ATTR_NAME = 'name';

    public static function tableName()
    {
        return 'services';
    }
}