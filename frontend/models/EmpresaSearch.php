<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `common\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Direccion', 'Gerente', 'Contacto', 'Cargo_contacto', 'Convenio'], 'safe'],
            [['Telefono', 'Telefono_contacto', 'Id_empresa'], 'integer'],
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
        $query = Empresa::find();

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
            'Telefono' => $this->Telefono,
            'Telefono_contacto' => $this->Telefono_contacto,
            'Id_empresa' => $this->Id_empresa,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Gerente', $this->Gerente])
            ->andFilterWhere(['like', 'Contacto', $this->Contacto])
            ->andFilterWhere(['like', 'Cargo_contacto', $this->Cargo_contacto])
            ->andFilterWhere(['like', 'Convenio', $this->Convenio]);

        return $dataProvider;
    }
}
