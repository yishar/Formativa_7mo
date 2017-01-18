<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "labor_social".
 *
 * @property integer $Id_labor_social
 * @property string $Cedula
 * @property integer $Id_actividad
 * @property string $N_horas
 *
 * @property Actividad $idActividad
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
            [['Cedula', 'Id_actividad'], 'required', 'message' => 'Llene todos los datos necesarios'],
            [['Id_actividad'], 'integer'],
            [['Cedula'], 'string', 'max' => 10],
            [['N_horas'], 'integer', 'max' => 700, 'message' => 'El n° de horas realizadas no puede ser superior a 700', 'integerOnly'=>true, 'message' => 'Las horas solo pueden ser valores enteros y no mayor a 1000'],
            [['Id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::className(), 'targetAttribute' => ['Id_actividad' => 'Id_actividad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_labor_social' => 'Id Labor Social',
            'Cedula' => 'Estudiante *',
            'Id_actividad' => 'Actividad *',
            'N_horas' => 'N° Horas realizadas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActividad()
    {
        return $this->hasOne(Actividad::className(), ['Id_actividad' => 'Id_actividad']);
    }

}
