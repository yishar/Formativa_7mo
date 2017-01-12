<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property string $Nombre
 * @property string $Direccion
 * @property integer $Telefono
 * @property string $Gerente
 * @property string $Nombre_contacto
 * @property string $Apellido_contacto
 * @property string $Cargo_contacto
 * @property integer $Telefono_contacto
 * @property integer $Id_empresa
 *
 * @property PreProfesionales[] $preProfesionales
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Telefono', 'Telefono_contacto'], 'integer'],
            [['Nombre', 'Gerente', 'Nombre_contacto', 'Apellido_contacto', 'Cargo_contacto'], 'string', 'max' => 40],
            [['Direccion'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Nombre' => 'Nombre',
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
            'Gerente' => 'Gerente',
            'Nombre_contacto' => 'Nombre Contacto',
            'Apellido_contacto' => 'Apellido Contacto',
            'Cargo_contacto' => 'Cargo Contacto',
            'Telefono_contacto' => 'Telefono Contacto',
            'Id_empresa' => 'Id Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreProfesionales()
    {
        return $this->hasMany(PreProfesionales::className(), ['Id_empresa' => 'Id_empresa']);
    }
}
