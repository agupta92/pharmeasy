<?php
namespace pharmeasy\classes\User;
use pharmeasy\classes\User\User;

error_reporting(E_ALL);

include_once(__DIR__.'/../../config.php');
include_once(__DIR__.'/../../helper/utils.php');
include_once('User.php');

class UserPharmacist extends User{

	public function __construct($userId){
		parent::__construct($userId);
		$this->userType = 'pharmacist';
	}

	public function getAllUserRequest(){
		$user_id = $_SESSION['user_id'];

		$sql_query = "select pur.user_record_id as recordId,urequest.request_id as requestId, pur.user_id as patientId, 					udetails.user_name as patientName, pur.record_type as recordType, urequest.request_status as 						requestStatus,urequest.source_user, 'NA' as requestedBy,'pharmacist' as userType,
						case WHEN urequest.request_status = 'pending' THEN 'NA'
						WHEN urequest.request_status = 'approved' THEN pur.file_name 
						END as filePath,pur.created_at as docCreatedDate,urequest.updated_at as requestUpdatedDate 
						from pe_user_requests urequest
						left join pe_user_details udetails ON udetails.user_id =urequest.for_user
						left join pe_user_records pur ON pur.user_record_id = urequest.record_id 
						where urequest.source_user = '$user_id'
						order by urequest.request_id desc";
		global $db;
		try{
			$user_record_details = $db->rawQuery($sql_query);
			//var_dump($user_record_details);exit;
			if(isset($user_record_details[0])){
				//checkSession(1);
				returnSuccess('Records Found',$user_record_details);

			} else {
				returnSuccess('No Records Found');
			}
		} catch (Exception $e){
			returnFailure('Some Error Occured: ' . $e->getMessage());
		}
	}

	public function getNonRequestedRecords(){
		$user_id = $_SESSION['user_id'];

		$sql_query = "select uRecords.user_record_id as recordId, uRecords.record_type as recordType,'pharmacist' as userType,uRecords.created_at as createdAt, udetails.user_name as userName, udetails.user_email as userEmail, udetails.user_id as userId FROM `pe_user_records` as uRecords LEFT JOIN pe_user_details as udetails ON udetails.user_id = uRecords.user_id where uRecords.user_record_id NOT IN (select DISTINCT(record_id) from pe_user_requests where source_user = '$user_id')";
		global $db;
		try{
			$user_record_details = $db->rawQuery($sql_query);
			//var_dump($user_record_details);exit;
			if(isset($user_record_details[0])){
				//checkSession(1);
				returnSuccess('Records Found',$user_record_details);

			} else {
				returnSuccess('No Records Found');
			}
		} catch (Exception $e){
			returnFailure('Some Error Occured: ' . $e->getMessage());
		}
	}
}


?>