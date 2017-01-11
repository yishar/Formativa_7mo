<?php

namespace frontend\models;

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
            [['Id_labor_social', 'Id_actividad'], 'integer'],
            [['Cedula', 'N_horas'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Id_labor_social' => $this->Id_labor_social,
            'Id_actividad' => $this->Id_actividad,
        ]);

        $query->andFilterWhere(['like', 'Cedula', $this->Cedula])
            ->andFilterWhere(['like', 'N_horas', $this->N_horas]);

        return $dataProvider;
    }
    
}
