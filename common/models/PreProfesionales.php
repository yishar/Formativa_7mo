<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pre_profesionales".
 *
 * @property integer $Id_pre_profesionales
 * @property integer $N_Matricula
 * @property string $Cedula
 * @property integer $Id_empresa
 * @property integer $N_Horas
 *
 * @property Matricula $nMatricula
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
            [['N_Matricula', 'Cedula', 'Id_empresa'], 'required'],
            [['N_Matricula', 'Id_empresa', 'N_Horas'], 'integer'],
            [['Cedula'], 'string', 'max' => 10],
            [['N_Matricula'], 'exist', 'skipOnError' => true, 'targetClass' => Matricula::className(), 'targetAttribute' => ['N_Matricula' => 'N_Matricula']],
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
            'N_Matricula' => 'N  Matricula',
            'Cedula' => 'Cedula',
            'Id_empresa' => 'Id Empresa',
            'N_Horas' => 'N  Horas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNMatricula()
    {
        return $this->hasOne(Matricula::className(), ['N_Matricula' => 'N_Matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['Id_empresa' => 'Id_empresa']);
    }
}
