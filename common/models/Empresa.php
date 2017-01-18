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
 * @property string $Contacto
 * @property string $Cargo_contacto
 * @property integer $Telefono_contacto
 * @property integer $Id_empresa
 * @property string $Convenio
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
            [['Convenio'], 'required'],
            [['Convenio'], 'string'],
            [['Nombre', 'Gerente', 'Cargo_contacto'], 'string', 'max' => 40],
            [['Direccion'], 'string', 'max' => 60],
            [['Contacto'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Nombre' => 'Empresa o Razón social',
            'Direccion' => 'Dirección',
            'Telefono' => 'Teléfono de referencia',
            'Gerente' => 'Gerente',
            'Contacto' => 'Contacto',
            'Cargo_contacto' => 'Cargo del contacto',
            'Telefono_contacto' => 'Teléfono del contacto',
            'Id_empresa' => 'Id Empresa',
            'Convenio' => 'Existe convenio',
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
