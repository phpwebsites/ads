<?php
   class FrontCategoryController extends CI_Controller
   {
   	function __construct() 
   	{ 
            parent::__construct(); 
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->helper('form'); 
            $this->load->library('upload');
            $this->load->model('categoriesmodel');
            $this->load->model('subcategoriesmodel');
   		      $this->load->library('session');
            $this->load->model('adsimagesmodel');
            $this->load->model('adsmodel');
            //$this->load->helper('captcha');
            
    }

      public function getmaincategories()
      {
          $data = $this->categoriesmodel->getAllcategories();
          //$this->load->view('viewall',$data);
          return $data;
      } // ########## use limit #########

      public function getallsubcategory()
      {
         $data['categories'] = $this->categoriesmodel->getAllcategories();
         $id = $this->uri->segment(3);
         $subcatdata['subcategories'] = $this->subcategoriesmodel->getSubcategories($id);
         $this->load->view('viewall',$subcatdata);
      }

      public function postanadsubcategory()
      {
         $id = $this->uri->segment(3);
         $subcatdata['subcategories'] = $this->subcategoriesmodel->getSubcategories($id);
         $this->load->view('getsubcategory',$subcatdata);
      }

      public function postanad()
      {
         $this->captcha_setting();

         //$this->load->view('postanad.php');
      }

      public function postanadcreate()
      {

         $postadval = array('title' => $this->input->post('title'),'description' => $this->input->post('desc'),'category_id' => $this->input->post('category'),'subcategory_id' => $this->input->post('subcategory'),'price' => $this->input->post('price'),'payment_status' => $this->input->post('payment_status'));
          $this->form_validation->set_rules('title', 'Title', 'required');
          $this->form_validation->set_rules('desc', 'description', 'required');
          $this->form_validation->set_rules('category', 'Category', 'required');
          $this->form_validation->set_rules('subcategory', 'SubCategory', 'required');
          $this->form_validation->set_rules('price', 'Price', 'required');
          $this->form_validation->set_rules('payment_status', 'Paymentstatus', 'required');
          print_r($_FILES['image']['name']);exit;
          if(empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Ad image', 'required');
          }
          if ($this->form_validation->run() == FALSE)
          {

             $this->captcha_errorsetting(); 
             
          }
          else
          {
              if (strcasecmp($this->session->userdata('word'), $this->input->post('captcha')) == 0) 
              {
                         $result = $this->adsmodel->adddata($postadval);
                         $last_insertid = $this->db->insert_id();
                         $files = $_FILES;
                         $cpt = count($_FILES['image']['name']);
                         for($i=0; $i<$cpt; $i++)
                         {
                             $_FILES['image']['name']= $files['image']['name'][$i];
                             //echo $_FILES['image']['name']; exit;
                             $_FILES['image']['type']= $files['image']['type'][$i];
                             $_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
                             $_FILES['image']['error']= $files['image']['error'][$i];
                             $_FILES['image']['size']= $files['image']['size'][$i];
                             $this->load->library('upload', $this->set_upload_options());
                             $this->upload->initialize($this->set_upload_options());
                             if (!$this->upload->do_upload('image'))
                             {
              
                                 $data['fileerror'] = $this->upload->display_errors();
                                 $this->load->view('postanad',$data);
                             }
                             else
                             {
                                 
                                 $data = array('upload_data' => $this->upload->data());

                             }
                             $fileName = $_FILES['image']['name'];
                             $images[] = $fileName;
                        }
                        $fileName = implode(',',$images);
                        $this->adsimagesmodel->upload_image($fileName,$last_insertid);
                        echo "<script type='text/javascript'> alert('Your form successfully submitted'); </script>";
                        $this->load->view('formsuccess');
                }
                else 
                {
                  $this->captcha_errorsetting(); 
                  
                }    
          } 
          
      }
      // ############## captcha code start ###########
       public function captcha_setting()
       {
                $letters = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                $word = '';
                $n = 0;
                while($n < 10)
                {
                  $word .= $letters[mt_rand(0,35)];
                  $n++;
                }
                $values = array(
                'word' => strtoupper($word),
                'word_length' => 8,
                'img_path' => './assets/captcha/',
                'img_url' =>  base_url() .'assets/captcha/',
                'font_path'  => base_url() . 'assets/fonts/impact.ttf',
                'img_width' => 150,
                'img_height' => 50,
                'expiration' => 3600
               );
            $data = create_captcha($values);
            $this->session->set_userdata($data);
            $this->session->userdata('word');
            // image will store in "$data['image']" index and its send on view page
            $error = array('error' => " ");
            $data = array_merge($data,$error); 
            $this->load->view('postanad.php', $data);
       }  

  
   public function captcha_errorsetting()
   {
                $letters = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                $word = '';
                $n = 0;
                while($n < 10)
                {
                  $word .= $letters[mt_rand(0,35)];
                  $n++;
                }
                $values = array(
                'word' => strtoupper($word),
                'word_length' => 8,
                'img_path' => './assets/captcha/',
                'img_url' =>  base_url() .'assets/captcha/',
                'font_path'  => base_url() . 'assets/fonts/impact.ttf',
                'img_width' => 150,
                'img_height' => 50,
                'expiration' => 3600
               );
            $data = create_captcha($values);
            $this->session->set_userdata($data);
            $this->session->userdata('word');
            // image will store in "$data['image']" index and its send on view page 
            $error = array('error' => "Please enter valid captcha code");
            $data = array_merge($data,$error);
           
            $this->load->view('postanad.php', $data);
  }    

       // For new image on click refresh button.
    public function captcha_refresh()
    {
                $letters = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                $word = '';
                $n = 0;
                while($n < 10)
                {
                  $word .= $letters[mt_rand(0,35)];
                  $n++;
                }
                $values = array(
                'word' => strtoupper($word),
                'word_length' => 8,
                'img_path' => './assets/captcha/',
                'img_url' =>  base_url() .'assets/captcha/',
                'font_path'  => base_url() . 'system/fonts/texb.ttf',
                'img_width' => 150,
                'img_height' => 50,
                'expiration' => 3600
               );
            $data = create_captcha($values);
            $this->session->set_userdata($data);
            $this->session->userdata('word');
            echo $data['image'];
        
    }

    private function set_upload_options()
    {
        // upload an image options
         $config = array();
         $config['upload_path'] = './uploads/'; //give the path to upload the image in folder
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = '0';
         $config['overwrite'] =  TRUE;
         return $config;
    }
  }
?>