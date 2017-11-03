<?php
namespace app\api\controller;

use app\admin\model\RescueInfo;
use app\admin\model\RescueLog;
use app\admin\model\RescueResource;
use app\admin\model\Resource;
use app\admin\model\CityInfo;
use app\admin\model\User;
use app\admin\model\PoliceForce;
use app\admin\model\PoliceInfo;
use app\common\message\Result;
use app\common\controller\Api;
use think\Config;

class Rescue extends Api {

	/**
	 * 救援类型查询
	 * @author zhou-yucheng
	 */
	public function gettypes() {
		$result = new Result;
		$rescue_type_config = Config::get('rescue_type');

		foreach ($rescue_type_config as $key => $val) {
			$rescue_type[] = array("id" => $key, "name" => $val);
		}
		$result -> data = $rescue_type;
		return json($result);
	}

	/**
	 * 救援进度查询
	 * @author fang-bin
	 */
	public function getstatus() {
		$result = new Result;

		//请求参数Check
		$code = input('code');
		if (!isset($code)) {
			exception('救援编码不能为空', -1);
		}

		//救援状态查询
		$model = new RescueLog();
		$data = $model -> getLastStatus($code);

		//正常返回
		$result -> code = 0;
		$result -> message = "";
		$result -> data = $data;

		return json($result);
	}

	/**
	 * 获取救援信息列表
	 * @author tang-minyi
	 */
	public function index() {
		$result = new Result;
		$rescueResourceModel = new RescueResource;
		$resourceModel = new Resource;
		$policeModel = new PoliceInfo;

		//页码（page_no）
		$params['page_no'] = input('page_no', 1);

		//每页大小（page_size）
		$params['page_size'] = input('page_size', 10);

		//救援状态（status）
		$status = input('status');
		if (isset($status)) {
			$params['status'] = $status;
		}
		//经度（longitude）
		$longitude = input('longitude');
		if (isset($longitude)) {
			$params['longitude'] = $longitude;
		}
		//纬度（latitude）
		$latitude = input('latitude');
		if (isset($latitude)) {
			$params['latitude'] = $latitude;
		}

		//排序字段（order）
		$params['order'] = input('order', 'type asc, create_time desc');

		//role_id=3为警员，role_id=4为普通用户
		//普通用户只能查询自己发布的救援信息
		if ($this -> role_id != 3) {
			//user_id
			$params['user_id'] = $this -> user_id;
		}
		//警员可以查询警员所在救援队的受理列表
		else {
			$params['police_id'] = $policeModel -> getPoliceForceIdByUserId($this -> user_id);
		}

		//默认返回头10条最新发布的待受理救援信息
		//查询出rescue_info表里所有字段
		$rescueModel = new RescueInfo;

		//请求参数中，经纬度参数+【order=location】的组合下，作为附近救援信息列表的查询，并且是救援未完成的列表。
		//普通用户没有【附近】的功能
		//if($this -> role_id == 3 && input('order') == 'location' && isset($params['longitude']) && isset($params['latitude'])){
		if (input('order') == 'location') {
			if ($this -> role_id == 3 && isset($params['longitude']) && isset($params['latitude'])) {
				$data = $rescueModel -> getLocationList($params);
			} else {
				exception('附近的救援信息列表获取失败', -1);
			}
		} else {
			$data = $rescueModel -> getList($params);
		}
		//剔除某些字段
		$newRows = array();
		foreach ($data['rows'] as $key => $value) {
			//【附近】功能时，distance为计算的距离，其他情况下为0
			if (input('order') == 'location') {
				$distance = $value['distance'];
			} else {
				$distance = 0;
			}

			//根据救援ID得到救援资源ID
			$resource = $rescueResourceModel -> getResourceById($value['id']);
			$resourceInfo = null;
			if (count($resource) > 0) {
				$resourceInfo = $resourceModel -> getResourceInfoById($resource);
			}

			$newRows[$key] = array('code' => $value['code'], 'type' => (int)$value['type'], 'casualty' => (int)$value['casualty'], 'comburant' => (int)$value['comburant'], 'address' => $value['address_cn'], 'longitude' => $value['longitude'], 'latitude' => $value['latitude'], 'status' => (int)$value['status'], 'distance' => $distance, 'create_time' => date('Y-m-d H:i', $value['create_time']), 'resource' => $resourceInfo);
		}

		$result -> code = 0;
		$result -> message = "";
		$result -> total = $data['total'];
		$result -> data = $newRows;

		return json($result);
	}

	/**
	 * 救援信息新增
	 * @author tang-minyi
	 */
	public function add() {
		$result = new Result;
		$rescueModel = new RescueInfo;
		$rescueResourceModel = new RescueResource;
		$cityInfoModel = new CityInfo;
		//救援类型（type）
		$type = input('type');
		if (isset($type)) {
			$params['type'] = $type;
		} else {
			exception('救援类型不能为空', -1);
		}
		//有无人员伤亡（casualty）
		$params['casualty'] = input('casualty', 0);
		//有无助燃物（comburant）
		$params['comburant'] = input('comburant', 0);
		//事件地址（address）
		$params['address'] = input('address');
		//地图用-经度（longitude）
		$params['longitude'] = input('longitude');
		//地图用-纬度（latitude）
		$params['latitude'] = input('latitude');
		//报警人（alarm_person）
		$params['alarm_person'] = input('alarm_person');
		//报警电话（alarm_phone）
		$params['alarm_phone'] = input('alarm_phone');
		//事件地址-省ID（province）
		$province = input('province');
		if (isset($province)) {
			$params['province'] = $province;
		} else {
			exception('事件地址-省ID不能为空', -1);
		}
		//事件地址-市ID（city）
		$city = input('city');
		if (isset($city)) {
			$params['city'] = $city;
		} else {
			exception('事件地址-市ID不能为空', -1);
		}
		//事件地址-区ID（area）
		$area = input('area');
		if (isset($area)) {
			$params['area'] = $area;
		} else {
			exception('事件地址-区ID不能为空', -1);
		}
		//事件地址-街道ID（street）
		$street = input('street');
		if (isset($street)) {
			$params['street'] = $street;
		} else {
			exception('事件地址-街道ID不能为空', -1);
		}
		//语音资源ID（voice_id）
		$params['voice_id'] = input('voice_id');
		//语音翻译内容（voice_content）
		$params['voice_content'] = input('voice_content');
		//资源ID列表
		$resource_id = input('resource/a');

		//根据省ID，市ID，区ID，街道ID，详细地址得到完整的详细地址
		$params['address_cn'] = $cityInfoModel -> getAddress($params) . $params['address'];

		//发布时间（create_time）
		$params['create_time'] = time();
		//根据token值获取用户的user_id
		$params['user_id'] = $this -> user_id;
		//救援最后更新时间（update_time）
		$params['update_time'] = $params['create_time'];

		//救援信息新增，并返回id值
		$id = $rescueModel -> addRescueInfo($params);

		//救援编号
		$data['code'] = build_rescuecode($id);
		//根据返回的id值，更新救援编码
		$rescueModel -> updateCode($id, $data['code']);
		//资源id有传进来的时候，将救援id和资源id更新到rescue_resource表里
		if (isset($resource_id)) {
			$count = $rescueResourceModel -> addRescueResource($id, $resource_id);
			if ($count != count($resource_id)) {
				exception('救援资源表新增失败', -1);
			}
		}

		$result -> data = $data;
		$result -> code = 0;
		$result -> message = "";

		return json($result);
	}

	/*
	 * add by wu-mengyao
	 */
	public function uploadresource() {
		vendor("doublecong.FileUpload");
		$result = new Result;
		$userModel = new User;
		$resource = new Resource;
		$id = array();
		$url = array();
		$tmp = array();
		$data = array();
		$message = array();
		//默认值=1
		$token = input('token');
		if (!isset($token)) {
			exception('token不能为空', -1);
		}

		$up = new \doublecong\FileUpload;
		$up -> set("path", "static/upload/");

		$up -> set("israndname", true);

		$flag = $up -> upload("file");

		if ($flag) {
			$user = $userModel -> getUserByToken($token);
			$fileInfo = $up -> getFileInfo();

			// 单文件情况下也转成数组处理，免得写if、else
			if (!is_array($fileInfo['originName'])) {
				foreach ($fileInfo as $key => $value) {
					if ($key == "path") {
						continue;
					}
					$fileInfo[$key] = array($value);
				}
			}
			for ($i = 0; $i < count($fileInfo['originName']); $i++) {
				$realpath = $fileInfo['path'] . $fileInfo['newFileName'][$i];
				$filetypes = Config::get('file_type');

				$filetype = $fileInfo['type'][$i];
				$fileext = $fileInfo['fileType'][$i];
				$width = 0;
				$height = 0;
				$rec_res = null;
				$voice_content = "";
				if ($filetype == 1) {
					//图片类型，解析尺寸
					list($width, $height) = getimagesize($realpath);
				} elseif ($filetype == 2) {
					//语音类型，解析文本
					$rec_res = $this -> speechRec($realpath, $fileext);
					if ($rec_res['err_no'] == 0) {
						$voice_content = is_Array($rec_res['result']) ? $rec_res['result'][0] : "";
						unset($rec_res['result']);
					}
				}
				$item["type"] = $fileInfo['type'][$i];
				$item["root"] = 'http://' . $_SERVER['SERVER_NAME'];
				$item["dir"] = "/" . $fileInfo['path'];
				$item["file_name"] = $fileInfo['originName'][$i];
				$item["stored_name"] = $fileInfo['newFileName'][$i];
				$item["memo"] = $fileInfo['originName'][$i];
				$item["user_id"] = $user["id"];
				$item["upload_date"] = time();
				$item["size"] = $fileInfo['fileSize'][$i];
				$item["width"] = $width;
				$item["height"] = $height;
				$item["mime"] = $fileInfo['fileMimeType'][$i];
				$item["ext"] = $fileInfo['fileType'][$i];
				$res = array("id" => (int)$resource -> addResourceInfo($item), "size" => (int)$item["size"], "width" => (int)$width, "height" => (int)$height, "mime" => $item["mime"], "ext" => $item["ext"], "type" => $filetypes[$filetype], 'voice_content' => $voice_content, 'voice_rec_result' => $rec_res, "url" => $item["root"] . $item["dir"] . $item["stored_name"], );

				$data[] = $res;

			}
			$result -> data = $data;
		} else {
			//error
			$message = $up -> getErrorMsg();
			$result -> message = $message;
			$result -> data = null;
			$result -> code = -1;
		}
		return json($result);
	}

	private function speechRec($file, $fileext) {
		vendor("baidu.AipSpeech");
		$appid = Config::get('baidu_speech_appid');
		$apikey = Config::get('baidu_speech_apikey');
		$secretkey = Config::get('baidu_speech_secretkey');
		$aipSpeech = new \AipSpeech($appid, $apikey, $secretkey);

		// 识别本地文件
		$result = $aipSpeech -> asr(file_get_contents($file), $fileext, 16000, array('lan' => 'zh', ));

		return $result;
	}

	/**
	 * 救援进度更新
	 * @author tang-minyi
	 */
	public function updatestatus() {
		$result = new Result;
		$rescueModel = new RescueInfo;
		$rescueLogModel = new RescueLog;
		//role_id=3为警员，role_id=4为普通用户（警员可更新状态）
		if ($this -> role_id != 3) {
			exception('无更新救援状态的权限', -1);
		}
		//救援编码（code）
		$code = input('code');
		if (isset($code)) {
			$params['code'] = $code;
		} else {
			exception('救援编码不能为空', -1);
		}
		//救援状态（status）
		$status = input('status');
		if (isset($status)) {
			//请求参数的救援状态除2,3,4以外为无效状态。
			if ($status == 2 || $status == 3 || $status == 4) {
				$params['status'] = $status;
			} else {
				exception('救援状态无效', -1);
			}
		} else {
			exception('救援状态不能为空', -1);
		}
		//救援队的定位-经度（longitude）
		$longitude = input('longitude');
		if (isset($longitude)) {
			$params['longitude'] = $longitude;
		} else {
			exception('救援队的定位-经度不能为空', -1);
		}
		//救援队的定位-纬度（latitude）
		$latitude = input('latitude');
		if (isset($latitude)) {
			$params['latitude'] = $latitude;
		} else {
			exception('救援队的定位-纬度不能为空', -1);
		}
		//救援日志备注（remark）
		$params['remark'] = input('remark');
		//根据token值获取用户的user_id
		$params['user_id'] = $this -> user_id;

		//更新救援信息表中的救援状态
		$count = $rescueModel -> updateStatus($params);
		//更新日志表
		$countLog = $rescueLogModel -> addRescueLog($params);

		//大于零时，更新成功
		if ($count > 0 && $countLog > 0) {
			$data = true;
		} else {
			exception('救援状态更新失败', -1);
		}

		$result -> data = $data;
		$result -> code = 0;
		$result -> message = "";

		return json($result);
	}

	/**
	 * 救援信息查询
	 * @author tang-minyi
	 */
	public function getdetail() {
		$result = new Result;
		$rescueModel = new RescueInfo;
		$policeModel = new PoliceForce;
		$rescueResourceModel = new RescueResource;
		$resourceModel = new Resource;

		//救援编码（code）
		$code = input('code');
		if (isset($code)) {
			$params['code'] = $code;
		} else {
			exception('救援编码不能为空', -1);
		}

		//根据救援编号得到救援信息
		//当警员登录时，可以查询到所有记录，普通用户只能查询自己的救援信息
		//role_id=3为警员，role_id=4为普通用户
		if ($this -> role_id != 3) {
			$rescueInfo = $rescueModel -> getRescueInfoByCodeAndUser($code, $this -> user_id);
		} else {
			$rescueInfo = $rescueModel -> getRescueInfoByCode($code);
		}

		//无该救援编号时
		if (count($rescueInfo) == 0) {
			exception('无该救援信息，请重新查询！', -1);
		}

		//根据救援队编号得到救援队信息
		if (isset($rescueInfo['police_id'])) {
			$rescueTeamInfo = $policeModel -> getPoliceForceInfo($rescueInfo['police_id']);
		}

		//根据语音资源ID获取语音资源的url
		$voice_url = null;
		if (isset($rescueInfo['voice_id'])) {
			$voice_url = $resourceModel -> getVoiceInfoById($rescueInfo['voice_id']);
		}
		//根据救援ID得到救援资源ID
		$resource = $rescueResourceModel -> getResourceById($rescueInfo['id']);
		$resourceInfo = array();
		if (count($resource) > 0) {
			$resourceInfo = $resourceModel -> getResourceInfoById($resource);
		}

		//得到返回数据
		$data = array('code' => $rescueInfo['code'], 'type' => (int)$rescueInfo['type'], 'casualty' => (int)$rescueInfo['casualty'], 'comburant' => (int)$rescueInfo['comburant'], 'rescue_team' => $rescueTeamInfo['name'], 'address' => $rescueInfo['address_cn'], 'longitude' => $rescueTeamInfo['longitude'], 'latitude' => $rescueTeamInfo['latitude'], 'status' => (int)$rescueInfo['status'], 'create_time' => date('Y-m-d H:i', $rescueInfo['create_time']), 'alarm_person' => $rescueInfo['alarm_person'], 'alarm_phone' => $rescueInfo['alarm_phone'], 'voice_url' => $voice_url, 'voice_content' => $rescueInfo['voice_content'], 'resource' => $resourceInfo);

		$result -> data = $data;
		$result -> code = 0;
		$result -> message = "";

		return json($result);
	}

}
?>