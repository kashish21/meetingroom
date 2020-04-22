<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vmo/autoload.php'; 

use Vimeo\Vimeo as VMM;
use Vimeo\Exceptions\VimeoUploadException;



Class Vimeophp
{
    /**
     * Vemio constructor.
     */
    public $config;
    private $vm;

    public function __construct()
    {
        $config = json_decode(file_get_contents(__DIR__ . '/vmo/example/config.json'), true);
        
        if (!isset($this->vm))
        {
            $this->vm = new VMM($config['client_id'], $config['client_secret'], $config['access_token']);
        }
    }

    public function obj()
    {
        return $this->vm;
    }

    public function object()
    {
        $config = json_decode(file_get_contents(__DIR__ . '/vmo/example/config.json'), true);
        if (empty($config['client_id']) || empty($config['client_secret'])) {
            throw new Exception(
                'We could not locate your client id or client secret in "' . __DIR__ . '/config.json". Please create one, ' .
                'and reference config.json.example'
            );
        }
        
        return $config;
    }
}