<?php

namespace WebSite\BackEndBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;


class NewsAdminController extends CRUDController
{
    public function editAction($id = null,Request $request = null)
    {
        if($request!=null && $request->isMethod("POST") && isset($request->request->all()[$request->get('uniqid')]['publication']))
        {
            $publication = $request->request->all()[$request->get('uniqid')]['publication'];
            $title=$request->request->all()[$request->get('uniqid')]['title'];
            $description=$request->request->all()[$request->get('uniqid')]['description'];
            //if(in_array('linkedin',$publication))
            //        return $this->publicationLinkedIn($title,$description);
            //if(in_array('facebook',$publication))
            //        $this->publicationFacebook($title,$description);
            //exit;
        }
        $res = parent::editAction($request);
        return $res;
    }
    
    private function publicationLinkedIn($title,$description)
    {
        $linkedIn=$this->get('linkedin');
        
        if ($linkedIn->isAuthenticated()) {
            //$linkedIn->setAccessToken($this->get('security.token_storage')->getToken()->getAccessToken());
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
            var_dump("authentification linkedin ok");
            exit;
        }
        $redirectUrl = $this->generateUrl('_public_linkedin_login', array(), true);
        $url = $linkedIn->getLoginUrl(array('redirect_uri' => $redirectUrl));

        return $this->redirect($url);
        //exit;
        //exit;
        //var_dump($linkedIn);
        //var_dump("fin publication linkedin");
    }
    
    private function publicationFacebook($title,$description)
    {
        $facebook = $this->container->get('fos_facebook.api');
                var_dump($facebook->api('/me')); //1137969319566484|oXO-v_55zmV6WSt1jHLAjLCS1Ps
        /*$linkData = [
        'link' => 'http://test.com',
        'message' => 'test',
        ];
        
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $facebook->post('/me/feed', $linkData, '{access-token}');
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          $graphNode = $response->getGraphNode();

           echo 'Posted with id: ' . $graphNode['id'];
        */
    }
}
