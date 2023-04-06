<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ArticleFormListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPostSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $article = $event->getData();

        // Check if an image was uploaded
        $image = $form->get('image')->getData();
        if ($image) {
            $article->setImage($image);
        }

        // Check if an image URL was provided
        $imageUrl = $form->get('image_url')->getData();
        if ($imageUrl) {
            $article->setImage($imageUrl);
        }
    }
}