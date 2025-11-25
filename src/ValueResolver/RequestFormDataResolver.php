<?php

namespace App\ValueResolver;

use App\Attribute\RequestFormDataBody;
use App\Enum\ImageTaskOperation;
use App\Exception\RequestBodyConvertException;
use App\Exception\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestFormDataResolver implements ValueResolverInterface
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
        private readonly ValidatorInterface    $validator
    )
    {
    }

    private function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return count($argument->getAttributes(RequestFormDataBody::class, ArgumentMetadata::IS_INSTANCEOF)) > 0;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        if (!$this->supports($request, $argument)) {
            return [];
        }

        $data = $request->request->all();
        try {
            $data = $this->denormalizer->denormalize($data, $argument->getType(), null, [
                'disable_type_enforcement' => true,
            ]);
        } catch (ExceptionInterface $e) {
            throw new RequestBodyConvertException();
        }

        $errors = $this->validator->validate($data);
        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }

        return [$data];
    }
}