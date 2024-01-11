<?php 

Class Recipes extends Db {

    public function getRecipesByName($query) {

        $apiUrl = 'https://www.themealdb.com/api/json/v1/1/search.php';

        // Append parameters to the URL
        $apiUrl .= '?s=' . urlencode($query);

        $ch = curl_init($apiUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        if ($response) {
            return $data = json_decode($response, true);
            print_r($data['meals'][0]['strMeal']);
        } else {
            echo 'No response received from the API';
        }
    }

    public function getRecipeById($id) {

        $apiUrl = 'https://www.themealdb.com/api/json/v1/1/lookup.php';

        $apiUrl .= '?i=' . urlencode($id);

        $ch = curl_init($apiUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        if ($response) {
            return $data = json_decode($response, true)['meals'][0];
        } else {
            echo 'No response received from the API';
        }
    }

    public function getRandomRecipe() {

        $apiUrl = 'https://www.themealdb.com/api/json/v1/1/random.php';

        $ch = curl_init($apiUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        if ($response) {
            return $data = json_decode($response, true)['meals'][0];
        } else {
            echo 'No response received from the API';
        }
    }
}