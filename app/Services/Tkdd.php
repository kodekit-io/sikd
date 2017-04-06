<?php

namespace App\Service;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Tkdd
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * Tkdd constructor.
     * @param Sikd $sikd
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function getPostures($groupId = 3, $type = 'array')
    {
        $minutes = 0 * 0 * 60;
        $postures = Cache::remember('postures', $minutes, function () use ($groupId) {
            $url = 'tkdd/list-group/' . $groupId;
            $apiRequest = $this->sikd->get($url);
            return ($apiRequest->status == '200') ? $apiRequest->result : [];
        });

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($postures);
        }

        return $postures;
    }

    public function getAllChart($year = '2016', $groupId = 3)
    {
        if (config('app.env') != 'production') {
            $path = public_path('data/tkdd-home.json');
            $jsonResult = File::get($path);
            $jsonResult = \GuzzleHttp\json_decode($jsonResult);
            return new SimpleAPIResponse(200, $jsonResult);
        }

        $url = 'tkdd/all/0/' . $year . '/' . $groupId;

        return $this->sikd->get($url);
    }

    public function isPostureId($id)
    {
        $postures = $this->getPostures();
        foreach ($postures as $posture) {
            if ($posture->idPostur == $id) {
                return true;
            }
        }

        return false;
    }

    public function getPostureNameById($postureId)
    {
        $postures = $this->getPostures();
        foreach ($postures as $posture) {
            if ($posture->idPostur == $postureId) {
                return $posture->uraianPosturSingkat;
            }
        }

        return '';
    }

    //public function getMapChart($year, $postureId = 39)
    public function getMapChart($year, $postureId)
    {
        $url = 'tkdd/1/' . $year . '/' . $postureId;
        $apiRequest = $this->sikd->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        // modified the api result
        $modifiedResult['data'] = [];
        if (isset($result->map)) {
            $modifiedResult['data'] = $result->map;
        }

        return \GuzzleHttp\json_encode($modifiedResult);
    }

    //public function getProvinceChart($year, $postureId = '39', $provinceId)
    public function getProvinceChart($year, $postureId, $provinceId)
    {
        $url = 'tkdd/2/' . $year . '/' . $postureId . '/' . $provinceId;
//        $url .= $provinceId != '' ? '/' . $provinceId : '';
        $apiRequest = $this->sikd->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        // modified the api result
        $modifiedResult['data'] = [];
        if (isset($result->{'detail-map-provinsi'})) {
            $modifiedResult['data'] = $result->{'detail-map-provinsi'};
        }

        return \GuzzleHttp\json_encode($modifiedResult);
    }


    /************************* CRUD ****************************/
    public function getTkdd()
    {
        $result = $this->sikd->get('ref-tkdd-postur');
        return $result->result;
    }

    public function getPostureById($id)
    {
        $result = $this->sikd->get('ref-tkdd-postur/' . $id);
        return $result->result;
    }

    public function getTkddPostures()
    {
        $result = $this->sikd->get('ref-tkdd-postur');
        return $result->result;
    }

    public function create($request)
    {
        $data = $request->except(['_token']);
        $fileFieldName = 'icon_image';
        $fileUrl = '';

        if ($request->hasFile($fileFieldName)) {
            if ($request->file($fileFieldName)->isValid()) {
                $fileName = str_slug($data['posture_short_desc']) . '_' . $data['id_posture'] . '.' . $request->file($fileFieldName)->getClientOriginalExtension();
                $fileUrl = url('posture_icons/tkdd/' . $fileName);
                Log::warning('file url ==> ' . $fileUrl);
                $dirPath = public_path('posture_icons/tkdd');
                if (! is_dir($dirPath)) {
                    mkdir($dirPath, 0777, true);
                }
                $request->file($fileFieldName)->move($dirPath, $fileName);
            }
        }

        $params = [
            'idPostur' => $data['id_posture'],
            'kodePostur' => $data['code'],
            'uraianPostur' => $data['posture_desc'],
            'uraianPosturSingkat' => $data['posture_short_desc'],
            'idInduk' => $data['parent_id'],
            'adaAkun' => (isset($data['have_account']) ? $data['have_account'] : '0'),
            'levelnya' => $data['level'],
            'group' => $data['group'],
            'icon' => $data['icon']
        ];

//        if ($fileUrl != '') {
//            $params['image_url'] = $fileUrl;
//        }

        //dd($params);

        return $this->sikd->post('ref-tkdd-postur', $params);
    }

    public function update($request, $id)
    {
        $data = $request->except(['_token']);
        $fileUrl = '';
        $fileFieldName = 'icon_image';
        if ($request->hasFile($fileFieldName)) {
            if ($request->file($fileFieldName)->isValid()) {
                $fileName = str_slug($data['posture_short_desc']) . '_' . $id . '.' . $request->file($fileFieldName)->getClientOriginalExtension();
                $fileUrl = url('posture_icons/tkdd/' . $fileName);
                $dirPath = public_path('posture_icons/tkdd');
                if (! is_dir($dirPath)) {
                    mkdir($dirPath, 0777, true);
                }
                $request->file($fileFieldName)->move($dirPath, $fileName);
            }
        }

        $params = [
            'kodePostur' => $data['code'],
            'uraianPostur' => $data['posture_desc'],
            'uraianPosturSingkat' => $data['posture_short_desc'],
            'idInduk' => $data['parent_id'],
            'adaAkun' => (isset($data['have_account']) ? $data['have_account'] : '0'),
            'levelnya' => $data['level'],
            'group' => $data['group'],
            'icon' => $data['icon']
        ];

//        if ($fileUrl != '') {
//            $params['image_url'] = $fileUrl;
//        }

        return $this->sikd->put('ref-tkdd-postur/' . $id, $params);
    }

    public function delete($id)
    {
        return $this->sikd->delete('ref-tkdd-postur/' . $id);
    }

}