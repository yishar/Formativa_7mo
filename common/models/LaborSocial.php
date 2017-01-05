<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "labor_social".
 *
 * @property integer $Id_actividad
 * @property integer $Cedula
 * @property integer $CedulaCoordi
 * @property integer $N_horas
 *
 * @property Actividad $idActividad
 * @property Estudiante $cedulaCoordi
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
            [['Id_actividad', 'Cedula', 'CedulaCoordi'], 'required'],
            [['Id_actividad', 'Cedula', 'CedulaCoordi', 'N_horas'], 'integer'],
            [['Id_actividad', 'Cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::className(), 'targetAttribute' => ['Id_actividad' => 'Id_actividad', 'Cedula' => 'CedulaCoordi']],
            [['CedulaCoordi'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['CedulaCoordi' => 'Cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_actividad' => 'Actividad realizada',
            'Cedula' => 'CI. Estudiante',
            'CedulaCoordi' => 'CI. Coordinador',
            'N_horas' => 'N° Horas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActividad()
    {
        return $this->hasOne(Actividad::className(), ['Id_actividad' => 'Id_actividad', 'CedulaCoordi' => 'Cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulaCoordi()
    {
        return $this->hasOne(Estudiante::className(), ['Cedula' => 'CedulaCoordi']);
    }
}
