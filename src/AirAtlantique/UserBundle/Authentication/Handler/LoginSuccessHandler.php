<?php
 
namespace AirAtlantique\UserBundle\Authentication\Handler;
 
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;
 
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    
    /**
     *
     * @access protected
     * @var \Symfony\Component\Routing\RouterInterface $router
     */
    protected $router;
    
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {

        $url = $request->server->get('HTTP_REFERER');

        $response = new RedirectResponse($url);
            
        return $response;
    }
    
}