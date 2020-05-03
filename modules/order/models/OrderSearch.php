<?php

namespace app\modules\order\models;

use app\modules\order\entities\Service;
use yii\base\Model;
use app\modules\order\entities\Order;
use yii\data\ArrayDataProvider;
use yii\db\Query;

/**
 * OrderSearch represents the model behind the search form of `app\modules\order\entities\Order`.
 */
class OrderSearch extends Order
{
    /** @var string */
    public const ATTR_SEARCH_COLUMN = 'searchColumn';

    /** @var string */
    public const ATTR_SEARCH_VALUE = 'searchValue';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'integer'],
            [['user', 'link'], 'safe'],
        ];
    }

    public function formName()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function load($data, $formName = null)
    {
        if (isset($data[self::ATTR_SEARCH_COLUMN])) {
            $this->{$data[self::ATTR_SEARCH_COLUMN]} = $data[self::ATTR_SEARCH_VALUE] ?? null;
        }
        return parent::load($data, $formName);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ArrayDataProvider
     */
    public function search($params)
    {
        $query = (new Query())
            ->select([
                Order::tableName() . '.' . Order::ATTR_ID,
                Order::tableName() . '.' . Order::ATTR_USER,
                Order::tableName() . '.' . Order::ATTR_LINK,
                Order::tableName() . '.' . Order::ATTR_QUANTITY,
                Order::tableName() . '.' . Order::ATTR_SERVICE_ID,
                Service::tableName() . '.' . Service::ATTR_NAME . ' as service_name',
                Order::tableName() . '.' . Order::ATTR_STATUS,
                Order::tableName() . '.' . Order::ATTR_MODE,
                Order::tableName() . '.' . Order::ATTR_CREATED_AT,
            ])
            ->from(Order::tableName())
            ->leftJoin(
                Service::tableName(),
                Order::tableName() . '.' . Order::ATTR_SERVICE_ID . '=' . Service::tableName(). '.' . Service::ATTR_ID
            );

        // add conditions that should always apply here
        $dataProvider = new ArrayDataProvider([
            'allModels' => $query->all(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            Order::tableName() . '.' . Order::ATTR_ID => $this->id,
            Order::tableName() . '.' . Order::ATTR_QUANTITY => $this->quantity,
            Order::tableName() . '.' . Order::ATTR_SERVICE_ID => $this->service_id,
            Order::tableName() . '.' . Order::ATTR_STATUS => $this->status,
            Order::tableName() . '.' . Order::ATTR_CREATED_AT => $this->created_at,
            Order::tableName() . '.' . Order::ATTR_MODE => $this->mode,
        ]);

        $query->andFilterWhere(['like', Order::tableName() . '.' . Order::ATTR_USER, $this->user])
            ->andFilterWhere(['like', Order::tableName() . '.' . Order::ATTR_LINK, $this->link]);

        $dataProvider->allModels = $query->all();

        return $dataProvider;
    }
}
