<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;
use Grav\Common\Uri;
use Grav\Common\Utils;
use Grav\Common\Grav;

use Symfony\Component\Yaml\Yaml;

class SettlersonlyPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onPageInitialized' => ['onPageInitialized', 0]
        ];
    }
    
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

  public function onPluginsInitialized(): void
  {

    if ($this->isAdmin()) {
        $this->enable([
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onPageInitialized' => ['onPageInitialized', 0]
        ]);
    }
  }


   public function onPageInitialized()
    {
      $uri = $this->grav['uri'];
      $currentUrl = $uri->path();
      $this->grav['log']->debug($currentUrl. ' =');
      if (isset($_POST['name']) && $currentUrl == '/admin/accounts/users') {
        // Check if the request is an AJAX request
        if ($this->isAjaxRequest()) {

                $phpArray = Yaml::parseFile("user/accounts/".trim($_POST['user']).".yaml");

                $phpArray['groups'][0] = 'accepted';

                $yaml = Yaml::dump($phpArray);
                file_put_contents("user/accounts/".trim($_POST['user']).".yaml", $yaml);

                header('Content-Type: application/json');

                echo json_encode(['status' => $_POST['user']]);

                exit;
        } //preg_match('/singles\b/',$currentUrl)===1&&
      }else if (isset($_POST['email'])){
          $this->grav['log']->debug('send email'.$this->grav['user']->username); //$_POST['user']);




        $to = 'yehudaclinton@gmail.com';
        $from = 'admin@realclearjudaism.com';

        $subject = 'Test';
        $content = 'Test';

        $message = $this->grav['Email']->message($subject, $content, 'text/html')
            ->setFrom($from)
            ->setTo($to);

        $sent = $this->grav['Email']->send($message);



          header('Content-Type: application/json');
          echo json_encode(['status' => $this->grav['user']->username]);
          exit;
      }
    }

    private function isAjaxRequest()
    {
        // Check if the request is an AJAX request
        if(isset($_POST['name'])){
        $this->grav['log']->debug($_POST['user']);
          return true;
        }else{
        $this->grav['log']->debug('err');
          return false;
        }
    }

}
