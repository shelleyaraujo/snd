<?php

class VideosYoutubeChannelModel extends PersistModelAbstract
{

    private $idcategoria;

    public function setIdCategoria( $idcategoria )
    {
        $this->idcategoria = $idcategoria;
        return $this;
    }

    public function getIdCategoria()
    {
        return $this->idcategoria;
    }

    function __construct()
    {
      parent::__construct();
  }

public function readItens($canal,$idcategoria,$idconteudo)
{
    $r = "";
    $x = "";

    $channelId = $canal;
    $maxResults = 10;
    $API_key = 'AIzaSyCYCMjmldqwk21F_E-G6UCh5c8zTxBAYnU';

    //set_error_handler('videoListDisplayError');

//To try without API key: $video_list = json_decode(file_get_contents('example.json'));
    $video_list = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelId.'&maxResults='.$maxResults.'&key='.$API_key.''));

    $r = "<div class='row small-up-1 medium-up-3'>";

    foreach($video_list->items as $item)
    {
        //Embed video
        if(isset($item->id->videoId)){

            $x .= '<li id="'. $item->id->videoId .'" class="col-lg-3 col-sm-6 col-xs-6 youtube-video">
            <a href="#'. $item->id->videoId .'" title="'. $item->snippet->title .'">
                <img src="'. $item->snippet->thumbnails->medium->url .'" alt="'. $item->snippet->title .'" class="img-responsive" height="130px" />
                <h2>'. $item->snippet->title .'</h2>
                <span class="glyphicon glyphicon-play-circle"></span>
            </a>
        </li>
        ';

        $r .= "<div class='column videos' id='"  . $item->id->videoId . "'>";
        $r .= "<a href='?controle=VideosYoutubeChannel&acao=open&id=". $idconteudo  ."&idcategoria=" . $idcategoria . "&video=". $item->id->videoId  ."'>";
        $r .= "<img src='". $item->snippet->thumbnails->medium->url . "' alt='". $item->snippet->title . "'/>";
        $r .= "</a>";

      $r .= "<a href='?controle=VideosYoutubeChannel&acao=open&id=". $idconteudo  ."&idcategoria=" . $idcategoria . "&video=". $item->id->videoId  ."'>";
        $r .= $item->snippet->title;
        $r .= "</a>";
        $r .= "</div>";             

    }
        //Embed playlist
    else if(isset($item->id->playlistId))
    {
        $x .= '<li id="'. $item->id->playlistId .'" class="col-lg-3 col-sm-6 col-xs-6 youtube-playlist">
        <a href="#'. $item->id->playlistId .'" title="'. $item->snippet->title .'">
            <img src="'. $item->snippet->thumbnails->medium->url ."' alt='". $item->snippet->title .'" class="img-responsive" height="130px" />
            <h2>'. $item->snippet->title .'</h2>
            <span class="glyphicon glyphicon-play-circle"></span>
        </a>
    </li>
    ';

        $r .= "<div class='column videos' id='"  . $item->id->playlistId . "'>";
        $r .= "<div class='column column-2'>";  
        $r .= "<a href='#top' onclick=playVideo('". $item->id->playlistId  ."')>";
        $r .= "<img src='". $item->snippet->thumbnails->medium->url .'" alt="'. $item->snippet->title . "'/>";
        $r .= "</a>";
        $r .= "</div>";
        $r .= "<div class='video'>";
        $r .= "<a href='#top' onclick=playVideo('". $item->id->playlistId ."')>". $item->snippet->title  ."</a>";
        $r .= "</div>";             
        $r .= "</div>"; 

}

}

 $r .= "</div>";
return $r;

}


}

?>