<?php
namespace pharmeasy\classes\User;
use pharmeasy\classes\User\User;

error_reporting(E_ALL);

include_once(__DIR__.'/../../config.php');
include_once(__DIR__.'/../../helper/utils.php');
include_once('User.php');

class UserPatient extends User{

	public function __construct($userId){
		parent::__construct($userId);
		$this->userType = 'patient';
	}

	//It retirns all the pending request for the user.
	public function getAllUserRequest(){
		$user_id = $_SESSION['user_id'];

		$sql_query = "select pur.user_record_id as recordId,urequest.request_id as requestId, pur.user_id as patientId, udetails.user_name as patientName,'patient' as userType,pur.record_type as recordType,
						ifnull(urequest.source_user,'NA') as sourceUserId, CONCAT(ifnull(udetails1.user_name,'NA'), ' : ',ifnull(udetails1.user_type,'NA')) as requestedBy,
						ifnull(urequest.request_status,'NA') as requestStatus, pur.file_name as filePath, pur.created_at as docCreatedDate,ifnull(urequest.updated_at,'NA') as requestUpdatedDate
						from pe_user_records pur
						left join pe_user_requests urequest ON urequest.record_id = pur.user_record_id 
						left join pe_user_details udetails ON udetails.user_id = pur.user_id
						left join pe_user_details udetails1 ON udetails1.user_id = urequest.source_user
						where pur.user_id = '$user_id'
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

	//In case of Patient User, it shows all the records of that user.
	public function getNonRequestedRecords(){
		$user_id = $_SESSION['user_id'];

		$sql_query = "select uRecords.user_record_id as recordId, uRecords.record_type as recordType,'patient' as userType,uRecords.created_at as createdAt, udetails.user_name as userName, udetails.user_email as userEmail, udetails.user_id as userId FROM `pe_user_records` as uRecords LEFT JOIN pe_user_details as udetails ON udetails.user_id = uRecords.user_id where  uRecords.user_id = '$user_id'";
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

	//Takes request ID as input and approve the request id.
	public function approveRequest($requestId,$status = 'approved'){
		global $db;
		$data = array('request_status' => $status);
		$db->where('request_id' , $requestId);
		if ($db->update ('pe_user_requests', $data)){
		    $msg= $db->count . ' records were updated';
			returnSuccess($msg);
		}
		else{
		    $msg = 'update failed: ' . $db->getLastError();
		    returnSuccess($msg);
		}
	}
}


?>