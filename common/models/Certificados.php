<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certificados".
 *
 * @property integer $id_certificado
 * @property string $matricula
 * @property string $file_certificado
 */
class Certificados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'file_certificado'], 'required'],
            [['matricula'], 'string', 'max' => 8],
            [['file_certificado'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_certificado' => 'Id Certificado',
            'matricula' => 'Matricula',
            'file_certificado' => 'File Certificado',
        ];
    }
}
