<?php

class AbstractController
{
    const MIN_FIELD_LENGTH = 2;

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
            if (strlen($value) < MIN_NAME_LENGTH) {
                $errorMessage += [ $key => ' Erreur : 
 ce champ doit contenir au moins 2 caractères'];
            }
        }
        return $errorMessage;
    }
}
