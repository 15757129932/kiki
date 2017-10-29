<?php

namespace app\admin\model;

use app\admin\model\RescueInfo;

class RescueLog extends Admin {

	//格式化数据
	private function _fmtDatas($data) {
		if (empty($data) && is_array($data)) {
			return $data;
		}
		foreach ($data as $key => $value) {
			$data[$key] = $this -> _fmtData($data);
		}

		return $data;
	}

	private function _fmtData($data) {
		if (isset($data['create_time'])) {
			$data['create_time'] = date('Y-m-d H:i:s', $data['create_time']);
		}

		if (isset($data['update_time'])) {
			$data['update_time'] = date('Y-m-d H:i:s', $data['update_time']);
		}

		if (isset($data['last_time'])) {
			$data['last_time'] = date('Y-m-d H:i:s', $data['last_time']);
		}

		if (isset($data['status'])) {
			$data['status'] = (int)$data['status'];
		}

		if (isset($data['rescue'])) {
			if (!empty($data['rescue']) && is_array($data['rescue'])) {
				$tmpData = $data['rescue'];
				foreach ($tmpData as $key => $value) {
					$tmpData[$key] = $this -> _fmtData($value);
				}
				$data['rescue'] = $tmpData;
			}
		}
		return $data;
	}

	public function getLastStatus($code) {
		$mdlRescue = new RescueInfo();
		$rescue = $mdlRescue -> getRescueInfoByCode($code, 'id,code,status,create_time,longitude,latitude, police_longitude, police_latitude');
		$rescueLog = $this -> query('SELECT A.last_time, rl.latitude, rl.longitude, u.username as username, pf.name as policeforce
									FROM
										(
											SELECT rescue_id, user_id, max(create_time) last_time
											FROM rescue_log
											WHERE rescue_id = ?
											GROUP BY rescue_id, user_id
										) A
									INNER JOIN user u ON u.id = A.user_id
									INNER JOIN rescue_log rl ON A.rescue_id = rl.rescue_id and A.user_id = rl.user_id and A.last_time = rl.create_time
									LEFT JOIN police_info pi ON pi.user_id = rl.user_id
									LEFT JOIN police_force pf ON pf.id = pi.police_force_id', array($rescue['id']));

		$rescue -> rescue = $rescueLog;
		$rescue = $this -> _fmtData($rescue);
		return $rescue;
	}

	/**
	 * 更新日志表
	 * @author tang-minyi
	 */
	public function addRescueLog($request) {

		$model = new RescueInfo();
		$rescue = $model -> getRescueInfoByCode($request['code']);
		$newInfo = array('rescue_id' => $rescue['id'], 'user_id' => $request['user_id'], 'longitude' => $request['longitude'], 'latitude' => $request['latitude'], 'remark' => $request['remark'], 'create_time' => time(), 'update_time' => time());
		$count = $this -> insert($newInfo);
		return $count;
	}

}
?>