<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

                                    /*Security.http*/
class Authenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;
    private Security $security;

    public function __construct(UrlGeneratorInterface $urlGenerator, Security $security)
    {
        $this->urlGenerator = $urlGenerator;
        $this->security = $security;
    }

    public function authenticate(Request $request): PassportInterface
    {       /*Recupère le nom de l'utilisateur */
        $username = $request->request->get('username', '');
            /*Sauvegarde le nom dans la session*/
        $request->getSession()->set(Security::LAST_USERNAME, $username);
        /*Puis genère un passport" va être vérif par pluseirus method*/
        return new Passport( /*Passport avec 3 paramètres badge, Mdp, token */
            /*Badge qui garde l'indentifiant de l'utilisateur */
            new UserBadge($username),
            /* Garde le mot de passe ?????*/
            new PasswordCredentials($request->request->get('password', '')),
            [    /* valide le token CSRF*/
                new CsrfTokenBadge('authenticate', $request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
            if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
                return new RedirectResponse($this->urlGenerator->generate('admin'));
            }
            /* Redirect according to role  */
            if($this->security->isGranted('ROLE_ADMIN')){
                return new RedirectResponse($this->urlGenerator->generate('admin'));
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
                }else
                {
                    return new RedirectResponse($this->urlGenerator->generate('index'));
                }
    }

    protected function getLoginUrl(Request $request): string
    {                   /*Genére la route de Login */
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}

