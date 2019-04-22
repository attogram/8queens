<?php
declare(strict_types = 1);

namespace Attogram\EightQueens;

use Attogram\Router\Router;

use Throwable;

use function method_exists;

class EightQueens
{
    /** @var string Version */
    const VERSION = '1.0.0-pre.3';

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
        $this->router->setForceSlash(true);

        $this->router->allow('/', 'home');
        $this->router->allow('/status/', 'status');
        $this->router->allow('/about/', 'about');
        $this->router->allow('/solutions/', 'solutions');
        $this->router->allow('/92/', 'allSolutions');

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

    protected function pageHeader()
    {
        include('header.php');
    }

    protected function pageFooter()
    {
        include('footer.php');
    }

    protected function home()
    {
        $this->pageHeader();
        include('home.php');
        $this->pageFooter();
    }

    protected function status()
    {
        include('status.php');
    }

    protected function about()
    {
        $this->pageHeader();
        include('about.php');
        $this->pageFooter();
    }

    protected function solutions()
    {
        $this->pageHeader();
        include('solutions.php');
        $this->pageFooter();
    }

    protected function allSolutions()
    {
        $this->pageHeader();
        include('92.php');
        $this->pageFooter();
    }
}
