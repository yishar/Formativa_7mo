<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property integer $Cedula
 * @property string $Nombres
 * @property string $Apellidos
 *
 * @property LaborSocial[] $laborSocials
 * @property Actividad[] $idActividads
 * @property Matricula[] $matriculas
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cedula'], 'required'],
            [['Cedula'], 'integer'],
            [['Nombres', 'Apellidos'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Cedula' => 'Cedula',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaborSocials()
    {
        return $this->hasMany(LaborSocial::className(), ['CedulaCoordi' => 'Cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActividads()
    {
        return $this->hasMany(Actividad::className(), ['Id_actividad' => 'Id_actividad', 'CedulaCoordi' => 'Cedula'])->viaTable('labor_social', ['CedulaCoordi' => 'Cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['Cedula' => 'Cedula']);
    }
}
