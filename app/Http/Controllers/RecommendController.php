<?php

namespace App\Http\Controllers;

use App\Todo;
use Google_Client;
use Google_Service_YouTube;
use Illuminate\Support\Facades\Auth;

class RecommendController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchvideo()
    {

        $data = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', false]])->orderBy('created_at', 'desc')->first();
        if ($data) {
            $q = $data->title;
        } else {
            $data = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', true]])->orderBy('created_at', 'asc')->first();
            if ($data) {
                $q = $data->title;
            } else {
                $q = 'my recomendation';
            }
        }

        /*
        * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
        * Google Developers Console <https://console.developers.google.com/>
        * Please ensure that you have enabled the YouTube Data API for your project.
        */
        $DEVELOPER_KEY = 'AIzaSyArfj1GLTVUIyJ41bSm5I9gDLd5Frvn5Sk';

        $client = new Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);

        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);

        try {
            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => $q,
                'maxResults' => 10,
            ));

            foreach ($searchResponse['items'] as $searchResult) {
                if ($searchResult['id']['kind'] == 'youtube#video') {
                    $id = $searchResult['id']['videoId'];
                    break;
                }
            }
        } catch (Google_Service_Exception $e) {
            $id = $e->getMessage();
        }

        return $id;
    }

    public function index()
    {
        return view('recommend', ['id' => $this->searchvideo()]);
    }
}
