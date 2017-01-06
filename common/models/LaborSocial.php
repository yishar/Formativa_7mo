<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "labor_social".
 *
 * @property string $Cedula
 * @property integer $Id_actividad
 * @property string $CedulaCoordi
 * @property string $N_horas
 *
 * @property Actividad $idActividad
 * @property Estudiante $cedula
 */
class LaborSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labor_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cedula', 'Id_actividad', 'CedulaCoordi'], 'required'],
            [['Id_actividad'], 'integer'],
            [['Cedula', 'CedulaCoordi'], 'string', 'max' => 10],
            [['N_horas'], 'string', 'max' => 40],
            [['Id_actividad', 'CedulaCoordi'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::className(), 'targetAttribute' => ['Id_actividad' => 'Id_actividad', 'CedulaCoordi' => 'CedulaCoordi']],
            [['Cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['Cedula' => 'Cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Cedula' => 'Cedula',
            'Id_actividad' => 'Id Actividad',
            'CedulaCoordi' => 'Cedula Coordi',
            'N_horas' => 'N Horas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActividad()
    {
        return $this->hasOne(Actividad::className(), ['Id_actividad' => 'Id_actividad', 'CedulaCoordi' => 'CedulaCoordi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(Estudiante::className(), ['Cedula' => 'Cedula']);
    }
}
