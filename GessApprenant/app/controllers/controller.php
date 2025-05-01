<?php
require_once BASE_URL . 'app/models/model.php';


function render_view(string $view, array $data = [], ?string $layout = null): void {
  extract($data);

  $viewPath = __DIR__ . '/../views/' . $view . '.view.php';

  if ($layout) {
      ob_start();
      require $viewPath;
      $content = ob_get_clean();

      require __DIR__ . '/../views/layout/' . $layout . '.layout.php';
  } else {
      require $viewPath;
  }
}

