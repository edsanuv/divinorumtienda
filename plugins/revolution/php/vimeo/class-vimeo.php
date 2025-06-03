<?php 

/**
 * Vimeo
 *
 * with help of the API this class delivers all kind of Images/Videos from Vimeo
 *
 * @package    socialstreams
 * @subpackage socialstreams/vimeo
 * @author     ThemePunch <info@themepunch.com>
 */

class TP_vimeo {
	/**
	 * Stream Array
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $stream    Stream Data Array
	 */
	private $stream;

	/**
	 * Get Vimeo User Videos
	 *
	 * @since    1.0.0
	 */
	public function get_vimeo_videos($type,$value){
		//call the API and decode the response
		if($type=="user"){
			$url = "https://vimeo.com/api/v2/".$value."/videos.json";
		}
		else{
			$url = "https://vimeo.com/api/v2/".$type."/".$value."/videos.json";
		}
		
		$rsp = json_decode(file_get_contents($url));
		
		return $rsp;
	}

	/**
	 * Prepare output array $stream for Vimeo videos
	 *
	 * @since    1.0.0
	 * @param    string    $videos 	Vimeo Output Data
	 */
	private function vimeo_output_array($videos,$count){
		foreach ($videos as $video) {
			if($count-- == 0) break;

			$stream = array();

			$image_url = @array(
				'thumbnail_small' 	=> 	array($video->thumbnail_small),
				'thumbnail_medium' 	=> 	array($video->thumbnail_medium),
				'thumbnail_large' 	=> 	array($video->thumbnail_large),
			);

			$stream['custom-image-url'] = $image_url; //image for entry
			$stream['custom-type'] = 'vimeo'; //image, vimeo, youtube, soundcloud, html
			$stream['custom-vimeo'] = $video->id;
			$stream['post_url'] = $video->url;
			$stream['post_link'] = $video->url;
			$stream['title'] = $video->title;
			$stream['content'] = $video->description;
			$stream['date_modified'] = $video->upload_date;
			$stream['author_name'] = $video->user_name;
			
			$this->stream[] = $stream;
		}
	}
}
?>   * Connect as application
     * https://dev.twitter.com/docs/auth/application-only-auth
     */
    $connection = $twitter->connectAsApplication();

    /*
     * Collection of the most recent Tweets posted by the user indicated by the screen_name, without replies
     * https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
     */
    $tweets = $connection->get('/statuses/user_timeline',array('screen_name' => $twitter_account,  'entities' => 1, 'trim_user' => 0 , 'exclude_replies' => 'true'));
    //var_dump($tweets);
    return $tweets;
  }


  /**
   * Find Key in array and return value (multidim array possible)
   *
   * @since    1.0.0
   * @param    string    $key   Needle
   * @param    array     $form  Haystack
   */
  public static function array_find_element_by_key($key, $form) {
      if (array_key_exists($key, $form)) {
        $ret =& $form[$key];
        return $ret;
      }
      foreach ($form as $k => $v) {
        if (is_array($v)) {
          $ret =TP_twitter::array_find_element_by_key($key, $form[$k]);
          if ($ret) {
            return $ret;
          }
        }
      }
      return FALSE;
  }

  /**
   * Prepare output array $stream
   *
   * @since    1.0.0
   * @param    string    $tweets  Twitter Output Data
   */
  public static function makeClickableLinks($s) {
    return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $s);
  }
  
}
?>