<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LaborSocial;

/**
 * LaborSocialSearch represents the model behind the search form about `common\models\LaborSocial`.
 */
class LaborSocialSearch extends LaborSocial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_actividad', 'Cedula', 'CedulaCoordi', 'N_horas'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LaborSocial::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id_actividad' => $this->Id_actividad,
            'Cedula' => $this->Cedula,
            'CedulaCoordi' => $this->CedulaCoordi,
            'N_horas' => $this->N_horas,
        ]);

        return $dataProvider;
    }
}
