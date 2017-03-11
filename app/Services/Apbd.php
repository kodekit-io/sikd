<?php

namespace App\Service;


use Illuminate\Support\Facades\Cache;

class Apbd
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * Apbd constructor.
     * @param Sikd $sikd
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function getPostures($type = 'array')
    {
        $minutes = 0 * 0 * 60;
        $postures = Cache::remember('apbd_postures', $minutes, function () {
            $url = 'apbd/list-postur';
            $apiRequest = $this->sikd->get($url);
            return ($apiRequest->status == '200') ? $apiRequest->result : [];
        });

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($postures);
        }

        return $postures;
    }

    public function getMapChart($year = '2016', $postureId = 1)
    {
        $url = 'apbd/1/' . $year . '/' . $postureId;
        if ($postureId == 'lra') {
            $url = 'apbd/lra/1/' . $year;
        }
        $apiRequest = $this->sikd->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];
        // modified the api result
        $modifiedResult['data'] = [];
        if (isset($result->map)) {
            $modifiedResult['data'] = $result->map;
        }
        if (isset($result->{'detail-map-provinsi'})) {
            $modifiedResult['data'] = $result->{'detail-map-provinsi'};
        }
        return \GuzzleHttp\json_encode($modifiedResult);
    }

    public function getProvinceChart($year, $postureId = '1', $provinceId)
    {
        $url = 'apbd/2/' . $year . '/' . $postureId . '/' . $provinceId;
        if ($postureId == 'lra') {
            $url = 'apbd/lra/2/' . $year . '/' . $provinceId;
        }
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

    public function getAllChart($year = 2016)
    {
        $url = 'apbd/all/0/' . $year;

        return $this->sikd->get($url);
    }

    public function getPostureNameById($postureId)
    {
        $postures = $this->getPostures();
        foreach ($postures as $posture) {
            if ($posture->id == $postureId) {
                return $posture->name;
            }
        }

        if ($postureId == 'lra') {
            return 'Penyampaian Data LRA';
        }

        return '';
    }

    /************************* CRUD ****************************/
    public function getApbd()
    {
        $result = $this->sikd->get('ref-apbd-postur');
        return $result->result;
    }

    public function getPostureById($id)
    {
        $result = $this->sikd->get('ref-apbd-postur/' . $id);
        return $result->result;
    }

    public function getApbdPostures()
    {
        $result = $this->sikd->get('ref-apbd-postur');
        return $result->result;
    }

    public function create($data)
    {
        $params = [
            'id' => $data['id_posture'],
            'group' => $data['group'],
            'name' => $data['name'],
            'id_map' => $data['id_map'],
            'active' => (isset($data['is_active']) ? $data['is_active'] : 'false'),
            'icon' => $data['icon']
        ];

        return $this->sikd->post('ref-apbd-postur', $params);
    }

    public function update($data, $id)
    {
        $params = [
            'group' => $data['group'],
            'name' => $data['name'],
            'id_map' => $data['id_map'],
            'active' => (isset($data['is_active']) ? $data['is_active'] : 'false'),
            'icon' => $data['icon']
        ];

        return $this->sikd->put('ref-apbd-postur/' . $id, $params);
    }

    public function delete($id)
    {
        return $this->sikd->delete('ref-apbd-postur/' . $id);
    }
}