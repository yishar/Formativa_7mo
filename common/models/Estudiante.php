<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property string $Cedula
 * @property string $Nombre
 * @property string $Apellido
 *
 * @property LaborSocial[] $laborSocials
 * @property Matricula[] $matriculas
 * @property PreProfesionales[] $preProfesionales
 * @property Vinculacion[] $vinculacions
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
            [['Cedula'], 'string', 'max' => 10],
            [['Nombre', 'Apellido'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Cedula' => 'CI. Estudiante',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaborSocials()
    {
        return $this->hasMany(LaborSocial::className(), ['Cedula' => 'Cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['Cedula' => 'Cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreProfesionales()
    {
        return $this->hasMany(PreProfesionales::className(), ['Cedula' => 'Cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVinculacions()
    {
        return $this->hasMany(Vinculacion::className(), ['Cedula' => 'Cedula']);
    }
}
