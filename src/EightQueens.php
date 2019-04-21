<?php
declare(strict_types = 1);

namespace Attogram\EightQueens;

use Attogram\Router\Router;

use Throwable;

use function method_exists;

class EightQueens
{
    /** @var string Version */
    const VERSION = '1.0.0-pre.1';

    /** @var string Git Repository */
    const GIT_REPO = 'https://github.com/attogram/8queens';

    /** @var Router */
    protected $router;

    public function __construct()
    {
        $this->route();
    }

    protected function route()
    {
        $this->router = new Router();
        //$this->router->setForceSlash(true);

        $this->router->allow('/', 'home');
        $this->router->allow('/status/', 'status');

        $match = $this->router->match();
        if ($match && method_exists($this, $match)) {
            try {
                $this->{$match}();
            } catch (Throwable $error) {
                print "\nERROR: " . $error->getMessage();
            }

            return;
        }
        die('404 Page Not Found');
    }

    protected function home()
    {
        //$this->pageHeader('Play 8 Queens - the classic chess puzzle')
        include('home.php');
        // $this->pageFooter();
    }

    protected function status()
    {
        include('status.php');
    }
}
