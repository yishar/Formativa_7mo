<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coordinador_social".
 *
 * @property integer $CedulaCoordi
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
            [['CedulaCoordi'], 'required'],
            [['CedulaCoordi'], 'integer'],
            [['Nombre', 'Apellido'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CedulaCoordi' => 'Cedula Coordi',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
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
