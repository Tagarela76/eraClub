<?php

class News extends CActiveRecord
{
    public $id;
    public $description;
    public $image;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{news}}';
    }

     /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('id, description, image', 'safe'),
            array('id, description, image', 'safe', 'on' => 'search'),
        );
    }
    
     public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'description' => 'Описание',
            'image' => 'Рисунок',
        );
    }
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}