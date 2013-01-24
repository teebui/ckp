<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $id
 * @property integer $user_id
 * @property string $full_name
 * @property string $dob
 * @property integer $gender
 * @property string $email
 * @property string $phone
 * @property string $note
 * @property string $avatar
 * @property integer $is_active
 */
class UserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfile the static model class
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
		return 'user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('user_id, gender, is_active', 'numerical', 'integerOnly'=>true),
			array('full_name, email, avatar', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>20),
			array('dob, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, full_name, dob, gender, email, phone, note, avatar, is_active', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'full_name' => 'Tên đầy đủ',
                    'dob' => 'Ngày sinh',
                    'gender' => 'Giới tính',
                    'email' => 'Email',
                    'phone' => 'Điện thoại',
                    'note' => 'Ghi chú',
                    'avatar' => 'Hình đại diện',
                    'is_active' => 'Kích hoạt',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        protected function afterFind() {

            foreach ($this->metadata->tableSchema->columns as $columnName => $column) {

                if (!strlen($this->$columnName))
                    continue;
                if ($column->dbType == 'date' || $column->dbType == 'datetime') {
                    $this->$columnName = date('d-m-Y', strtotime($this->$columnName));
                }
            }
            return true;
        }
        
        protected function beforeSave() {
            if (parent::beforeSave()) {
                // save datetime 
                foreach ($this->metadata->tableSchema->columns as $columnName => $column) {

                    if (!strlen($this->$columnName))
                        continue;
                    if ($column->dbType == 'date' || $column->dbType == 'datetime') {
                        $this->$columnName = date('Y-m-d', strtotime($this->$columnName));
                    }
                }
                //end datetime
//                $today = date("Y-m-d");
//                if ($this->isNewRecord) {
//                    $this->created_date = $this->last_modified_date = $today;
//                    $this->created_user = $this->last_modified_user = SAuthentication::getIdentityID(); //current login user
//                } else {
//                    $this->last_modified_date = $today;
//                    $this->last_modified_user = SAuthentication::getIdentityID();
//                }
                return true;
            }
            else
                return false;
        }
}