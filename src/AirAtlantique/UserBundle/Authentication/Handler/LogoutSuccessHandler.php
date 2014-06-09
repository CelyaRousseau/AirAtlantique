<?php
 
namespace AirAtlantique\UserBundle\Authentication\Handler;
 
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;
 
class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{
    
     /**
     *
     * @access protected
     * @var \Symfony\Component\Routing\RouterInterface $router
     */
    protected $router;
    /**
     *
     * @access public
     * @param \Symfony\Component\Routing\RouterInterface $router
     * @param array                                      $routeReferer
     * @param array                                      $routeLogin
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }
    
    public function onLogoutSuccess(Request $request)
    {
        // redirect the user to where they were before the login process begun.
        // $referer_url = $request->headers->get('referer');
                    
        // $response = new RedirectResponse($referer_url);        
        // return $response;

        $response = new RedirectResponse("fr/home");
            
        return $response;
    }
    
}