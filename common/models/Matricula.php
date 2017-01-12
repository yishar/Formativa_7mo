<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "matricula".
 *
 * @property integer $N_Matricula
 * @property string $Carrera
 * @property integer $Nivel
 * @property string $Cedula
 *
 * @property PreProfesionales[] $preProfesionales
 * @property Vinculacion[] $vinculacions
 */
class Matricula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matricula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['N_Matricula', 'Cedula'], 'required'],
            [['N_Matricula', 'Nivel'], 'integer'],
            [['Carrera'], 'string', 'max' => 40],
            [['Cedula'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'N_Matricula' => 'N  Matricula',
            'Carrera' => 'Carrera',
            'Nivel' => 'Nivel',
            'Cedula' => 'Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreProfesionales()
    {
        return $this->hasMany(PreProfesionales::className(), ['N_Matricula' => 'N_Matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVinculacions()
    {
        return $this->hasMany(Vinculacion::className(), ['N_Matricula' => 'N_Matricula']);
    }
}
