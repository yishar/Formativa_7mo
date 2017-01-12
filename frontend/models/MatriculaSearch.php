<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Matricula;

/**
 * MatriculaSearch represents the model behind the search form about `common\models\Matricula`.
 */
class MatriculaSearch extends Matricula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['N_Matricula', 'Nivel'], 'integer'],
            [['Carrera', 'Cedula'], 'safe'],
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
        $query = Matricula::find();

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
            'N_Matricula' => $this->N_Matricula,
            'Nivel' => $this->Nivel,
        ]);

        $query->andFilterWhere(['like', 'Carrera', $this->Carrera])
            ->andFilterWhere(['like', 'Cedula', $this->Cedula]);

        return $dataProvider;
    }
}
