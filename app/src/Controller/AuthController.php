<?php
namespace App\Controller;

use App\Controller;
use App\Model\User;

class AuthController extends Controller
{
    public function loginPageAction($request, $response)
    {
        $nameKey = $this->csrf->getTokenNameKey();
        $valueKey = $this->csrf->getTokenValueKey();
        
        $name = $request->getAttribute($nameKey);
        $value = $request->getAttribute($valueKey);

        $data = [
            'nameKey' => $nameKey,
            'valueKey' => $valueKey,
            'name' => $name,
            'value' => $value,
        ];

        return $this->view->render($response, 'auth/login.twig', $data);
    }

    public function loginAction($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if($auth){
            return $response->withRedirect($this->router->pathFor('welcome'));
        }

        $this->flash->addMessage('error', 'login Gagal');

        return $response->withRedirect($this->router->pathFor('loginPage'));
    }

    public function logoutAction($request, $response)
    {
        $this->auth->logout();

        return $response->withRedirect($this->router->pathFor('loginPage'));
    }

    public function registerPageAction($request, $response)
    {
        $nameKey = $this->csrf->getTokenNameKey();
        $valueKey = $this->csrf->getTokenValueKey();
        
        $name = $request->getAttribute($nameKey);
        $value = $request->getAttribute($valueKey);

        $data = [
            'nameKey' => $nameKey,
            'valueKey' => $valueKey,
            'name' => $name,
            'value' => $value,
        ];

        return $this->view->render($response, 'auth/register.twig', $data);
    }

    public function registerSaveAction($request, $response)
    {
        $this->validator->rule('required', [
            'username',
            'email',
            'password',
            'first_name', 
            'last_name' 
        ]);
        $this->validator->rule('email', 'email');

        if($this->validate()) {
            $input = $request->getParsedBody();

            $user = new User;

            $user->username = $input['username'];
            $user->email = $input['email'];
            $user->password = password_hash($input['password'], PASSWORD_DEFAULT);
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];

            $save = $user->save();

            if($save) {
                $this->flash->addMessage('success', 'Register Success');
            }
        }

        return $response->withRedirect($this->router->pathFor('registerPage'));
    }
}