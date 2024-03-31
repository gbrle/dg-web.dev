<?php

declare(strict_types=1);

namespace App\Response;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FormErrorResponse extends JsonResponse
{
    public static function createFromForm(FormInterface $form): JsonResponse
    {
        return new self(
            [
                'errors' => [
                    'form' => self::getErrorsFromForm($form),
                ],
            ],
            Response::HTTP_BAD_REQUEST
        );
    }

    /**
     * @return array<string, array<int, string>>
     */
    private static function getErrorsFromForm(FormInterface $form): array
    {
        $errors = [];

        /** @var FormError $error */
        foreach ($form->getErrors(true) as $error) {
            $propertyPath = $error->getCause()->getPropertyPath();
            /** @var string $property */
            $property = str_replace(['children[', '].data', ']'], '', $propertyPath);
            $errors[$property][] = $error->getMessage();
        }

        return $errors;
    }
}
