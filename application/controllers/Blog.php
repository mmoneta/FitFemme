<?php
  class Blog extends CI_Controller {
    function __construct() {
      parent::__construct();
      $this->load->model('Blog_model');
      $this->load->helper('url');
      $this->load->helper('cookie');
      $this->load->library('user_agent');
    }
    
    public function index() {
      $this->db->from('Theme');
      $count = $this->db->count_all_results();
      $categories = array();
      for($i = 1; $i <= $count; $i++) {
        $query = $this->db->query("SELECT Posts.ID, Theme.Name, Posts.Title, Posts.Cover, Posts.Style, Posts.Date, Posts.Active FROM `Posts` INNER JOIN `Categories` ON Categories.ID = Posts.Category INNER JOIN `Theme` ON Theme.ID = Posts.Theme WHERE Theme.ID = $i ORDER BY CONVERT(DATE, date) DESC LIMIT 4");
        $categories[] = $query->result_array();
      }
      $data['list'] = $categories;
      $data['view'] = 'index';
      $data['controller'] = $this;
      $this->load->view('blogview', $data);
    }
    
    public function searcher() {
      redirect('blog/search/'.$this->input->post('search'));
    }
    
    public function search($key) {
      $query = $this->db->query("SELECT ID, Title, Cover, Style, Date, Active FROM `Posts` WHERE Title LIKE '%".$key."%' ORDER BY CONVERT(DATE, date) DESC");
      $categories[] = $query->result_array();
      $data['list'] = $categories;
      $data['view'] = 'search';
      $data['controller'] = $this;
      $this->load->view('blogview', $data);
    }
    
    function create_sections($list, $view) {
      for ($i = 0; $i < count($list); $i++) {
        if (isset($list[$i][0]["Name"]))
          echo("<div class='container'>
              <div class='row object'>
                <div class='col-md-4'>
                  <hr />
                </div>
                <div class='col-md-4 col-xs-12 text-center'>
                  <hr /><p class='h2' style='color: white; font-weight: bold;'>".$list[$i][0]["Name"]."</p><hr />
                </div>
                <div class='col-md-4'>
                  <hr />
                </div>
              </div>
            </div>");
        for ($j = 0; $j < count($list[$i]); $j++) {
          $active = $list[$i][$j]["Active"];
          $link = base_url().$list[$i][$j]["Cover"];
          $style = $list[$i][$j]["Style"];
          $title = $list[$i][$j]["Title"];
          $phpdate = strtotime($list[$i][$j]["Date"]);
          $date = date('d.m.Y', $phpdate);
          $file_parts = pathinfo($link);
          if ($active) {
            echo("<div class='col-md-6 col-xs-12 range center-block' data-link='".base_url()."blog/posts/".$date."'>
                <figure>
                  <div class='thumbnail object'>");
            switch($file_parts['extension'])
            {
              case "gif":
                if ($style == NULL)
                  echo("<object class='img' data='$link' type='image/gif'></object>");
                else
                  echo("<object class='img' style='$style' data='$link' type='image/gif'></object>");
                break;
              default:
                if ($style == NULL)
                  echo("<img class='img' src='$link' alt='Cover' />");
                else
                  echo("<img class='img' style='$style' src='$link' alt='Cover' />");
                break;
            }
            echo("</div>
                <figcaption>
                  <h4 class='text-center names'>$title</h4>
                  <h6 class='text-center'>Data dodania: $date</h6>
                </figcaption>
              </figure>
            </div>");
          }
        }
        if ($view == 'index') {
          echo("<div class='container' style='text-align: right; margin: 15px;'>
              <a href='//fitfemme.pl/blog/theme/".strtolower($list[$i][0]["Name"])."' class='right-block' style='font-family: ComicSans; font-size: 95%; padding: 10px; border-radius: 50%; border: 2px outset white;'>Starsze posty...</a>
            </div>");
        }
      }
    }
    
    public function theme($key) {
      $query = $this->db->query("SELECT Posts.ID, Theme.Name, Posts.Title, Posts.Cover, Posts.Style, Posts.Date, Posts.Active FROM `Posts` INNER JOIN `Categories` ON Categories.ID = Posts.Category INNER JOIN `Theme` ON Theme.ID = Posts.Theme WHERE Theme.Name = '$key' ORDER BY CONVERT(DATE, date) DESC");
      $categories[] = $query->result_array();
      $data['list'] = $categories;
      $data['view'] = 'theme';
      $data['controller'] = $this;
      $this->load->view('blogview', $data);
    }
    
    public function category() {
      $title = $this->input->post("category");
      $query = $this->db->query("SELECT Posts.ID, Categories.Name, Posts.Title, Posts.Cover, Posts.Style, Posts.Date, Posts.Active FROM `Posts` INNER JOIN `Categories` ON Categories.ID = Posts.Category WHERE Categories.Name = '".$title."' ORDER BY CONVERT(DATE, date) DESC");
      echo json_encode($query->result());
    }
    
    public function about() {
      $this->load->view('about');
    } 
    
    public function contact() {
      $this->load->view('contact');
    }
    
    public function message() {
      $this->load->library('email');
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $message = $this->input->post('message');
      list($userName, $mailDomain) = explode("@", $email);
      if (checkdnsrr($mailDomain, "MX")) { 
        $this->email->from($email);
        $this->email->to('kontakt@fitfemme.pl');
        $this->email->subject('Blog');
        $this->email->message($message);
        if ($this->email->send()) { 
           echo("Wiadomość wysłana!");
        }
        else {
          echo("Wiadomość nie została wysłana!");
        }
      } 
      else { 
        echo("NieprawidÅ‚owa domena!");
      } 
      header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    
    public function cooperation() {
      $this->load->view('cooperation');
    }
    
    public function answer() {
      $this->load->view('answer');
    }

    public function authorized() {
      $this->load->view('authorized');
    }
    
    public function metamorphoses() {
      $query = $this->db->query("SELECT Posts.ID, Categories.Name, Posts.Title, Posts.Cover, Posts.Style, Posts.Date, Posts.Active FROM `Posts` INNER JOIN `Categories` ON Categories.ID = Posts.Category WHERE Categories.Name = 'Metamorfozy' ORDER BY CONVERT(DATE, date) DESC");
      $data['list'] = $query->result_array();
      $data['controller'] = $this;
      $this->load->view('metamorphoses', $data);
    }
    
    function create_posts($list) {
      foreach($list as $item) {
    		$link = base_url().$item["Cover"];
    		$title = $item["Title"];
    		$phpdate = strtotime($item["Date"]);
    		$date = date('d.m.Y', $phpdate);
    		$file_parts = pathinfo($link);
    		echo("<div class='col-md-6 range' data-link='".base_url()."/blog/posts/".$date."'>
    				<figure>
    					<div class='thumbnail object'>");
    		switch($file_parts['extension'])
    		{
    			case "gif":
    				echo("<object class='img' data='$link' type='image/gif'></object>");
    				break;
    			default:
    				echo("<img class='img' src='$link' />");
    				break;
    		}
    		echo("</div>
    				<figcaption>
    					<h4 class='text-center names'>$title</h4>
    					<h6 class='text-center'>Data dodania: $date</h6>
    				</figcaption>
    			</figure>
    		</div>");
    	}
    }
    
    public function posts($time = "") {
      if ($time != "") {
        $url = $this->agent->referrer();
        $needle = "posts";
        $data['period'] = $time;
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
        if (strpos($url, $needle) == false)
          $url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $data['list'] = $this->Blog_model->comments_select('Comments', $url);
        $data['accounts'] = $this->Blog_model->comments_select('users', $url);
        $query = $this->db->query("SELECT Title FROM `Posts` WHERE Date = '".date('Y-m-d', strtotime($time))."'");
        $result = (array) $query->row();
        $data['title'] = $result["Title"];
        $data['controller'] = $this;
        $this->load->view('template', $data);
      }
      else {
        redirect('/blog', 'location');
      }
    }
    
    function answers($id, $type) {
      $this->db->select('*');
      $this->db->from('Answers');
      $where = "Comment_ID = ".$id." AND Type = '".$type."'";
      $this->db->where($where);
      $this->db->order_by('Date', 'ASC');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        foreach($query->result_array() as $item) {
          $phpdate = strtotime($item["Date"]);
          $date = date('d.m.Y H:i', $phpdate);
          $comment = str_replace(array(':)', ';)'), array('<i class="em em-smile"></i>', '<i class="em em-wink"></i>'), $item["Answer"]);
          if ($item["Name"] != null) {
            echo("<div class='row' style='margin-top: 0px !important;'>
                <div class='col-md-10 col-md-offset-2 col-xs-10 col-xs-offset-2 answer-group'>
                  <div class='col-md-2'>
                    <img src='".$item["Picture"]."' class='top-buffer' style='border-radius: 50% !important; alt='Photo of profile' />
                  </div>
                  <div class='col-md-10'>
                    <h3 style='padding-top: 15px;'>".$item["Name"]."</h3>
                    <h5>".$date."</h5>
                  </div>
                  <div class='col-md-12'>
                    <p class='h4 text-center top-buffer'>".$comment."</p>
                  </div>
                </div>
              </div>");
          }
          else {
            echo("<div class='row'  style='margin-top: 0px !important;'>
                <div class='col-md-10 col-md-offset-2 col-xs-10 col-xs-offset-2 answer-group'>
                  <h3>Anonimowy</h3>
                  <h5>".$date."</h5>
                  <p class='h4 text-center top-buffer'>".$comment."</p>
                </div>
              </div>");
          }
        }
      }
    }
    
    public function comment() {
      $option = $this->input->post('option');
      $message = $this->input->post('message');
      $url = substr($this->agent->referrer(),0,strpos($this->agent->referrer(),"?"));
      if ($url == null)
        $url = $this->agent->referrer();
      $needle = "posts";
      $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
      if (strpos($url, $needle) == false)
         $url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      switch($option) {
        case "anonim":
          $data = array(
            'Author' => 'Anonimowy',
            'Date' => date("Y-m-d H:i:s",time()),
            'URL' => $url,
            'Comment' => $message
          );
          // Transfering data to Model
          $this->Blog_model->form_insert('Comments', $data);
          header("Location: ".$url);
          break;
        case "google":
          $comment = array(
             'name'   => 'message',
             'value'  => $message,
             'expire' => '86400'
             );
          $this->input->set_cookie($comment);
          $page = array(
             'name'   => 'url',
             'value'  => $url,
             'expire' => '86400'
             );
          $this->input->set_cookie($page);
          $this->load->view('comment');
          break;
      }  
    }
    
    public function google() {
      $id = $this->input->post('ID');
      $name = $this->input->post('name');
      $surname = $this->input->post('surname');
      $profile_image = $this->input->post('image');
      $email = $this->input->post('email');
      $comment = $this->input->cookie('message', TRUE);
      $url = $this->input->cookie('url', TRUE);
      $data = array(
        'Account' => $id,
        'Name' => $name,
        'Surname' => $surname,
        'E-mail' => $email,
        'Picture' => $profile_image,
        'Comment' => $comment,
        'URL' => $url,
        'Date' => date("Y-m-d H:i:s",time())
      );
      // Transfering data to Model
      $this->Blog_model->form_insert('users', $data);
      // Remove cookies
      echo($url);
      delete_cookie('message');
      delete_cookie('url');
    }
    
    public function responses() {
      $id = $this->input->post('ID');
      $type = $this->input->post('type');
      $option = $this->input->post('option');
      $comment = $this->input->post('comment');
      switch($option) {
        case "anonim":
          $data = array(
            'Date' => date("Y-m-d H:i:s",time()),
            'Comment_ID' => $id,
            'Type' => $type,
            'Answer' => $comment
          );
          // Transfering data to Model
          $this->Blog_model->form_insert('Answers', $data);
          break;
        case "google":
          $name = $this->input->post('name');
          $surname = $this->input->post('surname');
          $profile_image = $this->input->post('image');
          $email = $this->input->post('email');
          $data = array(
            'Date' => date("Y-m-d H:i:s",time()),
            'Name' => $name,
            'Surname' => $surname,
            'E-mail' => $email,
            'Picture' => $profile_image,
            'Comment_ID' => $id,
            'Type' => $type,
            'Answer' => $comment
          );
          // Transfering data to Model
          $this->Blog_model->form_insert('Answers', $data);
          break;
      } 
    }
  }
?>
