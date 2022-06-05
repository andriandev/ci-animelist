<?php

namespace App\Models;

use CodeIgniter\Model;

class Curl_Model extends Model
{
    protected $token;
    protected $db;
    protected $url_api;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->token = $this->db->table('tb_config')->getWhere(['name' => 'access_token'])->getResultArray()['0']['value'];
        $this->url_api = "https://api.myanimelist.net/v2/";
    }

    public function getSearch($judul, $type, $limit = 12, $offset = 0)
    {
        $judul = url_title($judul, '+', true);
        $field = 'mean,media_type';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . $type . "?q=" . $judul . "&limit=" . $limit . '&fields=' . $field . '&offset=' . $offset);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getAnimeRanking($type, $limit, $offset = 0)
    {
        $field = 'mean,media_type';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . "anime/ranking?ranking_type=" . $type . "&limit=" . $limit . '&fields=' . $field . '&offset=' . $offset);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getAnimeSeasonal($year, $season, $limit, $offset)
    {
        $field = 'mean,media_type';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . "anime/season/" . $year . "/" . $season . "?limit=" . $limit . '&fields=' . $field . "&sort=anime_num_list_users&offset=" . $offset);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getAnimeSuggestion($limit, $offset = 0)
    {
        $field = 'mean,media_type';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . "anime/suggestions?limit=" . $limit . '&fields=' . $field . '&offset=' . $offset);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getAnimeDetail($id)
    {
        $id = htmlspecialchars(url_title($id, ""));
        $field = "id,title,main_picture,alternative_titles,start_date,end_date,synopsis,mean,rank,popularity,num_list_users,num_scoring_users,media_type,status,genres,my_list_status,num_episodes,start_season,broadcast,source,average_episode_duration,rating,pictures,background,related_anime,studios,statistics";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . "anime/" . $id . "?fields=" . $field);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getMangaDetail($id)
    {
        $id = htmlspecialchars(url_title($id, ""));
        $field = "id,title,main_picture,alternative_titles,start_date,end_date,synopsis,mean,rank,popularity,num_list_users,num_scoring_users,created_at,updated_at,media_type,status,genres,my_list_status,num_volumes,num_chapters,authors{first_name,last_name},pictures,background,related_manga,serialization{name}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . "manga/" . $id . "?fields=" . $field);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getMangaRanking($type, $limit, $offset = 0)
    {
        $field = 'mean,media_type';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url_api . "manga/ranking?ranking_type=" . $type . "&limit=" . $limit . '&fields=' . $field . '&offset=' . $offset);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $this->token"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getCode($type = 'code')
    {
        $client_id = $this->db->table('tb_config')->getWhere(['name' => 'client_id'])->getResultArray()['0']['value'];
        $code_challenge = $this->db->table('tb_config')->getWhere(['name' => 'code_challenge'])->getResultArray()['0']['value'];
        $url = 'https://myanimelist.net/v1/oauth2/authorize?response_type=' . $type . '&client_id=' . $client_id . '&code_challenge=' . $code_challenge;
        return redirect()->to($url);
    }

    public function getToken($code)
    {
        $client_id = $this->db->table('tb_config')->getWhere(['name' => 'client_id'])->getResultArray()['0']['value'];
        $client_secret = $this->db->table('tb_config')->getWhere(['name' => 'client_secret'])->getResultArray()['0']['value'];
        $code_challenge = $this->db->table('tb_config')->getWhere(['name' => 'code_challenge'])->getResultArray()['0']['value'];

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://myanimelist.net/v1/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'authorization_code',
                'code' => $code,
                'code_verifier' => $code_challenge,
            )
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    public function getRefreshToken()
    {
        $client_id = $this->db->table('tb_config')->getWhere(['name' => 'client_id'])->getResultArray()['0']['value'];
        $client_secret = $this->db->table('tb_config')->getWhere(['name' => 'client_secret'])->getResultArray()['0']['value'];
        $code_challenge = $this->db->table('tb_config')->getWhere(['name' => 'code_challenge'])->getResultArray()['0']['value'];
        $refresh_token = $this->db->table('tb_config')->getWhere(['name' => 'refresh_token'])->getResultArray()['0']['value'];

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://myanimelist.net/v1/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'refresh_token',
                'refresh_token' => $refresh_token,
                'code_verifier' => $code_challenge,
            )
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }

    //--------------------------------------------------------------------

}
