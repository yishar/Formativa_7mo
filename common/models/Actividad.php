<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "actividad".
 *
 * @property string $Nombre
 * @property string $Lugar
 * @property string $Fecha_inicio
 * @property string $Fecha_fin
 * @property integer $Id_actividad
 * @property string $CedulaCoordi
 *
 * @property CoordinadorSocial $cedulaCoordi
 * @property LaborSocial[] $laborSocials
 * @property Estudiante[] $cedulas
 */
class Actividad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha_inicio', 'Fecha_fin'], 'safe'],
            [['CedulaCoordi'], 'required'],
            [['Nombre', 'Lugar'], 'string', 'max' => 40],
            [['CedulaCoordi'], 'string', 'max' => 10],
            [['CedulaCoordi'], 'exist', 'skipOnError' => true, 'targetClass' => CoordinadorSocial::className(), 'targetAttribute' => ['CedulaCoordi' => 'CedulaCoordi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Nombre' => 'Nombre',
            'Lugar' => 'Lugar',
            'Fecha_inicio' => 'Fecha Inicio',
            'Fecha_fin' => 'Fecha Fin',
            'Id_actividad' => 'Id Actividad',
            'CedulaCoordi' => 'Cedula Coordi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulaCoordi()
    {
        return $this->hasOne(CoordinadorSocial::className(), ['CedulaCoordi' => 'CedulaCoordi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaborSocials()
    {
        return $this->hasMany(LaborSocial::className(), ['Id_actividad' => 'Id_actividad', 'CedulaCoordi' => 'CedulaCoordi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulas()
    {
        return $this->hasMany(Estudiante::className(), ['Cedula' => 'Cedula'])->viaTable('labor_social', ['Id_actividad' => 'Id_actividad', 'CedulaCoordi' => 'CedulaCoordi']);
    }
}
