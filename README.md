<p align="center">
  <a href="https://getstisla.com">
    <img src="https://avatars2.githubusercontent.com/u/45754626?s=75&v=4" alt="Stisla logo" width="75" height="75">
  </a>
</p>

<h1 align="center">Stisla for CodeIgniter With IonAuth</h1>

<p align="center">
  Stisla is Free Bootstrap Admin Template and will help you to speed up your project, design your own dashboard UI and the users will love it.
</p>

[![Stisla Preview](https://camo.githubusercontent.com/2135e0f6544a7286a3412cdc3df32d47fc91b045/68747470733a2f2f692e6962622e636f2f3674646d6358302f323031382d31312d31312d31352d33352d676574737469736c612d636f6d2e706e67)](https://getstisla.com)

## Table of contents

- [Link Stisla](#link-stisla)
- [Installation](#installation)
- [Usage](#usage)
- [License](#License)

## Link
- Homepage: [getstisla.com](https://getstisla.com)
- Repository: [github.com/stisla/stisla](https://github.com/stisla/stisla)
- Documentation: [getstisla.com/docs](https://getstisla.com/docs)
- Stisla Codeigniter : [Download the latest release](https://github.com/KhidirDotID/stisla-codeigniter/archive/v1.0.0.zip)
- Github KhidirDotId : [github.com/KhidirDotID](https://github.com/KhidirDotID)
- Ion Auth : [github.com/benedmunds/CodeIgniter-Ion-Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth)

## Installation
- [Clone the Latest](https://github.com/dheariarachman/codeigniter-admin-auth).
or clone the repo :
```
[SSH]
git@github.com:dheariarachman/codeigniter-admin-auth.git
[HTTPS]
https://github.com/dheariarachman/codeigniter-admin-auth.git
```

## Usage
- Create a new Controller at `application/controllers` then put like this:
```
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_name extends CI_Controller {

	public function index() {
		$data = array(
			'title' => "Your title"
		);
		$this->load->view('View_name', $data);
	}
}
?>
```
- Create a new View at `application/views` then put like this:
```
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); ?>

      <!-- Main Content -->

<?php
$this->load->view('dist/_partials/footer'); ?>
```

## License

Stisla is under the [MIT License](LICENSE).
