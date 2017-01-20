<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pre_profesionales".
 *
 * @property integer $Id_pre_profesionales
 * @property integer $N_Matricula
 * @property integer $Id_empresa
 * @property integer $N_Horas
 *
 * @property Empresa $idEmpresa
 */
class PreProfesionales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pre_profesionales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha_inicio', 'Fecha_fin'], 'safe'],
            [['N_Matricula', 'Id_empresa'], 'required'],
            [['N_Matricula', 'Id_empresa', 'N_Horas'], 'integer'],
            [['Id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['Id_empresa' => 'Id_empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_pre_profesionales' => 'Id Pre Profesionales',
            'N_Matricula' => 'N°  Matrícula',
            'Id_empresa' => 'Empresa o Razón social',
            'N_Horas' => 'N° de horas realizadas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['Id_empresa' => 'Id_empresa']);
    }
    
}
