<?php

namespace common\models;

use Yii;
use yii\base\model;

/**
 * This is the model class for table "coordinador_social".
 *
 * @property string $CedulaCoordi
 * @property string $Nombre
 * @property string $Apellido
 *
 * @property Actividad[] $actividads
 */
class CoordinadorSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coordinador_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CedulaCoordi'], 'required', 'message' => 'Ingrese la cédula del coordinador'],
            [['CedulaCoordi'], 'string', 'max' => 10],
            [['Nombre', 'Apellido'], 'string', 'max' => 40, 'message' => 'Sólo se aceptan letras'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CedulaCoordi' => 'CI. Coordinador',
            'Nombre' => 'Nombres completos',
            'Apellido' => 'Apellidos completos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividads()
    {
        return $this->hasMany(Actividad::className(), ['CedulaCoordi' => 'CedulaCoordi']);
    }
}
