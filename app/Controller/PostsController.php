<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
	
	/* an action - single function or interface in an application.
	the function "index" will run when users request example.com/posts/index*/
	public function index() {
		$this->set('posts', $this->Post->find('all'));
	}
	/* if function was "foobar" it'd be accessed at example.com/posts/foobar */
	
	public function view($id = null) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }
	
	/*add duh, creates new posts*/
	public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }
}