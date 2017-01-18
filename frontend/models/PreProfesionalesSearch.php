<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PreProfesionales;

/**
 * PreProfesionalesSearch represents the model behind the search form about `common\models\PreProfesionales`.
 */
class PreProfesionalesSearch extends PreProfesionales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_pre_profesionales', 'N_Matricula', 'Id_empresa', 'N_Horas'], 'integer'],
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
        $query = PreProfesionales::find();

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
            'Id_pre_profesionales' => $this->Id_pre_profesionales,
            'N_Matricula' => $this->N_Matricula,
            'Id_empresa' => $this->Id_empresa,
            'N_Horas' => $this->N_Horas,
        ]);

        return $dataProvider;
    }
}
