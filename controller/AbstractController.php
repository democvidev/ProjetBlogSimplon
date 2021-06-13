<?php

namespace App\Controller;

class AbstractController
{
    protected $min_field_length = 2;
    protected $model; // stocke l'instance d'objet PostRepository à chaque nouvelle instanciation gràce au contructeur
    protected $modelName; // stocke le nom du Repository utilisé

    public function __construct()
    {
        $this->model = new $this->modelName;
    }

    /**
     * Gestion de rendu du template et son affichage
     *
     * @param string $view
     * @param array $datas
     * @return void
     */
    protected function render(string $view, array $datas = [], $pageTitle = null): void
    {
        extract($datas);

        ob_start(); // buferise le contenu de la page
        require dirname(__DIR__) . '/view/'. $view .'.php';
    
        $title = $pageTitle;
        $content = ob_get_clean();

        require dirname(__DIR__) . '/view/base.php';
    }

    /**
     * Gestion des redirections
     *
     * @param string $url
     * @return void
     */
    protected function redirect(string $url): void
    {
        exit(header("Location: $url"));
    }

    /**
     * Gestion des formulaires
     *
     * @param array $array
     * @return array
     */
    protected function isValidForm(array $array): array
    {
        $errorMessage = [];
        foreach ($array as $key => $value) {
            if (strlen($value) < $this->min_field_length) {
                $errorMessage += [ $key => ' Erreur : 
 ce champ doit contenir au moins 2 caractères'];
            }
        }
        return $errorMessage;
    }
}
