<?php
/**
 *
 * Class de gestion qui permet de crée plusieurs rapport
 * pour l'utilisateur,par exemple une erreur.
 * ça permet d'évité de se perdre avec les session_start car l'objet de la classe
 * sera la valeur de la variable de session !!!
 *
 * Le controlleur rempli l'objet de la classe
 * Sur index.php on va montrer tout les messages d'erreur et ensuite les vider !
 *
 *
 * Dev : Mehdi Ben Bahri
 * Date: 29/11/2018
 * Time: 13:13
 */

class rapport
{
    private $message = [];
    private $couleur = [];
    private $type = []; // Exemple : erreur,avertissement,message,succès...
    private $color = [];

    /**
     * rapport constructor.
     * @param array $message
     * @param array $couleur
     * @param array $codeErreur
     * @param array $type
     * @param array $color
     */
    public function __construct()
    {

    }
    //couleur du texte...

    /**
     * Constructeur du rapport d'erreur
     * @param array $message
     * @param $couleur
     * @param $codeErreur
     */
    public function createRapport($message,$couleur,$type,$color)
    {
        array_push($this->message,$message);
        array_push($this->couleur,$couleur);
        array_push($this->type,$type);
        array_push($this->color,$color);

    }

    /*
     * Retourne le rapport qui correspond à l'index
     *
     */
    public function getRapport($index)
    {

        return '<div class="rapport alert alert-default alert-dismissible fade show" style="background-color : '. $this->couleur[$index] .'; color : '. $this->color[$index] .'" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                     </button>
                      <strong>'. $this->type[$index] . '</strong> '.$this->message[$index].' 
                       </div>';
    }

    /*
     * Retourne tout les rapports
     *
     *
     */
    public function getAllRapport()
    {
        for($index = 0; $index < count($this->message) ; $index++){
            echo '<div class="rapport alert alert-default alert-dismissible fade show" style="background-color : '. $this->couleur[$index] .'; color : '. $this->color[$index] .'" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                     </button>
                      <strong>'. $this->type[$index] . '</strong> '.$this->message[$index].'
                       </div>';
        }

    }


    /*
     * Retourne le nombre de rapport de l'objet.
     *
     *
     */
    public function nbRapport(){
        return count($this->message);
    }

}