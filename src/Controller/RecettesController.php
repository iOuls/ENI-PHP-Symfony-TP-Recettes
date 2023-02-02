<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recettes', name: 'recettes')]
class RecettesController extends AbstractController
{
    /**
     * Affichage de la liste des recettes
     * @param RecetteRepository $rR
     * @return Response
     */
    #[Route('/', name: '_liste')]
    public function liste(
        RecetteRepository $rR
    ): Response
    {
        $liste = $rR->listRecettes();
        return $this->render('recettes/index.html.twig', [
            'listeRecettes' => $liste
        ]);
    }

    /**
     * Liste par ordre alphabétique la liste des recettes
     * @param RecetteRepository $rR
     * @return Response
     */
    #[Route('/alpha', name: '_listeAlpha')]
    public function listeAlpha(
        RecetteRepository $rR
    ): Response
    {
        $liste = $rR->listRecettesAlpha();
        return $this->render('recettes/index.html.twig', [
            'listeRecettes' => $liste
        ]);
    }

    /**
     * Liste des recettes triée avec les favoris en premier
     * @param RecetteRepository $rR
     * @return Response
     */
    #[Route('/fav', name: '_listeFav')]
    public function listeFav(
        RecetteRepository $rR
    ): Response
    {
        $liste = $rR->listRecettesFav();
        return $this->render('recettes/index.html.twig', [
            'listeRecettes' => $liste
        ]);
    }

    /**
     * Affichage de la liste des recettes
     * @param RecetteRepository $rR
     * @return Response
     */
    #[Route('/detail/{id}', name: '_detail')]
    public function detail(
        int               $id,
        RecetteRepository $rR
    ): Response
    {
        $recette = $rR->findRecette($id);
        return $this->render('recettes/detail.html.twig', [
            'recette' => $recette
        ]);
    }

    /**
     * Ajout/Retrait d'une recette en favoris
     * @param int $id
     * @param EntityManagerInterface $em
     * @param RecetteRepository $rR
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    #[Route('/{id}', name: '_favoris')]
    public function favoris(
        int                    $id,
        EntityManagerInterface $em,
        RecetteRepository      $rR
    )
    {
        // récup recette et changement valeur favoris
        $recette = $rR->findRecette($id);

        // changement valeur favoris
        $recette->setEstFavori(!$recette->isEstFavori());
        $em->persist($recette);
        $em->flush();

        // affichage de la liste
        return $this->redirectToRoute('recettes_liste');
    }

}
