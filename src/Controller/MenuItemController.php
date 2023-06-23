<?php

namespace App\Controller;

use App\Entity\MenuItem;
use App\Form\MenuItemType;
use App\Repository\MenuItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/menu/item')]
class MenuItemController extends AbstractController
{
    #[Route('/', name: 'app_menu_item_index', methods: ['GET'])]
    public function index(MenuItemRepository $menuItemRepository): Response
    {
        return $this->render('menu_item/index.html.twig', [
            'menu_items' => $menuItemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_menu_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MenuItemRepository $menuItemRepository): Response
    {
        $menuItem = new MenuItem();
        $form = $this->createForm(MenuItemType::class, $menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('imageUrl')->getData();
            $file_dir = $this->getParameter('kernel.project_dir') . '\public\uploads';
            $file_name = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                $file_dir,
                $file_name
            );
            $menuItem->setImageUrl($file_name);
            $menuItemRepository->save($menuItem, true);

            return $this->redirectToRoute('app_menu_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('menu_item/new.html.twig', [
            'menu_item' => $menuItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_menu_item_show', methods: ['GET'])]
    public function show(MenuItem $menuItem): Response
    {
        return $this->render('menu_item/show.html.twig', [
            'menu_item' => $menuItem,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_menu_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MenuItem $menuItem, MenuItemRepository $menuItemRepository): Response
    {
        $form = $this->createForm(MenuItemType::class, $menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('imageUrl')->getData();
            $file_dir = $this->getParameter('kernel.project_dir') . '\public\uploads';
            $file_name = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                $file_dir,
                $file_name
            );
            $menuItem->setImageUrl($file_name);
            $menuItemRepository->save($menuItem, true);

            return $this->redirectToRoute('app_menu_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('menu_item/edit.html.twig', [
            'menu_item' => $menuItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_menu_item_delete', methods: ['POST'])]
    public function delete(Request $request, MenuItem $menuItem, MenuItemRepository $menuItemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$menuItem->getId(), $request->request->get('_token'))) {
            $menuItemRepository->remove($menuItem, true);
        }

        return $this->redirectToRoute('app_menu_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
