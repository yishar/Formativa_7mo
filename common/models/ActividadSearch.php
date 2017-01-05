<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Actividad;

/**
 * ActividadSearch represents the model behind the search form about `common\models\Actividad`.
 */
class ActividadSearch extends Actividad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Lugar', 'Fecha_inicio', 'Fecha_fin'], 'safe'],
            [['Id_actividad', 'CedulaCoordi'], 'integer'],
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
        $query = Actividad::find();

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
            'Fecha_inicio' => $this->Fecha_inicio,
            'Fecha_fin' => $this->Fecha_fin,
            'Id_actividad' => $this->Id_actividad,
            'CedulaCoordi' => $this->CedulaCoordi,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Lugar', $this->Lugar]);

        return $dataProvider;
    }
}
