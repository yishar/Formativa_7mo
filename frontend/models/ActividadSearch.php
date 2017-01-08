<?php

namespace frontend\models;

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
            [['Nombre', 'Lugar', 'Fecha_inicio', 'Fecha_fin', 'CedulaCoordi'], 'safe'],
            [['Id_actividad'], 'integer'],
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
            'Fecha_inicio' => $this->Fecha_inicio,
            'Fecha_fin' => $this->Fecha_fin,
            'Id_actividad' => $this->Id_actividad,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Lugar', $this->Lugar])
            ->andFilterWhere(['like', 'CedulaCoordi', $this->CedulaCoordi]);

        return $dataProvider;
    }
}
