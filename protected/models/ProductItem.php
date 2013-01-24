<?php

/**
 * This is the model class for table "product_item".
 *
 * The followings are the available columns in table 'product_item':
 * @property string $id
 * @property integer $category_id
 * @property string $name
 * @property string $code
 * @property string $image
 * @property string $brief
 * @property string $description
 * @property string $related_url
 * @property integer $price
 * @property string $unit
 * @property integer $quantity
 * @property string $created_dt
 * @property string $last_modified_dt
 * @property integer $created_user_id
 * @property integer $last_modified_user_id
 * @property integer $is_active
 */
class ProductItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductItem the static model class
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
		return 'product_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, code, brief, description, related_url, created_dt, last_modified_dt, created_user_id, last_modified_user_id', 'required'),
			array('category_id, price, quantity, created_user_id, last_modified_user_id, is_active', 'numerical', 'integerOnly'=>true),
			array('name, image, related_url', 'length', 'max'=>255),
			array('code, unit', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, name, code, image, brief, description, related_url, price, unit, quantity, created_dt, last_modified_dt, created_user_id, last_modified_user_id, is_active', 'safe', 'on'=>'search'),
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
                'category_id' => 'Nhóm sản phẩm',
                'name' => 'Tên sản phẩm',
                'code' => 'Mã',
                'image' => 'Hình ảnh',
                'brief' => 'Giới thiệu',
                'description' => 'Thông tin chi tiết',
                'related_url' => 'Đường dẫn liên quan',
                'price' => 'Giá',
                'unit' => 'Đơn vị',
                'quantity' => 'Số lượng',
                'created_dt' => 'Ngày khởi tạo',
                'last_modified_dt' => 'Sửa lần cuối',
                'created_user_id' => 'Người khởi tạo',
                'last_modified_user_id' => 'Người sửa lần cuối',
                'is_active' => 'Trạng thái',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('related_url',$this->related_url,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('created_dt',$this->created_dt,true);
		$criteria->compare('last_modified_dt',$this->last_modified_dt,true);
		$criteria->compare('created_user_id',$this->created_user_id);
		$criteria->compare('last_modified_user_id',$this->last_modified_user_id);
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
            $today = date("Y-m-d");
            if ($this->isNewRecord) {
                $this->created_dt = $this->last_modified_dt = $today;
                $this->created_user_id = $this->last_modified_user_id = $_SESSION['nc_usn']; //current login user
            } else {
                $this->last_modified_date = $today;
                $this->last_modified_user = SAuthentication::getIdentityID();
            }
            return true;
        }
        else
            return false;
    }
}