<?php

namespace WebSite\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

use WebSite\BackEndBundle\Entity\Article;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction(Request $request)
    {        
        $categories = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->findArticlesByOrder();
        
        $news = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:News')
                ->findNews();
        $imagesSlider = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:ImageSlider')
                ->findCurrentImage();
        
        $logos = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Logo')
                ->getTrusts();
        $logos2=$this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Logo')
                ->getPartners();
        $logos = array_merge($logos,$logos2);
        
        return array('news'=>$news,'categories'=>$categories,'imagesSlider'=>$imagesSlider,'logos'=>$logos);
    }
    
    /**
     * @Route("/menu", name="menu")
     * @Template("WebSiteFrontEndBundle:Default/Partial:menu.html.twig")
     */
    public function menuAction(Request $request)
    {
        $categories = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->findArticlesByOrder();
        
        return array('categories'=>$categories);
    }
    
    /**
     * @Route("/footer", name="footer")
     * @Template("WebSiteFrontEndBundle:Default/Partial:footer.html.twig")
     */
    public function footerAction(Request $request)
    {
        $categories = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->findArticlesByOrder();
        
        return array('categories'=>$categories);
    }
    /**
     * @Route("/subMenu", name="subMenu")
     * @Template("WebSiteFrontEndBundle:Default/Partial:subMenu.html.twig")
     */
    public function subMenuAction($article)
    {
        $articles = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->findArticlesByOrder($article);
        
        return array('articles'=>$articles);
    }
    
       
    /**
     * @Route("/Show/{title}", name="showArticle")
     * @Template("WebSiteFrontEndBundle:Default:showArticle.html.twig")
     */
    public function showArticleAction($title)
    {
        $article = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->findOneBy(array('title'=>$title));
        
        return array('article'=>$article);
    }
    
    /**
     * @Route("/News/{id}", name="showNews")
     * @Method({"GET"})
     * @Template("WebSiteFrontEndBundle:News:showNews.html.twig")
     */
    public function showNewsAction(Request $request,$id)
    {
        $news = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:News')
                ->find($id);
        
        return array('news'=>$news);
    }
    
    
    /**
     * @Route("/search",name="search")
     * @Method({"GET"})
     * @Template()
     */
    public function searchAction(Request $request)
    {
        $search = $request->get('search');
        $articles = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->getSearch($search);
        $news = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:News')
                ->getSearch($search);
        
        return array('search'=>$search,'articles'=>$articles,'news'=>$news);
    }
    
    /**
     * @Route("/plan",name="plan")
     * @Method({"GET"})
     * @Template()
     */
    public function planAction(Request $request)
    {
        $articles = $this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Article')
                ->findAll();
        
        return array('articles'=>$articles);
    }
    
    /**
     * @Route("/partenaires", name="logos")
     * @Method({"GET"})
     * @Template()
     */
    public function logosAction(Request $request)
    {
        $trusts=$this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Logo')
                ->getTrusts();
        $partners=$this->getDoctrine()
                ->getRepository('WebSiteBackEndBundle:Logo')
                ->getPartners();
        
        
        return array('trusts'=>$trusts,'partners'=>$partners);
    }
    
    /**
     * @Route("/test", name="test")
     * @Method({"GET"})
     * @Template()
     */
    public function testAction(Request $request)
    {
        /*echo "debut publication linkedin<br/>";   
        
        $linkedIn=$this->get('linkedin');
        $linkedIn->setAccessToken($this->get('security.token_storage')->getToken()->getAccessToken());
        */
        //if ($linkedIn->isAuthenticated()) {
           /* $options = array('json'=>
                array(
                    'comment' => $description,
                    'visibility' => array(
                        'code' => 'anyone'
                    )
                )
            );
            $result = $linkedIn->post('v1/people/~/shares', $options);
             var_dump($result);*/       
        /*    echo "authentification linkedin ok<br/>";
        }elseif ($linkedIn->hasError()) {
            echo "User canceled the login.<br/>";
            exit();
        }
        //var_dump($linkedIn);
        echo "<br/>fin publication linkedin";   
        exit;*/
    }
    
    /**
     * @Route("/test2", name="test2", options={"expose"=true})
     * @Method({"GET","POST"})
     * @Template()
     */
    public function test2Action(Request $request)
    {         
        
    }
    
    /**
     * @Route("/envoi", name="envoi", options={"expose"=true})
     * @Method({"GET","POST"})
     * @Template()
     */
    public function envoiAction(Request $request)
    {             
        $title = $request->get('title');
        $description = $request->get('description');
        //exit;
        
        $consumer_key = '7768zhwyhxqy2x';
        $consumer_secret = "c0OnAcJVjcoWsRVz";
        $cookie_name = "linkedin_oauth_${consumer_key}";
        $cookies = $request->cookies;
        if ($cookies->has($cookie_name)){
        $credentials_json = $cookies->get($cookie_name); // where PHP stories cookies
        $credentials = json_decode($credentials_json);
        //var_dump($credentials);
        //exit;
        var_dump($credentials);
        //var_dump($_COOKIE['linkedin_oauth_#7768zhwyhxqy2x']);
        
        
        // validate signature
        if ($credentials->signature_version == 1) {
            if ($credentials->signature_order && is_array($credentials->signature_order)) {
                $base_string = '';
                // build base string from values ordered by signature_order
                foreach ($credentials->signature_order as $key) {
                    if (isset($credentials->$key)) {
                        $base_string .= $credentials->$key;
                    } else {
                        print "missing signature parameter: $key";
                    }
                }
                // hex encode an HMAC-SHA1 string
                $signature =  base64_encode(hash_hmac('sha1', $base_string, $consumer_secret, true));
                // check if our signature matches the cookie's
                if ($signature == $credentials->signature) {
                    print "signature validation succeeded";
                    $linkedIn=$this->get('linkedin');

                    if ($linkedIn->isAuthenticated()) {
                        echo "<br/><br/>connecté";
                        $user=$linkedIn->get('v1/people/~:(firstName,lastName)');
                        var_dump($user);
                        //$linkedIn->setAccessToken($credentials->access_token);
                        $user=$linkedIn->get('v1/people/~:(firstName,lastName)');
                        var_dump($user);
                        
                        $message= "test hehehehe";
                        $options = array('json'=>
                             array(
                                 'comment' => $description,
                                 'visibility' => array(
                                     'code' => 'anyone'
                                 )
                             )
                         );
                        $linkedIn->post('v1/people/~/shares', $options);
                        /*try {
                            // init the client
                            $oauth = new \OAuth($consumer_key, $consumer_secret);
                            // $oauth->disableSSLChecks(); // only use for internal testing
                            $access_token = $credentials->access_token;

                            // swap 2.0 token for 1.0a token and secret
                            $oauth->fetch('https://api.linkedin.com/uas/oauth/accessToken', array('xoauth_oauth2_access_token' => $access_token), OAUTH_HTTP_METHOD_POST);
                            parse_str($oauth->getLastResponse(), $response);
                            
                            var_dump($response);
                            
                            
                        }  catch (\Symfony\Component\Security\Acl\Exception\Exception $e)
                        {
                            echo $e->getMessage();
                        }*/
                        
                        /*$data=$linkedIn->getUser();
                        echo "<br/><br/>";
                        var_dump($data);

                        $linkedIn->setAccessToken($credentials->access_token);
                        var_dump($linkedIn->getAccessToken());

                        var_dump($linkedIn->api('GET', '/v1/people/~:(id,firstName,lastName,headline,email-address)'));*/
                    }
                    
                } else {
                    print "signature validation failed";    
                }
            } else {
                print "signature order missing";
            }
        } else {
            print "unknown cookie version";
        }
        /*if ($linkedIn->isAuthenticated()) {
            echo "<br/><br/>connecté";
            $linkedIn->setAccessToken($credentials->access_token);
            $message= "test hehehehe";
           $options = array('json'=>
                array(
                    'comment' => $message,
                    'visibility' => array(
                        'code' => 'anyone'
                    )
                )
            );
        }*/
        }
        //$linkedIn->post('v1/people/~/shares', $options);
        exit;
        //return true;*/
        $data = new \Symfony\Component\HttpFoundation\JsonResponse();
        $data->setData(array('obj'=>$credentials));
        return $data;
    }
    
    
    /**
     * Login a user with LinkedIn
     *
     * @Route("/linkedin-login", name="_public_linkedin_login")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction()
    {
        $linkedIn=$this->get('linkedin');

        if ($linkedIn->isAuthenticated()) {
            $data=$linkedIn->getUser();

           // $this->generateUrl();
           echo "ici";
           exit;

        }

        /*$redirectUrl = $this->generateUrl('_public_linkedin_login', array(), true);
        $url = $linkedIn->getLoginUrl(array('redirect_uri' => $redirectUrl));

        return $this->redirect($url);*/
        return array();
    }
}
