<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PostController extends BaseController {

    /**
     * Posts index
     */
    public function index(Request $request, Response $response, $args) {

        // Load model
        $model = new PostModel();

        // Get posts
        $posts = $model->get();

        // Prepare view data
        $data = [
            'posts' => $posts
        ];
        $response->getBody()->write($this->load->view('post/posts.php', $data));
        return $response;
    }

    /**
     * Create new post
     */
    public function createPost(Request $request, Response $response, $args) {

        // Load model
        $model = new PostModel();

        // Check whether the user is logged in
        if (!$this->auth->isLoggedIn()) {
            $_SESSION['message'] = 'Sie müssen angemeldet sein, um einen Post anzulegen.';
            $response = $response->withStatus(303);
            $response = $response->withHeader('Location', '/login');
            return $response;
        }

        // Create the post
        $post = [
            'creator_user_id' => $_SESSION['user']['id'],
            'message' => $_POST['message']
        ];
        $status = $model->create($post);

        // Check status
        if ($status) {
            $_SESSION['message'] = 'Ihr Post wurde erfolgreich erstellt.';
        }
        else {
            $_SESSION['message'] = 'Ihr Post konnte aufgrund eines unbekannten Fehlers nicht erstellt werden.';
        }
        $response = $response->withStatus(303);
        $response = $response->withheader('Location', '/');

        return $response;
    }
}