<?php

/**
 * This is the model class for table "g_person".
 *
 * The followings are the available columns in table 'g_person':
 * @property integer $id
 * @property string $employee_code
 * @property string $employee_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $sex_id
 * @property integer $religion_id
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $pos_code
 * @property string $identity_number
 * @property string $identity_valid
 * @property string $identity_address1
 * @property string $identity_address2
 * @property string $identity_address3
 * @property string $identity_pos_code
 * @property string $email
 * @property string $email2
 * @property string $blood_id
 * @property string $home_phone
 * @property string $handphone
 * @property string $handphone2
 * @property string $c_pathfoto
 * @property integer $userid
 * @property integer $t_status
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property GLeave[] $gLeaves
 * @property GPersonAbsence[] $gPersonAbsences
 * @property GPersonEducation[] $gPersonEducations
 * @property GPersonFamily[] $gPersonFamilies
 * @property GPersonKarir[] $gPersonKarirs
 */

class gPerson extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return gPerson the static model class
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
		return 'g_person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('employee_name, birth_place, birth_date', 'required'),
				array('birth_date', 'date', 'format' => 'dd-MM-yyyy'),
				array('sex_id, religion_id, userid, t_status, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly'=>true),
				array('employee_code, address3, identity_address3, blood_id', 'length', 'max'=>10),
				array('employee_name, email, email2', 'length', 'max'=>100),
				array('birth_place', 'length', 'max'=>20),
				array('address1, identity_address1, c_pathfoto', 'length', 'max'=>255),
				array('c_pathfoto', 'unique'),
				array('address2, identity_address2, home_phone, handphone, handphone2, account_number, account_name, bank_name', 'length', 'max'=>50),
				array('pos_code, identity_pos_code', 'length', 'max'=>5),
				array('identity_number', 'length', 'max'=>25),
				array('birth_date, identity_valid', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, employee_code, employee_name, birth_place, birth_date, sex_id, religion_id, address1, address2, address3, pos_code, identity_number, identity_valid, identity_address1, identity_address2, identity_address3, identity_pos_code, email, email2, blood_id, home_phone, handphone, handphone2, c_pathfoto, userid, t_status, created_date, created_by, updated_date, updated_by', 'safe', 'on'=>'search'),
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
				'many_career' => array(self::HAS_MANY, 'gPersonCareer', 'parent_id','order' => 'many_career.start_date DESC'),
				'many_status' => array(self::HAS_MANY, 'gPersonStatus', 'parent_id','order' => 'many_status.start_date DESC'),
				'many_experience' => array(self::HAS_MANY, 'gPersonExperience', 'parent_id','order' => 'many_experience.start_date DESC'),
				'many_education' => array(self::HAS_MANY, 'gPersonEducation', 'parent_id','order' => 'many_education.level_id DESC'),
				'many_educationnf' => array(self::HAS_MANY, 'gPersonEducationNf', 'parent_id'),
				'many_family' => array(self::HAS_MANY, 'gPersonFamily', 'parent_id','order' => 'many_family.relation_id'),
				'has_couple' => array(self::STAT, 'gPersonFamily', 'parent_id','condition'=>'relation_id = 1 OR relation_id = 2'),
				'count_children' => array(self::STAT, 'gPersonFamily', 'parent_id','condition'=>'relation_id = 3'),
				'religion' => array(self::BELONGS_TO, 'sParameter', array('religion_id'=>'code'),'condition'=>'type = \'cAgama\''),
				'sex' => array(self::BELONGS_TO, 'sParameter', array('sex_id'=>'code'),'condition'=>'type = \'cKelamin\''),
				'company' => 
					array(self::HAS_ONE, 'gPersonCareer', 'parent_id',
						//'order' => 'company.start_date DESC',
						'condition'=>'company.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).')',
					),
				'companyfirst' => array(self::HAS_ONE, 'gPersonCareer', 'parent_id','order' => 'companyfirst.start_date ASC','condition'=>'companyfirst.status_id =1'),
				'status' => array(self::HAS_ONE, 'gPersonStatus', 'parent_id','order' => 'status.start_date DESC'),
				'leave' => array(self::HAS_MANY, 'gLeave', 'parent_id','order' => 'leave.start_date DESC'),
				'leaveBalance' => array(self::HAS_ONE, 'gLeave', 'parent_id','order' => 'leaveBalance.end_date DESC','condition'=>'leaveBalance.approved_id NOT IN (1,8)'),
				'leaveGenerated' => array(self::HAS_ONE, 'gLeave', 'parent_id','order' => 'leaveGenerated.end_date DESC','condition'=>'leaveGenerated.approved_id = 9 OR leaveGenerated.approved_id = 7'),
				'lastLeave' => array(self::HAS_ONE, 'gLeave', 'parent_id','order' => 'lastLeave.end_date DESC','condition'=>'lastLeave.approved_id = 2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'employee_code' => 'Employee Code',
				'employee_name' => 'Employee Name',
				'birth_place' => 'Birth Place',
				'birth_date' => 'Birth Date',
				'sex_id' => 'Sex',
				'religion_id' => 'Religion',
				'address1' => 'Address',
				'address2' => 'Address2',
				'address3' => 'Address3',
				'pos_code' => 'Pos Code',
				'identity_number' => 'Identity Number',
				'identity_valid' => 'Valid',
				'identity_address1' => 'Address',
				'identity_address2' => 'Identity Address2',
				'identity_address3' => 'Identity Address3',
				'identity_pos_code' => 'Identity Pos Code',
				'email' => 'Email',
				'email2' => 'Email2',
				'blood_id' => 'Blood',
				'home_phone' => 'Home Phone',
				'handphone' => 'Handphone',
				'handphone2' => 'Handphone2',
				'account_number' => 'Account Number',
				'account_name' => 'Account Name',
				'bank_name' => 'Bank Name',
				'c_pathfoto' => 'C Pathfoto',
				'userid' => 'Userid',
				't_status' => 'T Status',
				'created_date' => 'Created Date',
				'created_by' => 'Created By',
				'updated_date' => 'Updated Date',
				'updated_by' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function sameDepartment($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->order='company.level_id';
		
		$criteria1 = new CDbCriteria; //JOIN, JOIN CONTINUED, ROTATION
		$criteria1->condition = '(select status_id from g_person_career s where s.parent_id = t.id AND s.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY start_date DESC LIMIT 1) IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).')';
		
		$criteria2 = new CDbCriteria;
		$criteria2->condition = '(select department_id from g_person_career s where s.parent_id = t.id AND s.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY start_date DESC LIMIT 1) ='.$id;

		$criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
		$criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY).')';

		$criteria->mergeWith($criteria1);
		$criteria->mergeWith($criteria2);
		$criteria->mergeWith($criteria3);

		//$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		return new CActiveDataProvider($this, array(
		//return new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>20,
				),
				//'pagination'=>false,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function sameLevel($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->order='company.department_id ';
		$criteria->order='t.updated_date DESC';
		
		//if (Yii::app()->user->name != "admin") {
			$criteria->addInCondition('company.company_id',sUser::model()->getGroupArray());
		//} else {
		//	$criteria->addInCondition('company.company_id',array(sUser::model()->getGroup()));
		//}
		
		$criteria1 = new CDbCriteria; //JOIN, JOIN CONTINUED, ROTATION
		$criteria1->condition = '(select status_id from g_person_career s where s.parent_id = t.id AND s.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY start_date DESC LIMIT 1) IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).')';
		
		$criteria2 = new CDbCriteria;
		$criteria2->condition = '(select level_id from g_person_career s where s.parent_id = t.id AND s.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY start_date DESC LIMIT 1) ='.$id;

		$criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
		$criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY).')';

		$criteria->mergeWith($criteria1);
		$criteria->mergeWith($criteria2);
		$criteria->mergeWith($criteria3);

		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		//return new CActiveDataProvider($this, array(
		return new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>20,
				),
				//'pagination'=>false,
		));
	}
	

	public static function getTopCreated() {

		$criteria=new CDbCriteria;
		$criteria->limit=10;
		$criteria->order="created_date DESC";
		if (Yii::app()->user->name != "admin") {
			$criteria1 = new CDbCriteria;
			$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY c.start_date DESC LIMIT 1) IN ('.implode(",",sUser::model()->getGroupArray()).')' ;
			$criteria->mergeWith($criteria1);
		}
		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$_nama= (strlen($model->employee_name) >28) ? substr($model->employee_name,0,28)."..." : $model->employee_name;
			$returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon'=>'list-alt', 'url' => array('view','id'=>$model->id));
		}

		return $returnarray;
	}

	public static function getTopUpdated() {

		$criteria=new CDbCriteria;
		$criteria->limit=10;
		$criteria->order="t.updated_date DESC";
		if (Yii::app()->user->name != "admin") {
			$criteria1 = new CDbCriteria;
			$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY c.start_date DESC LIMIT 1) IN ('.implode(",",sUser::model()->getGroupArray()).')' ;
			$criteria->mergeWith($criteria1);
		}
		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$_nama= (strlen($model->employee_name) >28) ? substr($model->employee_name,0,28)."..." : $model->employee_name;
			$returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon'=>'list-alt', 'url' => array('view','id'=>$model->id,));
		}

		return $returnarray;
	}

	public static function getTopRelated($name) {

		$_exp=explode(" ",$name);


		$criteria=new CDbCriteria;
		//$criteria->compare('account_name',$_related,true,'OR');

		if (isset($_exp[0]))
			$criteria->compare('account_name',$_exp[0],true,'OR');

		if (isset($_exp[1]))
			$criteria->compare('account_name',$_exp[1],true,'OR');
			
		$criteria->limit=10;
		$criteria->order='t.updated_date DESC';

		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$returnarray[] = array('id' => $model->account_name, 'label' => $model->employee_name, 'url' => array('view','id'=>$model->id,'en'=>$model->employee_name));
		}

		return $returnarray;
	}
	
	public function countJoinDate()
	{
		if (isset($this->companyfirst) && !in_array((int)$this->mStatusId(),Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) {
			$diff = abs(strtotime($this->companyfirst->start_date) - time());
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			return $years." years, ". $months ." months, ".$days ." days";
		} else 
			return "";
		
	}

	public function countContract()
	{
		if (isset($this->companyfirst) && !in_array((int)$this->mStatusId(),Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) && $this->mStatusId() !=6 ) {
			if (isset($this->status->end_date)) {
				$diff = abs(strtotime($this->mStatusEndDate()) - time());
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

				if (strtotime($this->mStatusEndDate()) > time()) {
					if ($months ==0) {
						return $days ." days left";
					} else	
						return $months ." months, ".$days ." days left";
				} else {
					if ($months ==0) {
						return $days ." days expired";
					} else	
						return $months ." months, ".$days ." days expired";
				}
			}	
		} else 
			return "";
	}
	
	public function countBirthdate()
	{
		$diff = abs(strtotime(date('y').'-'.date('m',strtotime($this->birth_date)).'-'.date('d',strtotime($this->birth_date))) - time());
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		if ($days == 0) {
			$_value="Today";
		} elseif ($days == 1) {
			$_value="Tomorrow";
		} else
			$_value=$days." Days to go";
		
		return $_value;
	}

	public function countAge() //round up and round down
	{
		$diff = abs(strtotime($this->birth_date) - time());
		$years = round($diff / (365*60*60*24));

		return $years." years old";
	}
	
	public function countAgeRoundDown() //round down, exact_age
	{
		$diff = abs(strtotime($this->birth_date) - time());
		$years = floor($diff / (365*60*60*24));

		return $years;
	}

	public function compSex() {

		$_item=array();
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF((select d.sex_id from g_person d where d.id = a.id)= 1,1,0)) as l1,
		SUM(IF((select d.sex_id from g_person d where d.id = a.id)= 2,1,0)) as l2
		
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 

		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
			
		return $_item;
	}

	
	public function compAge() {

		$_item=array();
		$_age = "DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT((select d.birth_date from g_person d where d.id = a.id), '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT((select d.birth_date from g_person d where d.id = a.id), '00-%m-%d'))";
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF(".$_age." <= 25,1,0)) as l1,
		SUM(IF(".$_age." > 25 AND ".$_age." <=30,1,0)) as l2,
		SUM(IF(".$_age." > 30 AND ".$_age." <=35,1,0)) as l3,
		SUM(IF(".$_age." > 35 AND ".$_age." <=40,1,0)) as l4,
		SUM(IF(".$_age." > 40 AND ".$_age." <=45,1,0)) as l5,
		SUM(IF(".$_age." > 45 AND ".$_age." <=50,1,0)) as l6,
		SUM(IF(".$_age." > 50 AND ".$_age." <=55,1,0)) as l7,
		SUM(IF(".$_age." > 55,1,0)) as l8
		
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
		$_item[]=(int)$row[0]['l3'];
		$_item[]=(int)$row[0]['l4'];
		$_item[]=(int)$row[0]['l5'];
		$_item[]=(int)$row[0]['l6'];
		$_item[]=(int)$row[0]['l7'];
		$_item[]=(int)$row[0]['l8'];
			
		return $_item;
	}


	public function compLevel() {

		$_item=array();
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF((select g.parent_id from g_person_career d INNER JOIN g_param_level g ON d.level_id = g.id where d.parent_id = a.id order by d.start_date DESC limit 1)= 21,1,0)) as l1,
		SUM(IF((select g.parent_id from g_person_career d INNER JOIN g_param_level g ON d.level_id = g.id where d.parent_id = a.id order by d.start_date DESC limit 1)= 17,1,0)) as l2,
		SUM(IF((select g.parent_id from g_person_career d INNER JOIN g_param_level g ON d.level_id = g.id where d.parent_id = a.id order by d.start_date DESC limit 1)= 13,1,0)) as l3,
		SUM(IF((select g.parent_id from g_person_career d INNER JOIN g_param_level g ON d.level_id = g.id where d.parent_id = a.id order by d.start_date DESC limit 1)= 9,1,0)) as l4,
		SUM(IF((select g.parent_id from g_person_career d INNER JOIN g_param_level g ON d.level_id = g.id where d.parent_id = a.id order by d.start_date DESC limit 1)= 5,1,0)) as l5,
		SUM(IF((select g.parent_id from g_person_career d INNER JOIN g_param_level g ON d.level_id = g.id where d.parent_id = a.id order by d.start_date DESC limit 1)= 1,1,0)) as l6
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
		$_item[]=(int)$row[0]['l3'];
		$_item[]=(int)$row[0]['l4'];
		$_item[]=(int)$row[0]['l5'];
		$_item[]=(int)$row[0]['l6'];
			
		return $_item;
	}
	
	public function compWorking() {

		$_item=array();
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF(YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) < 1,1,0)) as l1,
		SUM(IF(YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 1 OR YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 2,1,0)) as l2,
		SUM(IF(YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 3 OR YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 4,1,0)) as l3,
		SUM(IF(YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 5 OR YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 6,1,0)) as l4,
		SUM(IF(YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 7 OR YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) = 8,1,0)) as l5,
		SUM(IF(YEAR(CURDATE()) - YEAR((SELECT d.start_date FROM g_person_career d WHERE d.parent_id = a.id AND d.status_id = 1 order by d.start_date limit 1)) >8,1,0)) as l6
		
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
		$_item[]=(int)$row[0]['l3'];
		$_item[]=(int)$row[0]['l4'];
		$_item[]=(int)$row[0]['l5'];
		$_item[]=(int)$row[0]['l6'];
			
		return $_item;
	}
	
	public function compEducation() {

		$_item=array();
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 1,1,0)) as l1,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 2,1,0)) as l2,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 3,1,0)) as l3,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 4 OR (select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1) = 5 OR (select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1) = 6 OR (select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1) = 7,1,0)) as l4,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 8,1,0)) as l5,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 9,1,0)) as l6,
		SUM(IF((select d.level_id from g_person_education d where d.parent_id = a.id order by d.level_id DESC limit 1)= 10,1,0)) as l7
		
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
		$_item[]=(int)$row[0]['l3'];
		$_item[]=(int)$row[0]['l4'];
		$_item[]=(int)$row[0]['l5'];
		$_item[]=(int)$row[0]['l6'];
		$_item[]=(int)$row[0]['l7'];
			
		return $_item;
	}
	
	public function compReligion() {

		$_item=array();
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF((select d.religion_id from g_person d where d.id = a.id)= 1,1,0)) as l1,
		SUM(IF((select d.religion_id from g_person d where d.id = a.id)= 2,1,0)) as l2,
		SUM(IF((select d.religion_id from g_person d where d.id = a.id)= 3,1,0)) as l3,
		SUM(IF((select d.religion_id from g_person d where d.id = a.id)= 4,1,0)) as l4,
		SUM(IF((select d.religion_id from g_person d where d.id = a.id)= 5,1,0)) as l5,
		SUM(IF((select d.religion_id from g_person d where d.id = a.id)= 6,1,0)) as l6
		
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
		$_item[]=(int)$row[0]['l3'];
		$_item[]=(int)$row[0]['l4'];
		$_item[]=(int)$row[0]['l5'];
		$_item[]=(int)$row[0]['l6'];
			
		return $_item;
	}

	public function compDepartment() {

		$default=sUser::model()->getGroup();
		$org=aOrganization::model()->find('parent_id = '.$default);
		$dept=$org->childs[0]->id;
		$models=aOrganization::model()->findAll(array('condition'=>'parent_id ='.$dept,'order'=>'id'));
		
		$_items=array();
		foreach ($models as $model) {
			$items[]="SUM(IF((select b.department_id from g_person_career b where b.parent_id = a.id AND b.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by b.start_date DESC limit 1)= ".$model->id.",1,0)) as l".$model->id;
		}

		$extend=implode(",",$items);
		
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company, ".$extend."
		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$command=$connection->createCommand($sql);
		$row=$command->queryAll();
		
		foreach ($models as $model) {
			$_item[]=(int)$row[0]['l'.$model->id];
		}			
		return $_item;
	}
	
	public function compStatus() {

		$_item=array();
		$connection=Yii::app()->db; 
		$sql="SELECT (select x.company_id from g_person_career x where x.parent_id = a.id AND x.status_id IN (".implode(",",Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).") order by x.start_date DESC limit 1) as company,
		SUM(IF((select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 1 OR (select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 2 OR (select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 3,1,0)) as l1,
		SUM(IF((select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 4 OR (select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 5,1,0)) as l2,
		SUM(IF((select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 6,1,0)) as l3,
		SUM(IF((select d.status_id from g_person_status d where d.parent_id = a.id order by d.start_date DESC limit 1) = 7,1,0)) as l4

		from g_person a
		WHERE " .$this->module->filterUserCompany(); 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$row=$command->queryAll();
		
		$_item[]=(int)$row[0]['l1'];
		$_item[]=(int)$row[0]['l2'];
		$_item[]=(int)$row[0]['l3'];
		$_item[]=(int)$row[0]['l4'];
			
		return $_item;
	}
	
	public function compEmployeeIn() {

		$_data=array();
		$connection=Yii::app()->db; 
		$sql="
		SELECT a.parent_id, up.name, 'Employee In' as state,
		Sum(IF(g.start_date BETWEEN '".date("Y")."-01-01' AND '".date("Y")."-01-31',1,0)) AS l01, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-02-01' AND '".date("Y")."-02-28',1,0)) AS l02, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-03-01' AND '".date("Y")."-03-31',1,0)) AS l03, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-04-01' AND '".date("Y")."-04-30',1,0)) AS l04, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-05-01' AND '".date("Y")."-05-31',1,0)) AS l05, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-06-01' AND '".date("Y")."-06-30',1,0)) AS l06, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-07-01' AND '".date("Y")."-07-31',1,0)) AS l07, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-08-01' AND '".date("Y")."-08-31',1,0)) AS l08, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-09-01' AND '".date("Y")."-09-30',1,0)) AS l09, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-10-01' AND '".date("Y")."-10-31',1,0)) AS l10, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-11-01' AND '".date("Y")."-11-30',1,0)) AS l11, 
		Sum(IF(g.start_date BETWEEN '".date("Y")."-12-01' AND '".date("Y")."-12-31',1,0)) AS l12
		FROM a_organization a INNER JOIN a_organization aa ON a.id = aa.parent_id
		INNER JOIN a_organization up ON a.parent_id = up.id 
		INNER JOIN a_organization aaa ON aa.id = aaa.parent_id 
		LEFT JOIN g_person_career g ON aaa.id = g.department_id
		WHERE g.status_id IN (1,2)
		GROUP BY a.parent_id, up.name
		HAVING a.parent_id= ".sUser::model()->getGroup()." 

		UNION ALL 
		
		SELECT 'id' as id, 'name' as name, 'Employee Out' as state,
		SUM(IF(s.start_date BETWEEN '".date("Y")."-01-01' AND '".date("Y")."-01-31',1,0)) AS l01, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-02-01' AND '".date("Y")."-02-28',1,0)) AS l02, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-03-01' AND '".date("Y")."-03-31',1,0)) AS l03, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-04-01' AND '".date("Y")."-04-30',1,0)) AS l04, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-05-01' AND '".date("Y")."-05-31',1,0)) AS l05, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-06-01' AND '".date("Y")."-06-30',1,0)) AS l06, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-07-01' AND '".date("Y")."-07-31',1,0)) AS l07, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-08-01' AND '".date("Y")."-08-31',1,0)) AS l08, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-09-01' AND '".date("Y")."-09-30',1,0)) AS l09, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-10-01' AND '".date("Y")."-10-31',1,0)) AS l10, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-11-01' AND '".date("Y")."-11-30',1,0)) AS l11, 
		SUM(IF(s.start_date BETWEEN '".date("Y")."-12-01' AND '".date("Y")."-12-31',1,0)) AS l12

		FROM g_person_status s 
		WHERE s.status_id IN (8,9,10) AND (SELECT p.company_id FROM g_person_career p WHERE p.parent_id = s.parent_id AND p.status_id NOT IN(8,9,10)  ORDER BY p.start_date DESC LIMIT 1) = ".sUser::model()->getGroup()."

		"; 
		
		$dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person_career');
		
		$command=$connection->cache(3600, $dependency)->createCommand($sql);
		$rows=$command->queryAll();
		foreach ($rows as $row) {
			$_data=array();
			$_second=array();
			$_data[]=(int)$row['l01'];
			$_data[]=(int)$row['l02'];
			$_data[]=(int)$row['l03'];
			$_data[]=(int)$row['l04'];
			$_data[]=(int)$row['l05'];
			$_data[]=(int)$row['l06'];
			$_data[]=(int)$row['l07'];
			$_data[]=(int)$row['l08'];
			$_data[]=(int)$row['l09'];
			$_data[]=(int)$row['l10'];
			$_data[]=(int)$row['l11'];
			$_data[]=(int)$row['l12'];
			$_name['name']=$row['state'];
			$_second['data']=$_data;
			$_merge[]=array_merge($_name,$_second);
		}	
		return $_merge;
	}

	/* MOVE to gPersonCareer
	public function employeeIn()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('company');
		$criteria->compare('year(company.start_date)',date('Y'));
		//$criteria->compare('company.start_date>',Yii::app()->dateFormatter->format("dd-MM-yyyy",(time()-"1 year")));
		$criteria->addInCondition('company.status_id',Yii::app()->getModule('m1')->PARAM_JOIN_ARRAY);
		$criteria->order='company.start_date DESC';

		if (Yii::app()->user->name != "admin") {
			$criteria1 = new CDbCriteria;
			$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY c.start_date DESC LIMIT 1) IN ('.implode(",",sUser::model()->getGroupArray()).')' ;
			$criteria->mergeWith($criteria1);
		}
		

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
			
	}
	*/
	
	public function employeeOut()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('status');
		//$criteria->compare('year(status.start_date)',date('Y'));
		$criteria->compare('status.start_date >',date("Y-m-d",strtotime("-3 month")));
		$criteria->AddInCondition('status.status_id',Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY);
		$criteria->order='status.start_date DESC';


		if (Yii::app()->user->name != "admin") {
			$criteria1 = new CDbCriteria;
			$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY c.start_date DESC LIMIT 1) IN ('.implode(",",sUser::model()->getGroupArray()).') AND
			(select c.start_date from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN ('.implode(',',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY).') ORDER BY c.start_date DESC LIMIT 1) < status.start_date ' ;
			$criteria->mergeWith($criteria1);
		}
		

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
			
	}
	
	public function getBirthday()
	{
			$criteria = new CDbCriteria;
			$criteria->condition="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))  
			BETWEEN curdate() AND DATE_ADD(curdate(),INTERVAL 7 DAY)";
			$criteria->order="date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))";
			
			$criteria1 = new CDbCriteria;
			$criteria1->condition='(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (1,2,3,4,5,6,15) ORDER BY c.start_date DESC LIMIT 1) = 1100' ;
			$criteria->mergeWith($criteria1);
			
			return new CActiveDataProvider($this, array(
					'criteria'=>$criteria,
					'pagination'=>false,
			));
	}

	public function getPhotoExist() {
		if ($this->c_pathfoto != null) {
			if (is_file(Yii::app()->basePath . "/../shareimages/hr/employee/" .$this->c_pathfoto))
				return true;
			else
				return false;
		}
		return false;

	}

	public function getPhotoExistThumb() {
		if ($this->c_pathfoto != null) {
			if (is_file(Yii::app()->basePath . "/../shareimages/hr/employee/thumb/" .$this->c_pathfoto))
				return true;
			else
				return false;
		}
		return false;

	}

	public function getPhotoPath() {
		if ($this->c_pathfoto != null && $this->PhotoExist) {
			if ($this->PhotoExistThumb) {
				$path=CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/thumb/" .$this->c_pathfoto, CHtml::encode($this->employee_name), array("width"=>"100%",'id'=>'photo'));
			} else
				$path=CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" .$this->c_pathfoto, CHtml::encode($this->employee_name), array("width"=>"100%",'id'=>'photo'));
			
		} else {
			if ($this->sex_id ==1) {
				$path=CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophoto.jpg", CHtml::encode($this->employee_name), array("width"=>"100%",'id'=>'photo'));
			} else
				$path=CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophotoW.jpg", CHtml::encode($this->employee_name), array("width"=>"100%",'id'=>'photo'));
		}
		return $path;

	}

	public function getGPersonLink() {
			return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gPerson/view', array(
				'id'=>$this->id,
				//'en'=>$this->employee_name,
			)));
		
	}

	public function getGPersonPhoto() {
			return CHtml::link($this->photoPath, Yii::app()->createUrl('/m1/gPerson/view', array(
				'id'=>$this->id,
				//'en'=>$this->employee_name,
			)));
		
	}
	
	public function getGTalentLink() {
			return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gTalent/view', array(
				'id'=>$this->id,
				//'en'=>$this->employee_name,
			)));
		
	}

	public function getGTrainingLink() {
			return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gTraining/view', array(
				'id'=>$this->id,
				//'en'=>$this->employee_name,
			)));
		
	}

	public function companyly($limit=5) {
		$this->getDbCriteria()->mergeWith(array(
			'limit'=>$limit,
		));
		return $this;
	}

	public function mCompany() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
		$_value=gPersonCareer::model()->find($criteria)->company->name;
		if ($_value !=null) {
			return $_value;
		} else
			return '.::INCOMPLETE::.';
	}

	public function mJobTitle() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->job_title;
	}

	public function mLevel() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->level->name;
	}

	public function mLevelId() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->level_id;
	}

	public function mDepartment() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->addInCondition('status_id',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria);
		if ($_value !=null) {
			return $_value->department->name;
		} else
			return '.::INCOMPLETE::.';
	}

	public function mDepartmentId() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->addInCondition('status_id',Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
		$criteria->order='start_date DESC';
		$_value=gPersonCareer::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->department_id;
	}

	public function mStatus() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonStatus::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->status->name;
	}

	public function mStatusId() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonStatus::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->status_id;
	}

	public function mStatusEndDate() {
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$this->id);
		$criteria->order='start_date DESC';
		$_value=gPersonStatus::model()->find($criteria);
		if ($_value==null) {
			return "";
		} else
			return $_value->end_date;
	}
	
	public function scopes()
    {
        return array(
            //'noResign'=>array(
            //    'condition'=>'status=1',
            //),
            //'noResign'=>array(
             //  'with'=>array('status'),
                //'limit'=>5,
            //),
        );
    }	
	
	public function maritalStatus() {
		if ($this->has_couple == 0) {
			$_status= "TK";
		} else
			$_status= "K".$this->count_children;
			
		return $_status;
	}
	
	public function getEmployee_name_r() {
		if (in_array($this->mStatusId(),Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) {
			return $this->employee_name.' ('.$this->mStatus().')';
		} else
			return $this->employee_name;
		
	}
	
	public function afterSave() {
		if($this->isNewRecord) {
			Notification::create(
				1,
				'm1/gPerson/view/id/'.$this->id,
				'Person. New Employee created: '.$this->employee_name
				//'Person. New Employee created: '.$this->employee_name .' at '. (isset($this->companyfirst)) ? $this->companyfirst->company->name : ''
			);
		}
		return true;
	}
	
}