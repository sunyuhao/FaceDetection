<?php
require_once('../../Demo_PHP/FacePPClientDemo.php');


class DetectManager extends FacePPClientDemo{

    const API_KEY = 'a774702fd3316577efb8b2f93f47b2f4';
    const API_SECRET = 'FkkS6T6mPbUofnQEle4PkUF9NitN8pNm';
    const SERVER_URL = "http://api.cn.faceplusplus.com/v2/";
    const ERROR_NO_FACE = 1001;
    const ERROR_MULTI_FACE = 1002;
    const FACE_EXIST = 1003;
    const DETECT_SUCCESS = 2000;
    const PERSON_FOUND = 3000;
    const PERSON_NOT_FOUND = 3001;
    const MULTI_PERSON_FOUND = 3002;
    const GROUP_USER = 'user';

    public function __construct()
    {
        parent::__construct(self::API_KEY, self::API_SECRET);
    }

    /**
     * create new person, detect faces from image
     * @param $image
     * @param string $personName
     * @return array $result
     */
    public function detect($image, $personName)
    {
        //$person = $this->person_get_info($personName);
//        if(!(isset($person->error) && $person->error_code == 1005 && $person->error == 'INVALID_ARGUMENTS: person_name does not exist')) {
        //$detect = $this->image_face_detect($image);
        $detect = $this->image_face_detect($image);

        if(empty($detect->face)) {
            $result['ResultCode'] = self::ERROR_NO_FACE;
            $result['ResultMessage'] = 'No Face found!';
            return $result;
        }
        if(count($detect->face) > 1) {
            $result['ResultCode'] = self::ERROR_MULTI_FACE;
            $result['ResultMessage'] = 'Multi Face found! Can not use this as password';
            return $result;
        }
        $face_id = $detect->face[0]->face_id;
        $this->person_delete($personName);
        $this->person_create($personName);
        $this->person_add_face($face_id, $personName);
        $result['ResultCode'] = self::DETECT_SUCCESS;
        $result['ResultMessage'] = 'User register success';
        $result['FaceId'] = $face_id;

        return $result;
    }

    /**
     * @param null $image
     * @return mixed|null
     */
    public function image_face_detect($image)
    {
        return $this->execute("detection/detect", ["img" => $image]);
    }

    public function train($group_name)
    {
        $session = $this->train_identify($group_name);
        if(empty($session->session_id)){
            return false;
        }
        $session_id = $session->session_id;
        while($session=$this->info_get_session($session_id)){
            sleep(1);
            if(!empty($session->status)) {
                if($session->status != 'INQUEUE') {
                    break;
                }
            }
        }
    }

    public function group_identify()
    {
        return $this->call("recognition/identify", array("group_name" => 'user'));
    }

    public function identify(&$image)
    {
        $result = [
            'status'=>'',
            'message'=>'',
        ];
        $this->group_delete(self::GROUP_USER);
        $group = $this->group_create(self::GROUP_USER);

        $result = $this->recognition_identify($image, $group);

        if(empty($result->face)) {
            $result['status'] = self::ERROR_NO_FACE;
            $result['message'] = 'No face found!';
            return $result;
        }
        if(count($result->face) > 1) {
            $result['status'] = self::ERROR_MULTI_FACE;
            $result['message'] = 'Multi face found!';
            return $result;
        }
        $face = $result->face[0];
        if(empty($face->candidate)) {
            $result['status'] = self::PERSON_NOT_FOUND;
            $result['message'] = 'Person not found!';
            return $result;
        }
        if(count($face->candidate) > 1) {
            $result['status'] = self::MULTI_PERSON_FOUND;
            $result['message'] = 'Internal Error: Multi person found!';
            return $result;
        }

        $candidate = $face->candidate[0];
        $result['status'] = self::PERSON_FOUND;
        $result['message'] = 'Person found!';
        $result['candidate'] = $candidate;

        return $result;
    }

    public function person_get_info($personName)
    {
        return $this->execute('/person/get_info', ['person_name'=>$personName]);
    }

    public function group_get_info($groupName)
    {
        return $this->execute('/group/get_info', ['group_name'=>$groupName]);
    }

    /**
     * @param $faceId
     * @param $personName
     * @return mixed
     */
    public function recognition_verify($faceId, $personName)
    {
        return $this->execute('/recognition/verify', ['face_id'=>$faceId, 'person_name'=>$personName]);
    }

    /**
     * @param $method - The Face++ API
     * @param array $params - Request Parameters
     * @return array - {'http_code':'Http Status Code', 'request_url':'Http Request URL','body':' JSON Response'}
     * @throws Exception
     */
    public function execute($method, array $params)
    {
        $params['api_key']      = self::API_KEY;
        $params['api_secret']   = self::API_SECRET;
        $url = self::SERVER_URL."{$method}";
        var_dump($params);
        return $this->request($url, $params);
    }
    private function request($request_url, $request_body)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $request_url);
        curl_setopt($curl_handle, CURLOPT_FILETIME, true);
        curl_setopt($curl_handle, CURLOPT_FRESH_CONNECT, false);
        curl_setopt($curl_handle, CURLOPT_MAXREDIRS, 5);
        curl_setopt($curl_handle, CURLOPT_HEADER, false);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_TIMEOUT, 5184000);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl_handle, CURLOPT_NOSIGNAL, true);
        curl_setopt($curl_handle, CURLOPT_REFERER, $request_url);
        if (extension_loaded('zlib')) {
            curl_setopt($curl_handle, CURLOPT_ENCODING, '');
        }
        curl_setopt($curl_handle, CURLOPT_POST, true);
        if (array_key_exists('img', $request_body)) {
            $request_body['img'] = '@' . $request_body['img'];
        } else {
            $request_body = http_build_query($request_body);
        }
        var_dump($request_body);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $request_body);
        $response_text      = curl_exec($curl_handle);
        $response_header    = curl_getinfo($curl_handle);
        curl_close($curl_handle);
        return array (
            'http_code'     => $response_header['http_code'],
            'request_url'   => $request_url,
            'body'          => $response_text
        );
    }
}