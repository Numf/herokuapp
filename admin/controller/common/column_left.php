<?php
class ControllerCommonColumnLeft extends Controller {
	public function index() {
        if ($this->user->hasPermission('access', 'tool/export_import')) {
            $tool[] = array(
                'name'	   => $this->language->get('text_export_import'),
                'href'     => $this->url->link('tool/export_import', 'token=' . $this->session->data['token'], true),
                'children' => array()
            );
        }
        if (isset($this->request->get['token']) && isset($this->session->data['token']) && ($this->request->get['token'] == $this->session->data['token'])) {
			$data['profile'] = $this->load->controller('common/profile');
			$data['menu'] = $this->load->controller('common/menu');
			$data['stats'] = $this->load->controller('common/stats');

			return $this->load->view('common/column_left.tpl', $data);
		}
	}
}