<?php

/**
 * This is the model class for table "ada_banner".
 *
 * The followings are the available columns in table 'ada_banner':
 * @property string $banner_id
 * @property string $banner_name
 * @property string $channel_id
 * @property integer $agent_id
 * @property integer $banner_width
 * @property integer $banner_height
 * @property string $ad_inputs
 * @property string $up_time
 * @property string $jurl_id
 * @property integer $enabled
 * @property string $area
 * @property string $content
 * @property string $service_type
 *
 * The followings are the available model relations:
 * @property AdaChannel $channel
 */
class AdaBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdaBanner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ada_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_id, banner_width, banner_height, enabled', 'numerical', 'integerOnly'=>true),
			array('banner_name, service_type', 'length', 'max'=>60),
			array('channel_id, jurl_id', 'length', 'max'=>11),
			array('ad_inputs, area', 'length', 'max'=>50),
			array('content', 'length', 'max'=>255),
			array('up_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('banner_id, banner_name, channel_id, agent_id, banner_width, banner_height, ad_inputs, up_time, jurl_id, enabled, area, content, service_type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'channel' => array(self::BELONGS_TO, 'AdaChannel', 'channel_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'banner_id' => 'Banner',
			'banner_name' => 'Banner Name',
			'channel_id' => 'Channel',
			'agent_id' => 'Agent',
			'banner_width' => 'Banner Width',
			'banner_height' => 'Banner Height',
			'ad_inputs' => 'Ad Inputs',
			'up_time' => 'Up Time',
			'jurl_id' => 'Jurl',
			'enabled' => 'Enabled',
			'area' => 'Area',
			'content' => 'Content',
			'service_type' => 'Service Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('banner_id',$this->banner_id,true);
		$criteria->compare('banner_name',$this->banner_name,true);
		$criteria->compare('channel_id',$this->channel_id,true);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('banner_width',$this->banner_width);
		$criteria->compare('banner_height',$this->banner_height);
		$criteria->compare('ad_inputs',$this->ad_inputs,true);
		$criteria->compare('up_time',$this->up_time,true);
		$criteria->compare('jurl_id',$this->jurl_id,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('service_type',$this->service_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
