<?php

/**
 * HTMLs configuration pages
 * @author Bruno Ribeiro <bruno.espertinho@gmail.com>
 * @version 1.1
 * @access public
 * @package Config
 * @todo Improve the customization of the configuration file
 * */
class SetupConfigHTML
  {
    
    /**
     * file config required for start the website
     * Note: at the time of verification and creating the configuration file, is always 
     * in the root folder, then the file is in a folder specify as follows: "config/config.inc.php"
     * @var string 
     */
    public $file1 = 'config' . DIRECTORY_SEPARATOR . 'database.php';
    public $file2 = 'config' . DIRECTORY_SEPARATOR . 'coaching_machine_settings.php';
    
    /**
     * Name your project
     * @var str 
     */
    var $name = 'Coaching Machine';
    
    /**
     * link your project
     * @var str 
     */
    var $link = 'http://www.espacoserhumano.com/coachingmachine/';
    
    /**
     * logo your project
     * @var str 
     */
    var $logo = 'images/w-logo-blue.png';
    
    /**
     * Language of pages
     * @var string 
     */
    var $CurrentLanguage = null;
    
    /**
     * Rules for replacement
     * @var array
     */
    var $Rules = array("&lt;" => "<", "&gt;" => ">", "&quot;" => '"', "&apos;" => "'", "&amp;" => "&");
    
    /**
     * Metthod Magic
     * Require language file
     */
    public function __construct()
      {
        session_start();
        if (!empty($_SESSION["lang"]) && !is_null($_SESSION["lang"])) {
          $this->CurrentLanguage=$_SESSION["lang"];
        } else {
          $_SESSION['lang'] = 'pt-br';
          $this->CurrentLanguage = 'pt-br';
        }
        switch ($this->CurrentLanguage)
        {
            case 'pt-br': // Português Brasileiro
                include('/Language/pt-br.php');
                break;
             case 'en': // English
                include('/Language/en.php');
                break;    
             case 'es': // Español - Beta
                include('/Language/es.php');
                break; 
            case 'it': // Italiano - Beta
                include('/Language/it.php');
                break;
            case 'ru': // Русский - Beta
                include('/Language/ru.php');
                break;
            default:                
                include('/Language/pt-br.php');            
                break;
        }
      }
    
    /**
     * Here is the main configuration file of your application.
     * Note: replace special characters that makes conflict with the EOFPAGE 
     * if the character in question does not exist, add it to 
     * the array $ASCI_table_replace the file setup-config.php
     * @access protected
     * @param array $POST
     * @return HTML
     */
    protected function FileGenerate($POST,$version=1)
      {

        $year = date('Y');
        
        if ($version == 1) {
          $f = "&#60;?php
class DATABASE_CONFIG {
	public &#36;default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '{$POST['dbhost']}',
		'login' => '{$POST['uname']}',
		'password' => '{$POST['pwd']}',
		'database' => '{$POST['dbname']}',
		'prefix' => '',
		'encoding' => 'utf8',
	);
}";
        } else {
          $f = "&#60;?php
&#36;config = array();
Configure::write('Config.language', '{$_SESSION['lang']}');";
        }

        return $f;
      }
    
    /**
     * Convert Special Char
     * @param string $string
     * @return string
     */
    private function RevertHTML($string)
      {
        foreach ($this->Rules as $k => $v)
          {
            $string = str_replace($k, $v, $string);
          }
        return $string;
      }
    
    /**
     * Create an HTML for step 1
     * @access protected
     * @return HTML
     */
    protected function HTMLStep1()
      {
        $html = new DOMDocument();
        $html->loadHTMLFile("Pages/step1.xml");
        $html->preserveWhiteSpace = false;
        $html->formatOutput       = true;
        
        $html->getElementById('logo')->nodeValue                 = sprintf(LOGO, $this->logo, $this->link, $this->name);
        $html->getElementsByTagName('title')->item(0)->nodeValue = sprintf(STEP1_TITLETAG, $this->name);
        $html->getElementById('title')->nodeValue                = sprintf(STEP1_TITLE, $this->name);
        $html->getElementById('LIST1')->nodeValue                = STEP1_LIST1;
        $html->getElementById('LIST2')->nodeValue                = STEP1_LIST2;
        $html->getElementById('LIST3')->nodeValue                = STEP1_LIST3;
        $html->getElementById('LIST4')->nodeValue                = STEP1_LIST4;
        $html->getElementById('LIST5')->nodeValue                = STEP1_LIST5;
        $html->getElementById('DLIST5')->nodeValue                = STEP1_DLIST5;
        $html->getElementById('txt1')->nodeValue                 = sprintf(STEP1_TEXT1, $this->file1, $this->file1, $this->file1);
        $html->getElementById('txt2')->nodeValue                 = STEP1_TEXT2;
        $html->getElementById('step_1_button')->nodeValue        = STEP1_BUTTON;
        
        return $this->RevertHTML($html->saveHTML());
      }
    
    /**
     * Create an HTML for step 2
     * @access protected
     * @return HTML
     */
    protected function HTMLStep2()
      {
        $html = new DOMDocument();
        $html->loadHTMLFile("Pages/step2.xml");
        $html->preserveWhiteSpace = false;
        $html->formatOutput       = true;
        
        $html->getElementById('logo')->nodeValue                 = sprintf(LOGO, $this->logo, $this->link, $this->name);
        $html->getElementsByTagName('title')->item(0)->nodeValue = sprintf(STEP1_TITLETAG, $this->name);
        
        $html->getElementById('STEP2_TEXT1')->nodeValue = STEP2_TEXT1;
        
        $html->getElementById('LIST1')->nodeValue  = STEP2_LIST1;
        $html->getElementById('DLIST1')->nodeValue = sprintf(STEP2_DLIST1, $this->name);
        
        $html->getElementById('LIST2')->nodeValue  = STEP2_LIST2;
        $html->getElementById('DLIST2')->nodeValue = STEP2_DLIST2;
               
        $html->getElementById('LIST3')->nodeValue  = STEP2_LIST3;
        $html->getElementById('DLIST3')->nodeValue = STEP2_DLIST3;
        
        $html->getElementById('LIST4')->nodeValue  = STEP2_LIST4;
        $html->getElementById('DLIST4')->nodeValue = STEP2_DLIST4;
       
        $input = $html->getElementById('send');
        $input->removeAttribute('value');
        $input->setAttribute('value', STEP2_BUTTON);
        
        return $this->RevertHTML($html->saveHTML());
      }
    
    /**
     * Create an HTML when it is not possible to connect to the database
     * @access protected
     * @return type
     */
    protected function HTMLErroConnection()
      {
        $html = new DOMDocument();
        $html->loadHTMLFile("Pages/ErroConnection.xml");
        $html->preserveWhiteSpace = false;
        $html->formatOutput       = true;
        
        $html->getElementsByTagName('title')->item(0)->nodeValue = sprintf(STEP1_TITLETAG, $this->name);
        
        $html->getElementById('TEXT1')->nodeValue  = ERRO_CONNETION_TEXT1;
        $html->getElementById('TEXT2')->nodeValue  = ERRO_CONNETION_TEXT2;
        $html->getElementById('TEXT3')->nodeValue  = ERRO_CONNETION_TEXT3;
        $html->getElementById('TEXT4')->nodeValue  = ERRO_CONNETION_TEXT4;
        $html->getElementById('TEXT5')->nodeValue  = ERRO_CONNETION_TEXT5;
        $html->getElementById('TEXT6')->nodeValue  = ERRO_CONNETION_TEXT6;
        $html->getElementById('BUTTON')->nodeValue = ERRO_CONNETION_BUTTON;
        
        return $this->RevertHTML($html->saveHTML());
      }
    
    /**
     * create an HTML when the file was created successfully
     * @access protected
     * @return HTML
     */
    protected function HTMLSucessCreatedFileConfig()
      {
        $html = new DOMDocument();
        $html->loadHTMLFile("Pages/SucessCreated.xml");
        $html->preserveWhiteSpace = false;
        $html->formatOutput       = true;
        
        $html->getElementById('logo')->nodeValue                 = sprintf(LOGO, $this->logo, $this->link, $this->name);
        $html->getElementsByTagName('title')->item(0)->nodeValue = sprintf(STEP1_TITLETAG, $this->name);
        
        $html->getElementById('text')->nodeValue = sprintf(SUCCESS_TEXT, $this->name);
        
        $html->getElementById('button')->nodeValue = SUCCESS_BUTTON;
        
        return $this->RevertHTML($html->saveHTML());
      }
    
    /**
     * create an HTML when some error occurs
     * @access protected
     * @return HTML
     */
    protected function HTMLErroUnknow()
      {
        $html = new DOMDocument();
        $html->loadHTMLFile("Pages/ErroUnknow.xml");
        $html->preserveWhiteSpace = false;
        $html->formatOutput       = true;
        
        $html->getElementById('logo')->nodeValue                 = sprintf(LOGO, $this->logo, $this->link, $this->name);
        $html->getElementsByTagName('title')->item(0)->nodeValue = sprintf(STEP1_TITLETAG, $this->name);
        
        $html->getElementById('ERROUNKNOW_TEXT1')->nodeValue = sprintf(ERROUNKNOW_TEXT1, $this->file);
        $html->getElementById('ERROUNKNOW_TEXT2')->nodeValue = sprintf(ERROUNKNOW_TEXT2, $this->file);
        $html->getElementById('ERROUNKNOW_TEXT3')->nodeValue = ERROUNKNOW_TEXT3;
        
        $html->getElementById('wp-config')->nodeValue = $this->FileGenerate($_POST);
        
        $html->getElementById('button')->nodeValue = SUCCESS_BUTTON;
        
        return $this->RevertHTML($html->saveHTML());
      }
    
    protected function HTMLEndSuccess() 
      {
        $html = new DOMDocument();
        $html->loadHTMLFile("Pages/SuccessEnd.xml");
        $html->preserveWhiteSpace = false;
        $html->formatOutput       = true;
        $html->getElementById('logo')->nodeValue                 = sprintf(LOGO, $this->logo, $this->link, $this->name);
        $html->getElementsByTagName('title')->item(0)->nodeValue = sprintf(STEP1_TITLETAG, $this->name);
        $html->getElementById('text')->nodeValue = sprintf(SUCCESS_END_TEXT, $this->name);
        $html->getElementById('button')->nodeValue = SUCCESS_END_BUTTON;
        return $this->RevertHTML($html->saveHTML());
      }

    public function EndSuccess() 
      {
          print $this->HTMLEndSuccess();
      }

  }
